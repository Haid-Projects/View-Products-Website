<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GuestCartMergeController;


Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/category/{id}', [ProductController::class, 'productsInCategory'])->name('products.inCategory');

Route::post('/cart/add/{productVariantId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update/{productVariantId}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{productVariantId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{orderId}', [OrderController::class, 'show'])->name('orders.show');

Route::post('/guest/cart/merge', [GuestCartMergeController::class, 'mergeCart'])->name('guest.cart.merge');

