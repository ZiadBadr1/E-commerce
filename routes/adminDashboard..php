<?php

use App\Http\Controllers\Dashboard\Admin\AdminCategoriesController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\AdminProductsController;
use App\Http\Controllers\Dashboard\Admin\AdminStoreController;
use App\Http\Controllers\Dashboard\Admin\AdminUsersController;
use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard/admin',
    'middleware' => ['auth', 'role:admin'],
], function () {
    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    //--- Categories
    Route::controller(AdminCategoriesController::class)->prefix('categories/')->name('categories.')->group(function () {
        Route::get('trashed', 'trash')->name('trash');
        Route::put('{category}/restore', 'restore')->name('restore');
        Route::delete('{category}/force-delete', 'forceDelete')->name('force-delete');
    });
    Route::resource('categories', AdminCategoriesController::class);

    //--- Products
    Route::controller(AdminProductsController::class)->prefix('products/')->name('products.')->group(function () {
        Route::get('trashed', 'trash')->name('trash');
        Route::put('{product}/restore', 'restore')->name('restore');
        Route::delete('{product}/force-delete', 'forceDelete')->name('force-delete');
    });
    Route::resource('products', AdminProductsController::class)->except('show','create','store');


    //--- Users
    Route::resource('users', AdminUsersController::class, ['names' => 'admin.users'])->except(['show']);
    Route::controller(AdminUsersController::class)->prefix('users')->name('admin.users.')->group(function () {
        Route::get('trashed', 'trash')->name('trash');
        Route::put('{user}/restore', 'restore')->name('restore');
        Route::delete('{user}/force-delete', 'forceDelete')->name('force-delete');
    });

    //--- Stores
    Route::controller(AdminStoreController::class)->prefix('store')->name('store.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('trashed', 'trash')->name('trash');
        Route::get('{store}/edit', 'edit')->name('edit');
        Route::put('{store}/update', 'update')->name('update');
        Route::delete('{store}', 'destroy')->name('destroy');
        Route::put('{store}/restore', 'restore')->name('restore');
        Route::delete('{store}/force-delete', 'forceDelete')->name('force-delete');
    });

    //--- Profile
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function (){
        Route::get('','index')->name('index');
        Route::put('update','update')->name('update');
        Route::put('changePassword','changePassword')->name('changePassword');
    });

});

