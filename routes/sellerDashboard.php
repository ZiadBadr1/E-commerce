<?php


use App\Http\Controllers\Dashboard\Seller\SellerCategoriesController;
use App\Http\Controllers\Dashboard\Seller\SellerDashboardController;
use App\Http\Controllers\Dashboard\Seller\SellerProductController;

Route::group([
    'prefix' => 'dashboard/seller',
    'middleware' => ['auth', 'role:seller'],
], function () {
    Route::get('', [SellerDashboardController::class, 'index'])->name('seller.dashboard.index');

    //--- Categories
    Route::controller(SellerCategoriesController::class)->prefix('categories/')->name('seller.categories.')->group(function () {
        Route::get('','index')->name('index');
    });

    // Products
    Route::controller(SellerProductController::class)->prefix('products/')->name('seller.products.')->group(function () {
        Route::get('trashed', 'trash')->name('trash');
        Route::put('{product}/restore', 'restore')->name('restore');
        Route::delete('{product}/force-delete', 'forceDelete')->name('force-delete');
    });
    Route::resource('products', SellerProductController::class)->names(
        [
            'index' => 'seller.products.index',
            'edit' => 'seller.products.edit',
            'update' => 'seller.products.update',
            'create' => 'seller.products.create',
            'store' => 'seller.products.store',
            'destroy' => 'seller.products.destroy',
        ]
    );



});
