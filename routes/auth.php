<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::resource('register', RegisterController::class)->only(['index', 'store']);
    Route::resource('login' , SessionController::class)->only(['index' ,'store']);
});

Route::delete('logout' , [SessionController::class , 'destroy']);
