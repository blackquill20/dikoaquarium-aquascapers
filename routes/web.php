<?php

use App\Http\Controllers\GambarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\ProdukController;

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [ProdukController::class, 'index'])->name('view_produk');
    Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
    Route::get('/gambar', [GambarController::class, 'index'])->name('gambar');
    Route::get('/add_kategori', [KategoryController::class, 'index'])->name('add_kategori');
    Route::post('/save_kategori', [KategoryController::class, 'save'])->name('store_kategori');
    Route::post('/save_produk', [ProdukController::class, 'save'])->name('store_produk');
});


Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
