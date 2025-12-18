<?php

namespace App\Controllers;

use App\Models\BusinessMasterModel;

class Home extends BaseController
{
    public function index(): string
    {
        return 'HOME PAGE';
    }

    public function shop_home(string $slug): string
    {
        $businessModel = new BusinessMasterModel();
        $business      = $businessModel->getBusiness($slug);
        return json_encode($business);
    }

    public function shop_booking(string $slug): string
    {
        return 'BOOKING FOR ' . $slug;
    }
}
