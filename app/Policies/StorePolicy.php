<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StorePolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $seller, Store $store): bool
    {
        return ($store->seller_id == $seller->id) ? true : false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $seller, Store $store): bool
    {
        return ($store->seller_id == $seller->id) ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $seller, Store $store): bool
    {
        return ($store->seller_id == $seller->id) ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $seller, Store $store): bool
    {
        return ($store->seller_id == $seller->id) ? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $seller, Store $store): bool
    {
        return ($store->seller_id == $seller->id) ? true : false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $seller, Store $store): bool
    {
        return ($store->seller_id == $seller->id) ? true : false;
    }
}
