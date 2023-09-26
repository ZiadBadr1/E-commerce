<?php

namespace App\Actions\CategoryActions;

use App\Models\Category;

class UpdateCategoryAction
{
    public function execute(Category $category, $categoryData)
    {
        $old_path = $category->image;
        $data = $categoryData;
        if (isset($categoryData['image'])) {
            $data['image'] = null;
            $addFileAction = new AddFileAction();
            $data['image'] = $addFileAction->execute($categoryData['image']);
        }
        if (isset($data['image'])) {
            \Storage::disk('public')->delete($old_path);
        }
        $category->update($data);

    }
}
