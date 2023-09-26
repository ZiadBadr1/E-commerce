<?php

namespace App\Actions\ProductActions;

use App\Data\ProductData;
use App\Models\Product;

class CreateProductAction
{
    public function execute(ProductData $productData)
    {
        $product = Product::create($productData->toArray());

        // todo Store product images

    }
}
