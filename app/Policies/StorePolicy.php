<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StorePolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function createProduct(User $seller, Store $store): bool
    {
        return $this->canOwnTheStore($seller , $store);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $seller, Store $store): bool
    {
        return $this->canOwnTheStore($seller , $store);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $seller, Store $store): bool
    {
        return $this->canOwnTheStore($seller , $store);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $seller, Store $store): bool
    {
        return $this->canOwnTheStore($seller , $store);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $seller, Store $store): bool
    {
        return $this->canOwnTheStore($seller , $store);
    }

    private function canOwnTheStore(User $seller, Store $store){
        return ($store->seller_id == $seller->id) ? true : false;
    }
}
