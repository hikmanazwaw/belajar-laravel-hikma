<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'create'])->name('login');
    Route::get('/login', [AuthController::class, 'create'])->name('login.form');
    Route::post('/login', [AuthController::class, 'store'])
        ->middleware('throttle:login')
        ->name('login.store');
});

Route::middleware(['auth', 'cache.headers:no_store;private'])->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    Route::controller(DashboardController::class)->group(function () {
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

    Route::resource('employes', EmployeController::class);

    Route::controller(KalkulatorController::class)->prefix('kalkulator')->name('kalkulator.')->group(function () {
        Route::get('/segitiga', 'segitiga')->name('segitiga');
        Route::post('/segitiga', 'hitungSegitiga')->name('segitiga.hitung');
    });
});
