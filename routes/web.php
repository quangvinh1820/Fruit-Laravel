<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::middleware(['admin'])->group(function () {
    // Admin Ui
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // Category CRUD
    Route::get('/category_page', [CategoryController::class, 'category']);
    Route::post('/add_category', [CategoryController::class, 'add_category']);
    Route::get('/cat_delete/{id}', [CategoryController::class, 'cat_delete']);
    Route::post('/cat_update/{id}', [CategoryController::class, 'cat_update']);
    // Product CRUD
    Route::get('/add_product', [ProductController::class, 'add_product']);
    Route::post('/store_product', [ProductController::class, 'store_product']);
    Route::get('/show_product', [ProductController::class, 'show_product']);
    Route::get('/product_delete/{id}', [ProductController::class, 'product_delete']);
    Route::get('/product_update/{id}', [ProductController::class, 'product_update']);
    Route::post('/update_product/{id}', [ProductController::class, 'update_produte']);
});



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/shop-detail', [HomeController::class, 'shopdetail']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/checkout', [HomeController::class, 'checkout']);



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



