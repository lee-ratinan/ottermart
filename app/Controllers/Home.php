<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
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

    private function get_business_info(string $slug): array
    {
        $locale    = $this->splitLocale();
        $lang      = $locale['languageCode'];
        $cacheKey  = 'business-' . $lang . '-' . $slug;
        $cache = Services::cache();
        if ($cache->get($cacheKey)) {
            return $cache->get($cacheKey);
        }
        $results = $this->callApi('business/retrieve?business-slug=' . urlencode($slug));
        if (empty($results['business'])) {
            throw new PageNotFoundException();
        }
        $business = $results['business'];
        // slug => id
        $service_slugs = [];
        $product_slugs = [];
        $service_variant_slugs = [];
        $product_variant_slugs = [];
        if ($business['services']) {
            foreach ($business['services'] as $service) {
                $service_slugs[$service['service_slug']] = $service['id'];
                if (isset($service['variants'])) {
                    foreach ($service['variants'] as $variant) {
                        $service_variant_slugs[$variant['variant_slug']] = $variant['id'];
                    }
                }
            }
        }
        if ($business['products']) {
            foreach ($business['products'] as $product) {
                $product_slugs[$product['product_slug']] = $product['id'];
                if (isset($product['variants'])) {
                    foreach ($product['variants'] as $variant) {
                        $product_variant_slugs[$variant['variant_slug']] = $variant['id'];
                    }
                }
            }
        }
        $business['service_slugs']         = $service_slugs;
        $business['service_variant_slugs'] = $service_variant_slugs;
        $business['product_slugs']         = $product_slugs;
        $business['product_variant_slugs'] = $product_variant_slugs;
        $cache->save($cacheKey, $business, 3600);
        return $business;
    }

    public function clear_cache(string $slug): ResponseInterface
    {
        $cache     = Services::cache();
        $languages = ['en', 'th'];
        $statuses  = [];
        foreach ($languages as $language) {
            $cacheKey  = 'business-' . $language . '-' . $slug;
            if ($cache->get($cacheKey)) {
                if ($cache->delete($cacheKey)) {
                    $statuses[] = 'deleted: ' . $cacheKey;
                } else {
                    $statuses[] = 'error deleting: ' . $cacheKey;
                }
            } else {
                $statuses[] = 'not found: ' . $cacheKey;
            }
        }
        return $this->response->setJSON([
            'statuses' => $statuses,
        ]);
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
        $business  = $this->get_business_info($slug);
        $data      = [
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

    public function shop_info_page(string $shop_slug, string $info_type, string $product_slug): string
    {
        if (!in_array($info_type, ['products', 'services'])) {
            throw new PageNotFoundException();
        }
        $business    = $this->get_business_info($shop_slug);
        $key         = ('products' == $info_type ? 'product_slugs' : 'service_slugs');
        $target_item = $business[$info_type][$business[$key][$product_slug]];
        if (empty($target_item)) {
            throw new PageNotFoundException();
        }
        unset($business['products']);
        unset($business['services']);
        $data  = [
            'page_title'  => $business['business_name'],
            'description' => $business['mart_meta_description'],
            'keywords'    => $business['mart_meta_keywords'],
            'url_part'    => '@' . $shop_slug . '/' . $info_type . '/' . $product_slug,
            'locale'      => $this->request->getLocale(),
            'slug'        => $shop_slug,
            'business'    => $business,
            'type'        => $info_type,
            $info_type    => $target_item
        ];
        return view('store_info_page', $data);
    }

    public function service_booking_slots(string $slug, string $service_slug, string $variant_slug): string
    {
        $business = $this->get_business_info($slug);
        $locale   = $this->request->getLocale();
        $data     = [
            'page_title'  => $business['business_name'],
            'description' => $business['mart_meta_description'],
            'keywords'    => $business['mart_meta_keywords'],
            'url_part'    => '@' . $slug . '/service-booking/' . $service_slug . '/' . $variant_slug . '/slots',
            'locale'       => $locale,
            'slug'        => $slug,
            'schedule_url' => getenv('otterplex_url') . str_replace('-', '/', $locale) . '/service/xxxx-retrieve/' . $variant_slug
        ];
        return view('service_booking_slots', $data);
    }

    public function service_booking_schedules(string $slug, string $service_slug, string $variant_slug): string
    {
        $business = $this->get_business_info($slug);
        $locale   = $this->request->getLocale();
        $data     = [
            'page_title'  => $business['business_name'],
            'description' => $business['mart_meta_description'],
            'keywords'    => $business['mart_meta_keywords'],
            'url_part'     => '@' . $slug . '/service-booking/' . $service_slug . '/' . $variant_slug . '/schedules',
            'locale'       => $locale,
            'slug'         => $slug,
            'service_slug' => $service_slug,
            'variant_slug' => $variant_slug,
            'business'     => $business,
            'schedule_url' => getenv('otterplex_url') . 'api/v1.0/' . str_replace('-', '/', $locale) . '/service/session-retrieve/' . $variant_slug
        ];
        return view('service_booking_schedules', $data);
    }
}
