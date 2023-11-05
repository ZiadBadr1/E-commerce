<?php

use App\Enums\UserTypes;
use App\Http\Controllers\Dashboard\Seller\SellerCategoriesController;
use App\Http\Controllers\Dashboard\Seller\SellerDashboardController;
use App\Http\Controllers\Dashboard\Seller\SellerProductController;
use App\Http\Controllers\Dashboard\Seller\SellerStoreController;

Route::group([
    'prefix' => 'dashboard/seller',
    'middleware' => ['auth', 'role:' . UserTypes::SELLER->value],
    'as' => 'dashboard.seller.'
], function () {
    Route::get('', [SellerDashboardController::class, 'index'])->name('dashboard.index');

    //--- Categories
    Route::controller(SellerCategoriesController::class)->prefix('categories/')->name('categories.')->group(function () {
        Route::get('', 'index')->name('index');
    });

    // Products
    Route::resource('products', SellerProductController::class);
    Route::controller(SellerProductController::class)->prefix('products/')->name('products.')->group(function () {
        Route::get('trashed', 'trash')->name('trash');
        Route::put('{product}/restore', 'restore')->name('restore');
        Route::delete('{product}/force-delete', 'forceDelete')->name('force-delete');
    });

    // Editing store
    Route::get('store/edit' , [SellerStoreController::class , 'edit'])->name('store.edit');
});
