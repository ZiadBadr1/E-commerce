<?php

namespace App\Actions\CategoryActions;

use App\Actions\ImageActions\DeleteImageAction;
use App\Models\Category;

class ForceDeleteCategoryAction
{
    public function execute(Category $category)
    {
        $path = $category->image;
        $category->forceDelete();
        if ($path) {
            (new DeleteImageAction)->execute($path);
        }
    }
}
