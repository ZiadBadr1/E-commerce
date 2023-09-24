<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class UpdateProductAction
{
    public function execute(Product $product, array $productData)
    {
        $product->update($productData);

        // todo update product images if request has images
    }
}
