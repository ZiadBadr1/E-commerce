<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public string $name,
        public float $price,
        public int $in_stock,
        public int $store_id,
        public string $description,
        public float $discount_precentage,
        public int $category_id,
        public bool $is_active,
        public ?array $images = [],
    ) {
    }
}
