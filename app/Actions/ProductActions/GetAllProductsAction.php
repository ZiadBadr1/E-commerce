<?php

namespace App\Actions\ProductActions;

use App\Models\Product;
use App\Enums\Pagination;

class GetAllProductsAction
{
    public function execute(array $filters = [])
    {
        $products = Product::with(['category', 'images'])->filter($filters)->latest()->paginate(Pagination::DEFAULT->value);

        return $products;
    }
}
