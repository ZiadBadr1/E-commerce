<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class GetAllProductsAction
{
    public function execute(array $filters = null)
    {
        if ($filters) {
            $products = Product::with('store' , 'category' , 'images')->filter($filters)->get();
        } else {
            $products = Product::all();
        }

        return $products;
    }
}
