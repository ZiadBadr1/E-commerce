<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class GetAllProductsAction
{
    public function execute(array $filters = null)
    {
        $products = ($filters) ? Product::with(['store', 'category', 'images'])->filter($filters)->latest()->get() : Product::with(['store', 'category', 'images'])->latest()->get();

        return $products;
    }
}
