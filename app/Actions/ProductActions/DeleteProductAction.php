<?php

namespace App\Actions\ProductActions;

use App\Models\Product;

class DeleteProductAction
{
    public function execute(Product $product)
    {
        // todo delete product photos

        $product->delete();
    }
}
