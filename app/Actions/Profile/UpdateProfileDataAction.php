<?php

namespace App\Actions\Profile;

use App\Models\User;

class UpdateProfileDataAction
{
    public function execute(User $user , $request)
    {
        $user->update($request);
    }
}
