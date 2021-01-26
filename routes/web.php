<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SubCategoryController;

Route::view('/','admin.site.dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubCategoryController::class);
    Route::resource('tag',TagController::class);
    Route::resource('product',ProductController::class);
    Route::resource('detail',DetailController::class);
    Route::get('customer',[CustomerController::class,'index'])->name('admin.customer.list');
    Route::get('order',[OrderController::class,'index'])->name('admin.order.list');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
