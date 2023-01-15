<?php

use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\ProdukKategoriController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('produk', [ProdukController::class, 'all']);
Route::get('kategori', [ProdukKategoriController::class, 'all']);

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('transaksi', [TransaksiController::class, 'all']);
    Route::post('checkout', [TransaksiController::class, 'checkout']);
});