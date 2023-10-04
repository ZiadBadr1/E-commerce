<?php

namespace App\Actions\StoreActions;

use App\Enums\PaginationPerPage;
use App\Models\Store;

class IndexStoreAction
{
    public function execute()
    {
        $request = request();
        $stores = Store::filter($request->query())->paginate(5);
        return $stores;
    }
}
