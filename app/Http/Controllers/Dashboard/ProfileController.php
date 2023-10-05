<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Profile\ChangePasswordProfileAction;
use App\Actions\Profile\UpdateProfileDataAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePasswordRequest;
use App\Http\Requests\Profile\UpdateProfileDataRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('dashboard.admin.profile.index',compact('user'));
    }
    public function update(UpdateProfileDataRequest $request ,UpdateProfileDataAction $updateProfileDataAction)
    {
        $user = auth()->user();
        $updateProfileDataAction->execute($user,$request->validated());
        return redirect()->route('profile.index')->with('success_data','Data updated successfully');
    }
    public function changePassword(ChangePasswordRequest $request , ChangePasswordProfileAction $changePasswordProfileAction)
    {
        $user = auth()->user();
//        dd($request->validated());
        return $changePasswordProfileAction->execute($user,$request->validated());

    }
}
