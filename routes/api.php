<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PenggunaController;

Route::apiResource('media', MediaController::class)
    ->parameters(['media' => 'media']);
    
Route::get('/pengguna/{pengguna}/koleksi', [PenggunaController::class, 'koleksi']);

Route::post('/pengguna/{pengguna}/koleksi/{media}', [PenggunaController::class, 'tambahKoleksi']);

Route::delete('/pengguna/{pengguna}/koleksi/{media}', [PenggunaController::class, 'hapusKoleksi']);