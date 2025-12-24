<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'page_title'  => lang('System.home-page'),
            'description' => lang('System.description'),
            'keywords'    => lang('System.keywords'),
            'url_part'    => '',
            'locale'      => $this->request->getLocale(),
        ];
        return view('home', $data);
    }

    public function shop_home(string $slug): string
    {
        $data = [
            'page_title'  => '[page title]',
            'description' => lang('System.description'),
            'keywords'    => lang('System.keywords'),
            'url_part'    => '@' . $slug,
            'locale'      => $this->request->getLocale(),
            'slug'        => $slug,
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
        return view('store_main', $data);
    }
}
