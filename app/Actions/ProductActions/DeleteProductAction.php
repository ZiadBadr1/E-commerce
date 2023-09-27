<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class DeleteProductAction
{
    public function execute(Product $product)
    {
        (new DeleteProductImagesAction)->execute($product);

        $product->delete();
    }
}
