<?php

namespace App\Actions\CategoryActions;

use App\Actions\ImageActions\DeleteImageAction;
use App\Models\Category;

class DeleteCategoryAction
{
    public function execute(Category $category)
    {
        $path = $category->image;

        Category::destroy($category->id);

        if ($path) {
            (new DeleteImageAction)->execute($path);
        }
    }
}
