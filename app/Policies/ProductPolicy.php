<?php

namespace App\Policies;

use App\Enums\UserTypes;
use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function edit(User $user, Product $product): bool
    {
        return $this->canPerformAction($user, $product);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $this->canPerformAction($user, $product);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $this->canPerformAction($user, $product);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return $this->canPerformAction($user, $product);
    }

    private function canPerformAction(User $user, Product $product): bool
    {
        if ($user->type == UserTypes::SELLER->value && $product->store_id != $user->store->id) {
            return false;
        }

        return true;
    }
}
