<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::filter(request(['status', 'type', 'name']))->latest()->get()->except(['id' => auth()->user()->id]);
        User::find(2);

        return view('dashboard.admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return Redirect::route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->back()->with('success', 'User restored successfully.');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->filter(request(['status']))->latest()->get();

        return view('dashboard.admin.users.trash', compact('users'));
    }

    public function forceDelete(string $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        $user->forceDelete();

        return redirect()->back()->with('success', 'User deleted forever');
    }
}
