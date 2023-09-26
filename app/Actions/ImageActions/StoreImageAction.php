<?php
namespace App\Actions\ImageActions;


class StoreImageAction{
    public function execute($image , $storingPath)
    {
        $path = $image->store($storingPath , 'public');

        return $path;
    }
}
