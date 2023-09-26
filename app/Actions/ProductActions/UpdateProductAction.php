<?php

namespace App\Actions\ProductActions;

use App\Data\ProductData;
use App\Models\Product;

class UpdateProductAction
{
    public function execute(Product $product, ProductData $productData)
    {
        $product->update($productData->toArray());

        // todo update product images if request has images
    }
}
