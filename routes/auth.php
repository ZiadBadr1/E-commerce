<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::resource('register', RegisterController::class)->only(['index', 'store']);
    Route::resource('login' , SessionController::class)->only(['index' ,'store']);
    Route::view('reset-password', 'auth.resetPassword.index')->name('reset.index');
});

Route::delete('logout' , [SessionController::class , 'destroy']);
