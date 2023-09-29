<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreSessionRequest;
use Auth;
use Redirect;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request)
    {
        if (! Auth::attempt($request->validated())) {
            return Redirect::back()->with('fail', 'Credentials does not work')->withInput(['email' => $request->email]);
        }

        return redirect(route('dashboard.index'))->with('success', 'User logged in successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::user()->logout();

        return redirect(route('dashboard.index'))->with('success', 'User logged out successfully');
    }
}
