<?php

use App\Http\Controllers\Admin\PoppingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PremadedrinksController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'is_admin'])->group(function () { //only admin can enter this routes
    Route::get('/create-product', function () {
        Route::post('tea', [PoppingController::class, 'store']);
        return view('pages.createProduct');
    })->name('create_product');
    Route::post('/create-product/popping', [PoppingController::class, 'store'])->name('popping');
    Route::post('/create-product/product', [ProductController::class, 'store'])->name('product');
    Route::post('/create-product/premade', [PremadedrinksController::class, 'store'])->name('premade');
});
Route::middleware(['auth'])->group(function () { //only connected people can enter this file
    Route::get('/order', [OrderController::class, 'showAll'])->name('choose_own');
    Route::post('/orderCreate', [OrderController::class, 'createOrder'])->name('storage');
    Route::post('/orderOne', [OrderController::class, 'orderOne'])->name('orderOne');
    Route::post('/cart', [OrderController::class, 'showItems'])->name('cart');
    Route::get('/account', [UserController::class, 'showInformation'])->name('account');
    
});

Route::get('/premade', [PremadedrinksController::class, 'index'])->name('showPremade'); 