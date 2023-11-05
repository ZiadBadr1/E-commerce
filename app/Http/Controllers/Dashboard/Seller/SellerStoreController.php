<?php

namespace App\Http\Controllers\Dashboard\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerStoreController extends Controller
{
    public function edit()
    {
        $store = auth()->user()->store;

        return view('dashboard.seller.manageStore.edit' , compact('store'));
    }
}
