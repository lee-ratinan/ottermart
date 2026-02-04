<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Api extends BaseController
{

    private function add_product_to_cart(): array
    {
        // retrieve data
        $fields = ['product_variant_id', 'product_name', 'product_variant_name', 'line_quantity', 'unit_price', 'item_need_delivery'];
        $item   = [];
        foreach ($fields as $field) {
            $item[$field] = $this->request->getPost($field);
        }
        $item['line_subtotal'] = $item['line_quantity'] * $item['unit_price'];
        // session
        $session      = Services::session();
        $cart         = $session->get('cart');
        if (!isset($cart['line_items'])) {
            $cart['line_items'] = [];
        }
        $cart['line_items'][$item['product_variant_id']] = $item;
        $session->set('cart', $cart);
        return [
            'status'  => true,
            'message' => 'OK',
            'cart'    => $cart,
        ];
    }

    private function add_scheduled_service_to_cart(): array
    {
        // retrieve data
        $fields = ['service_variant_id', 'session_id', 'service_name', 'service_variant_name', 'booking_quantity', 'unit_price'];
        $item   = [];
        foreach ($fields as $field) {
            $item[$field] = $this->request->getPost($field);
        }
        $item['booking_subtotal'] = $item['booking_quantity'] * $item['unit_price'];
        // session
        $session      = Services::session();
        $cart         = $session->get('cart');
        if (!isset($cart['scheduled_service'])) {
            $cart['scheduled_service'] = [];
        }
        $cart['scheduled_service'][$item['service_variant_id']] = $item;
        $session->set('cart', $cart);
        return [
            'status'  => true,
            'message' => 'OK',
            'cart'    => $cart,
        ];
    }

    private function add_adhoc_service_to_cart(): array
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
        $session      = Services::session();
        $cart         = $session->get('cart');
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

    public function add_to_cart(): ResponseInterface
    {
        $session  = Services::session();
        $cart     = $session->get('cart');
        $type     = $this->request->getPost('item_type');
        $response = [
            'status'  => false,
            'message' => 'TYPE=' . $type,
            'cart'    => $cart,
        ];
        if ('product' == $type) {
            $response = $this->add_product_to_cart();
        } else if ('scheduled-service' == $type) {
            $response = $this->add_scheduled_service_to_cart();
        } else if ('adhoc-service' == $type) {
            $response = $this->add_adhoc_service_to_cart();
        }
        return $this->response->setJSON($response);
    }

    public function get_cart(): ResponseInterface
    {
        $session      = Services::session();
        return $this->response->setJSON([
            'status'  => true,
            'message' => 'OK',
            'cart'    => $session->get('cart'),
        ]);
    }
}