<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\StoreImageAction;
use App\Data\ProductData;
use App\Enums\StoringPath;
use App\Models\Product;


class CreateProductAction
{
    public function execute(ProductData $productData)
    {
        $product = Product::create($productData->toArray());

        if (count($productData->images) > 0) {
            $this->storeProductImages($product, $productData->images);
        }
    }

    private function storeProductImages(Product $product, array $images)
    {
        foreach ($images as $image) {
            $path = (new StoreImageAction)->execute($image, StoringPath::PRODUCT->value);
            $product->images()->create(['url' => $path]);
        }

    }
}
