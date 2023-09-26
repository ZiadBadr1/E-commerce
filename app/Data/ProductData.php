<?php

namespace App\Data;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public string $name,
        public float $price,
        public int $in_stock,
        public int $store_id,
        public int $category_id,
        public bool $is_active,
        public ?UploadedFile $images = null,
    ) {
    }
}
