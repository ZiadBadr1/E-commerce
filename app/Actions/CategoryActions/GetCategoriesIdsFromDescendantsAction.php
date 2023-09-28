<?php

namespace App\Actions\CategoryActions;

use Illuminate\Database\Eloquent\Collection;

class GetCategoriesIdsFromDescendantsAction
{
    public function execute(Collection $descendants)
    {
        $ids = [];
        $descendants->load('children');
        
        foreach ($descendants as $category) {
            $ids[] = $category->id;
            if ($category->children->isNotEmpty()) {
                $ids = array_merge($ids, $this->execute($category->children));
            }
        }

        return $ids;
    }
}
