<?php

namespace App\Actions\CategoryActions;

use App\Actions\ImageActions\StoreImageAction;
use App\Enums\StoringPath;
use App\Models\Category;
use Illuminate\Support\Str;

class CreateCategoryAction
{
    public function execute($categoryData)
    {
        $categoryData['slug'] = Str::slug($categoryData['name']);
        $data = $categoryData;
        $data['image'] = null;

        if (isset($categoryData['image'])) {
            $data['image'] = (new StoreImageAction)->execute($categoryData['image'], StoringPath::CATEGORY->value);
        }

        $category = Category::create($data);

    }
}
