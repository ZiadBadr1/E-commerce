<?php


use App\Http\Controllers\Dashboard\Seller\SellerCategoriesController;
use App\Http\Controllers\Dashboard\Seller\SellerDashboardController;

Route::group([
    'prefix' => 'dashboard/seller',
    'middleware' => ['auth', 'role:seller'],
], function () {
    Route::get('', [SellerDashboardController::class, 'index'])->name('seller.dashboard.index');

    //--- Categories
    Route::controller(SellerCategoriesController::class)->prefix('categories/')->name('seller.categories.')->group(function () {
        Route::get('','index')->name('index');
    });
});
