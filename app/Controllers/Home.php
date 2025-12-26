<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;

class Home extends BaseController
{

    /**
     * Call OtterPlex API
     * @param string $endpoint
     * @return array
     */
    private function callApi(string $endpoint): array
    {
        $locale = $this->splitLocale();
        $languageCode = strtolower($locale['languageCode']);
        $countryCode  = strtolower($locale['countryCode']);
        $url = sprintf(
            '%s/api/v1.0/%s/%s/%s',
            rtrim(getenv('otterplex'), '/'),
            $languageCode,
            $countryCode,
            $endpoint
        );
        log_message('debug', $url);
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_FAILONERROR    => false,
            CURLOPT_HTTPHEADER     => ['Accept: application/json']
        ]);
        $body = curl_exec($ch);
        if ($body === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new RuntimeException("cURL error: {$error}");
        }
        curl_close($ch);
        return json_decode($body, true);
    }

    private function splitLocale(): array
    {
        $locale = $this->request->getLocale();
        $split  = explode('-', $locale);
        return [
            'languageCode' => $split[0],
            'countryCode'  => $split[1],
        ];
    }

    public function index(): string
    {
        $query   = $this->request->getGet('business-name');
        $results = [];
        if (!empty($query)) {
            $results = $this->callApi('business/search?query=' . urlencode($query));
        }
        $data    = [
            'page_title'  => lang('System.home-page'),
            'description' => lang('System.description'),
            'keywords'    => lang('System.keywords'),
            'url_part'    => '',
            'locale'      => $this->request->getLocale(),
            'results'     => $results
        ];
        return view('home', $data);
    }

    public function shop_home(string $slug): string
    {
        $cache     = Services::cache();
        $locale    = $this->splitLocale();
        $lang      = $locale['languageCode'];
        $cacheKey  = 'business-' . $lang . '-' . $slug;
        if ($cache->get($cacheKey)) {
            $business = $cache->get($cacheKey);
        } else {
            $results = $this->callApi('business/retrieve?business-slug=' . urlencode($slug));
            if (empty($results['business'])) {
                throw new PageNotFoundException();
            }
            $business = $results['business'];
            $cache->save($cacheKey, $business, 3600);
        }
        $data  = [
            'page_title'  => $business['business_name'],
            'description' => $business['mart_meta_description'],
            'keywords'    => $business['mart_meta_keywords'],
            'url_part'    => '@' . $slug,
            'locale'      => $this->request->getLocale(),
            'slug'        => $slug,
            'business'    => $business
        ];
        return view('store_front', $data);
    }

    public function shop_booking(string $slug): string
    {
        $data = [
            'page_title'  => '[page title]',
            'description' => lang('System.description'),
            'keywords'    => lang('System.keywords'),
            'url_part'    => '@' . $slug . '/booking',
            'locale'      => $this->request->getLocale(),
            'slug'        => $slug,
        ];
        return view('store_booking', $data);
    }
}
