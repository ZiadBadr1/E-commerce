<?php

use App\Http\Controllers\Dashboard\Admin\AdminCategoriesController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\AdminProductsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth','role:admin']
], function () {


    Route::controller(AdminCategoriesController::class)->prefix('categories/')->name('categories.')->group(function ()
    {
        Route::get('trashed','trash')->name('trash');
        Route::put('{category}/restore','restore')->name('restore');
        Route::delete('{category}/force-delete','forceDelete')->name('force-delete');
    });
    Route::resource('categories', AdminCategoriesController::class);

    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::controller(AdminProductsController::class)->prefix('products/')->name('products.')->group(function ()
    {
        Route::get('trashed','trash')->name('trash');
        Route::put('{product}/restore','restore')->name('restore');
        Route::delete('{product}/force-delete','forceDelete')->name('force-delete');
    });
    Route::resource('products', AdminProductsController::class);
});
