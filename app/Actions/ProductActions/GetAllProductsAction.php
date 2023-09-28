<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class GetAllProductsAction
{
    public function execute(array $filters = [])
    {
        $products = Product::with(['category', 'images'])->filter($filters)->latest()->get();

        return $products;
    }
}
