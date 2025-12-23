<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'locale' => $this->request->getLocale(),
        ];
        return view('home', $data);
    }

    public function shop_home(string $slug): string
    {
        $data = [
            'locale' => $this->request->getLocale(),
            'slug'   => $slug,
        ];
        return view('store_front', $data);
    }

    public function shop_booking(string $slug): string
    {
        $data = [
            'locale' => $this->request->getLocale(),
            'slug'   => $slug,
        ];
        return view('store_main', $data);
    }
}
