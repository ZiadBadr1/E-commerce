<?php

namespace App\Actions\StoreActions;

use App\Models\Store;

class DeleteStoreAction
{
    public function execute(Store $store)
    {
        $store->delete();
    }
}
