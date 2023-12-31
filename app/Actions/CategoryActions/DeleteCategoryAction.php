<?php

namespace App\Actions\CategoryActions;

use App\Actions\ImageActions\DeleteImageAction;
use App\Models\Category;

class DeleteCategoryAction
{
    public function execute(Category $category)
    {
        Category::destroy($category->id);
    }
}
