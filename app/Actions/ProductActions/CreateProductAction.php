<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class CreateProductAction
{
    public function execute(array $productData)
    {
        $product = Product::create($productData);

        // todo Store product images

    }
}
