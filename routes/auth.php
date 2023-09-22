<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPassword\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPassword\ResetPasswordController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::resource('register', RegisterController::class)->only(['index', 'store']);
    Route::resource('login', SessionController::class)->only(['index', 'store']);
    Route::view('reset-password', 'auth.resetPassword.index')->name('reset.index');

    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
    });
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
        Route::post('password/reset', 'reset')->name('password.reset.update');
    });
});

Route::delete('logout', [SessionController::class, 'destroy']);
