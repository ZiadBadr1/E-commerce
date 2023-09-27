<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\StoreImageAction;
use App\Data\ProductData;
use App\Enums\StoringPath;
use App\Models\Product;
use App\Models\ProductImage;

class UpdateProductAction
{
    public function execute(Product $product, ProductData $productData)
    {
        $product->update($productData->toArray());

        if (count($productData->images) > 0) {
            (new DeleteProductImagesAction)->execute($product);

            $this->storeProductImages($productData->images, $product->id);
        }
    }

    private function storeProductImages(array $images, int $productId)
    {
        foreach ($images as $image) {
            $path = (new StoreImageAction)->execute($image, StoringPath::PRODUCT->value);
            ProductImage::create([
                'product_id' => $productId,
                'url' => $path,
            ]);
        }

    }
}
