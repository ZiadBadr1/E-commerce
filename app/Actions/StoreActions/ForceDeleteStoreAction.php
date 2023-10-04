<?php

namespace App\Actions\StoreActions;

use App\Actions\ImageActions\DeleteImageAction;
use App\Models\Store;

class ForceDeleteStoreAction
{
    public function execute(Store $store)
    {
        $logo = $store->logo_image;
        $cover = $store->cover_image;
        $store->forceDelete();
        if ($logo) {
            (new DeleteImageAction)->execute($logo);
        }
        if ($cover) {
            (new DeleteImageAction)->execute($cover);
        }
    }
}
