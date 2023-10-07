<?php

namespace App\Http\Controllers\Dashboard\Seller;

use App\Http\Controllers\Controller;

class SellerDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
