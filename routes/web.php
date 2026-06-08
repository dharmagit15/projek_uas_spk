<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DashboardController;

// Halaman utama (bisa diakses siapa saja tanpa login)
Route::get('/', function () {
    return view('welcome');
});

// =========================================================================
// GRUP ROUTE YANG DIPROTEKSI (User WAJIB Login)
// =========================================================================
Route::middleware(['auth'])->group(function () {

    // Rute Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Alternatif
    Route::resource('alternatif', AlternatifController::class);

    // Kelola Kriteria (Diselaraskan menggunakan kriteria.index agar tidak error)
    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

    // Penilaian & Perhitungan SAW
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/penilaian/input/{id}', [SawController::class, 'formNilai'])->name('penilaian.create');
    Route::post('/penilaian/store/{id}', [SawController::class, 'simpanNilai'])->name('penilaian.store');
    Route::get('/perhitungan', [SawController::class, 'hitungSaw'])->name('perhitungan.index');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak-pdf', [LaporanController::class, 'cetakPdf'])->name('laporan.pdf');

});

// =========================================================================
// Memanggil Rute Otentikasi Laravel Breeze (Login, Register, dll)
// =========================================================================
require __DIR__.'/auth.php';