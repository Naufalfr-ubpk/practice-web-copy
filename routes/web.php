<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Harus login dulu) - UNTUK CUSTOMER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Keranjang Belanja
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Checkout & Payment
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/payment/{invoice}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::post('/checkout/pay/{invoice}', [CheckoutController::class, 'pay'])->name('checkout.pay');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // Profil User (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Harus login + role admin) - KHUSUS ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show', 'update']);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

   // Rute Baru Praktikum 11: Laporan Penjualan & Cetak View
   Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('index');
        Route::get('/print', [\App\Http\Controllers\Admin\ReportController::class, 'print'])->name('print');
    });
});

// Auth routes dari Breeze (login, register, logout, dll)
require __DIR__.'/auth.php';