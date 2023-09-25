<?php

use App\Http\Controllers\Dashboard\Admin\AdminCategoriesController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\AdminProductsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
], function () {

    Route::resource('categories', AdminCategoriesController::class);

    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('products', AdminProductsController::class);
});
