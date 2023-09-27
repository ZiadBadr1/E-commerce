<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\DeleteImageAction;
use App\Models\Product;

class DeleteProductImagesAction
{
    public function execute(Product $product)
    {
        if ($product->images->count() > 0) {
            foreach ($product->images as $image) {
                (new DeleteImageAction)->execute($image->url);
                $image->delete();
            }
        }
    }
}
