<?php

namespace App\Actions\ProductActions;

use App\Models\Product;
use App\Enums\PaginationPerPage;

class GetAllProductsAction
{
    public function execute(array $filters = [])
    {
        $products = Product::with(['category', 'images'])->filter($filters)->latest()->paginate(PaginationPerPage::DEFAULT->value);

        return $products;
    }
}
