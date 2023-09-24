<?php

use App\Http\Controllers\Dashboard\Admin\AdminProductsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
], function () {

    Route::resource('categories', CategoriesController::class);
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('products', AdminProductsController::class);
});
