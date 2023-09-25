<?php

namespace App\Actions\CategoryActions;

use App\Models\Category;

class DeleteCategoryAction
{
    public function execute(Category $category)
    {
        $path = $category->image;
        Category::destroy($category->id);
        if ($path) {
            \Storage::disk('public')->delete($path);
        }


    }
}
