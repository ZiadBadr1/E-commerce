<?php

namespace App\Actions\CategoryActions;

use App\Actions\ImageActions\StoreImageAction;
use App\Enums\StoringPath;
use App\Models\Category;
use App\Models\Store;

class UpdateCategoryAction
{
    public function execute(Category $category, $categoryData)
    {
        $old_path = $category->image;
        $data = $categoryData;
        if (isset($categoryData['image'])) {
            $data['image'] = null;
            $addFileAction = new StoreImageAction();
            $data['image'] = $addFileAction->execute($categoryData['image'],StoringPath::CATEGORY->value);
        }
        if (isset($category->image)) {
            \Storage::disk('public')->delete($old_path);
        }
        $category->update($data);

    }
}
