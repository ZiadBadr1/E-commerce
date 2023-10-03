<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get()->except(['id' => auth()->user()->id]);

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        return view('dashboard.users.trash', compact('users'));
    }

    public function forceDelete(string $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        $user->forceDelete();

        return redirect()->back()->with('success', 'User deleted forever');
    }

}
