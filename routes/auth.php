<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::resource('register', RegisterController::class)->middleware('guest')->only(['index', 'store', 'destroy']);
