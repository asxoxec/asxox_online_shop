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
    Route::get('product/restore/{id}',[ProductController::class,'restoreproudct'])->name('product.restore');
    Route::resource('detail',DetailController::class);
    Route::get('customer',[CustomerController::class,'index'])->name('customer.index');
    Route::get('order',[OrderController::class,'index'])->name('order.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
