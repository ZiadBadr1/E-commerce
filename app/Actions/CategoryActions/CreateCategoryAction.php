<?php

namespace App\Actions\CategoryActions;
use App\Models\Category;
use Illuminate\Support\Str;

class CreateCategoryAction
{
    public function execute($categoryData)
    {
        $categoryData['slug'] =Str::slug($categoryData['name']);
        $data = $categoryData;
        $data['image'] = null;
        if (isset($categoryData['image'])) {
            $addFileAction = new AddFileAction();
            $data['image'] = $addFileAction->execute($categoryData['image']);
        }
        $category = Category::create($data);

    }

}
