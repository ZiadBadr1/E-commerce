<?php

namespace App\Actions\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordProfileAction
{
    public function execute(User $user , $request)
    {
        $return = '';
        if(!Hash::check($request['current_password'],$user->password))
        {
            $return = redirect()->route('profile.index')->with('error_change', 'Current password is incorrect');

        }
        else {
            $user->password = Hash::make($request['password']);
            $user->save();
            $return = redirect()->route('profile.index')->with('success_change', 'Your password has been updated');
        }
        return $return;
    }
}
