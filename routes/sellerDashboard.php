<?php


use App\Http\Controllers\Dashboard\Seller\SellerCategoriesController;
use App\Http\Controllers\Dashboard\Seller\SellerDashboardController;
use App\Http\Controllers\Dashboard\Seller\SellerProductController;

Route::group([
    'prefix' => 'dashboard/seller',
    'middleware' => ['auth', 'role:seller'],
    'as' => 'dashboard.seller.'
], function () {
    Route::get('', [SellerDashboardController::class, 'index'])->name('dashboard.index');

    //--- Categories
    Route::controller(SellerCategoriesController::class)->prefix('categories/')->name('categories.')->group(function () {
        Route::get('','index')->name('index');
    });

    // Products
    Route::controller(SellerProductController::class)->prefix('products/')->name('products.')->group(function () {
        Route::get('trashed', 'trash')->name('trash');
        Route::put('{product}/restore', 'restore')->name('restore');
        Route::delete('{product}/force-delete', 'forceDelete')->name('force-delete');
    });
    Route::resource('products', SellerProductController::class);

});
