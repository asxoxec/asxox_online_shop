<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\api\TagController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\api\SlideController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\api\CustomerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// User Login & Register
Route::post('login',[ApiController::class,'login'])->name('user.login');
Route::post('register',[ApiController::class,'register'])->name('user.register');

// Category
Route::get('category',[CategoryController::class,'Category_list'])->name('category.list');

// SubCategory
Route::get('subcategory',[CategoryController::class,'SubCategory_list'])->name('subcategory.list');

// Tag
Route::get('tag',[TagController::class,'Tag_list'])->name('tag.list');

// Product
Route::get('product',[ProductController::class,'Product_list'])->name('product.list');

// Testing api Product Create
Route::post('create/product',[ProductController::class,'store'])->name('product.store');

// Customer
Route::get('customer',[CustomerController::class,'Customer_list'])->name('customer.list');

// Testing api customer Create
Route::post('create/customer',[CustomerController::class,'store'])->name('customer.create');

// Order list
Route::get('order',[OrderController::class,'Order_list'])->name('order.list');
// order Create
Route::post('create/order',[OrderController::class,'store'])->name('order.create');

// slide list
Route::get('slide',[SlideController::class,'Slide_list'])->name('slide.list');


Route::group(['middleware'=>'jwt.auth'], function () {
    Route::get('me',[ApiController::class,'me'])->name('me');
});





