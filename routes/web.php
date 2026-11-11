<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/home', 'home')->name('home');
    Route::get('/product', 'product')->name('product');
    Route::get('/about', 'about')->name('about');
    Route::get('/produk/detail/{harga}', 'detail')
        ->whereNumber('harga')
        ->name('product.detail');
});
