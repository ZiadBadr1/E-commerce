<?php

namespace App\Actions\CategoryActions;

class AddFileAction
{
    public function execute($image)
    {
        $path = $image->store('Categories_image',  'public');
        return $path;
    }
}
