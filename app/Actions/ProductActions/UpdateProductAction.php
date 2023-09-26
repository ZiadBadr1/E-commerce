<?php

namespace App\Actions\ProductActions;

use App\Models\Product;
use App\Data\ProductData;

class UpdateProductAction
{
    public function execute(Product $product,ProductData $productData)
    {
        $product->update($productData->toArray());

        // todo update product images if request has images
    }
}
