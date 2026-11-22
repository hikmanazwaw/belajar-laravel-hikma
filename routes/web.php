<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/home', 'home')->name('home');
    Route::get('/product', 'product')->name('product');
    Route::get('/about', 'about')->name('about');
    Route::get('/produk/detail/{harga}', 'detail')
        ->whereNumber('harga')
        ->name('product.detail');
});

Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

Route::controller(KalkulatorController::class)->prefix('kalkulator')->name('kalkulator.')->group(function () {
    Route::get('/segitiga', 'segitiga')->name('segitiga');
    Route::post('/segitiga', 'hitungSegitiga')->name('segitiga.hitung');
});
