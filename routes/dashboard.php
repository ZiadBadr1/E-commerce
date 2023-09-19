<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::resource('dashboard/categories', CategoriesController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');