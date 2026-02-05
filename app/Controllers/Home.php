<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use RuntimeException;

class Home extends BaseController
{

    private function add_card_detail(int $business_id): array
    {
        return [
            'business_id'         => $business_id,
            'customer_id'         => 0,
            'customer_address_id' => 0,
            'order_number'        => '',
            'order_subtotal'      => 0.00,
            'order_adjustment'    => 0.00,
            'order_total'         => 0.00,
            'order_status'        => 'OPEN',
            'financial_status'    => 'PENDING',
            'shipping_status'     => 'OPEN',
            'staff_comment'       => null,
            'customer_comment'    => null,
        ];
    }

    private function calculate_subtotal(array $cart): float
    {
        $total = 0.00;
        if (isset($cart['line_items'])) {
            foreach ($cart['line_items'] as $item) {
                $total += (float) $item['line_subtotal'];
            }
        }
        if (isset($cart['scheduled_service'])) {
            foreach ($cart['scheduled_service'] as $item) {
                $total += (float) $item['booking_subtotal'];
            }
        }
        if (isset($cart['adhoc_service'])) {
            foreach ($cart['adhoc_service'] as $item) {
                $total += (float) $item['booking_subtotal'];
            }
        }
        return $total;
    }

    private function add_product_to_cart(int $business_id): array
    {
        // retrieve data
        $fields = ['product_variant_id', 'product_name', 'product_variant_name', 'line_quantity', 'unit_price', 'item_need_delivery'];
        $item   = [];
        foreach ($fields as $field) {
            $item[$field] = $this->request->getPost($field);
        }
        $item['line_subtotal'] = $item['line_quantity'] * $item['unit_price'];
        // session
        $session      = \Config\Services::session();
        $cart         = $session->get('cart');
        if (!isset($cart['business_id'])) {
            $cart = $this->add_card_detail($business_id);
        } else if ($business_id != $cart['business_id']) {
            $session->remove('cart');
            $cart = $this->add_card_detail($business_id);
        }
        $cart['line_items']                                    = $cart['line_items'] ?? [];
        $cart['line_items']['P' . $item['product_variant_id']] = $item;
        $sub_total              = $this->calculate_subtotal($cart);
        $cart['order_subtotal'] = $sub_total;
        $cart['order_total']    = $sub_total;
        $session->set('cart', $cart);
        return [
            'status'  => true,
            'message' => 'OK',
            'cart'    => $cart,
        ];
    }

    private function add_scheduled_service_to_cart(int $business_id): array
    {
        // retrieve data
        $fields = ['service_variant_id', 'session_id', 'service_name', 'service_variant_name', 'booking_quantity', 'unit_price'];
        $item   = [];
        foreach ($fields as $field) {
            $item[$field] = $this->request->getPost($field);
        }
        $item['booking_subtotal'] = $item['booking_quantity'] * $item['unit_price'];
        // session
        $session      = \Config\Services::session();
        $cart         = $session->get('cart');
        if (!isset($cart['business_id'])) {
            $cart = $this->add_card_detail($business_id);
        } else if ($business_id != $cart['business_id']) {
            $session->remove('cart');
            $cart = $this->add_card_detail($business_id);
        }
        $cart['scheduled_service']                                    = $cart['scheduled_service'] ?? [];
        $cart['scheduled_service']['S' . $item['service_variant_id']] = $item;
        $sub_total              = $this->calculate_subtotal($cart);
        $cart['order_subtotal'] = $sub_total;
        $cart['order_total']    = $sub_total;
        $session->set('cart', $cart);
        return [
            'status'  => true,
            'message' => 'OK',
            'cart'    => $cart,
        ];
    }

    private function add_adhoc_service_to_cart(int $business_id): array
    {
        // retrieve data
        $fields = ['service_variant_id', 'service_name', 'service_variant_name', 'booking_quantity', 'unit_price', 'resource_id', 'user_id', 'time_start_local', 'time_end_local'];
        $item   = [];
        foreach ($fields as $field) {
            $item[$field] = $this->request->getPost($field);
        }
        $item['session_id']       = 0;
        $item['booking_subtotal'] = $item['booking_quantity'] * $item['unit_price'];
        // session
        $session      = \Config\Services::session();
        $cart         = $session->get('cart');
        if (!isset($cart['business_id'])) {
            $cart = $this->add_card_detail($business_id);
        } else if ($business_id != $cart['business_id']) {
            $session->remove('cart');
            $cart = $this->add_card_detail($business_id);
        }
        $cart['adhoc_service']                                    = $cart['adhoc_service'] ?? [];
        $cart['adhoc_service']['A' . $item['service_variant_id']] = $item;
        $sub_total              = $this->calculate_subtotal($cart);
        $cart['order_subtotal'] = $sub_total;
        $cart['order_total']    = $sub_total;
        $session->set('cart', $cart);


        $session      = Services::session();
        $cart         = $session->get('cart');
        if (!isset($card['business_id'])) {
            $cart = $this->add_card_detail($business_id, $item['line_subtotal']);
        }
        if (!isset($cart['adhoc_service'])) {
            $cart['adhoc_service'] = [];
        }
        $cart['adhoc_service'][$item['service_variant_id']] = $item;
        $session->set('cart', $cart);
        return [
            'status'  => true,
            'message' => 'OK',
            'cart'    => $cart,
        ];
    }

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
            'page_title'   => $business['business_name'],
            'description'  => $business['mart_meta_description'],
            'keywords'     => $business['mart_meta_keywords'],
            'url_part'     => '@' . $slug . '/service-booking/' . $service_slug . '/' . $variant_slug . '/slots',
            'locale'       => $locale,
            'slug'         => $slug,
            'service_slug' => $service_slug,
            'variant_slug' => $variant_slug,
            'business'     => $business,
            'schedule_url' => getenv('otterplex_url') . 'api/v1.0/' . str_replace('-', '/', $locale) . '/service/slot-retrieve/' . $variant_slug
        ];
        return view('service_booking_slots', $data);
    }

    public function service_booking_schedules(string $slug, string $service_slug, string $variant_slug): string
    {
        $business = $this->get_business_info($slug);
        $locale   = $this->request->getLocale();
        $data     = [
            'page_title'   => $business['business_name'],
            'description'  => $business['mart_meta_description'],
            'keywords'     => $business['mart_meta_keywords'],
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

    public function add_to_cart(string $slug): ResponseInterface
    {
        $business = $this->get_business_info($slug);
        $session  = \Config\Services::session();
        $cart     = $session->get('cart');
        $type     = $this->request->getPost('item_type');
        $response = [
            'status'  => false,
            'message' => 'TYPE=' . $type,
            'cart'    => $cart,
        ];
        if ('product' == $type) {
            $response = $this->add_product_to_cart($business['id']);
        } else if ('scheduled-service' == $type) {
            $response = $this->add_scheduled_service_to_cart($business['id']);
        } else if ('adhoc-service' == $type) {
            $response = $this->add_adhoc_service_to_cart($business['id']);
        }
        return $this->response->setJSON($response);
    }

    public function remove_from_cart(string $slug): ResponseInterface
    {
        return $this->response->setJSON([]);
    }

    public function get_cart(string $slug): ResponseInterface
    {
        $session      = Services::session();
        return $this->response->setJSON([
            'status'  => true,
            'message' => 'OK',
            'cart'    => $session->get('cart'),
        ]);
    }

    public function clear_cart(string $slug): ResponseInterface
    {
        $session      = Services::session();
        $session->remove('cart');
        return $this->response->setJSON([
            'status'  => true,
            'message' => 'OK',
            'cart'    => $session->get('cart'),
        ]);
    }
}
