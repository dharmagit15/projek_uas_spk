<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;

Route::get('/', function () {
    return view('welcome');
});

// Punya Kelola Alternatif (Jangan Ditimpa / Diubah)
// ===================================================
Route::resource('alternatif', AlternatifController::class);

//punya Input nilai / Perhitungan
// Pastikan baris ini berada di paling bawah file, tidak terbungkus di dalam Route::middleware(['auth'])
Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');