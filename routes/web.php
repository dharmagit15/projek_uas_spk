<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// ===================================================
// Punya Kelola Alternatif (Jangan Ditimpa / Diubah)
// ===================================================
Route::resource('alternatif', AlternatifController::class);
Route::get('/alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
Route::post('/alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::get('/alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
Route::put('/alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::delete('/alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

// ===================================================
// Kelola Kriteria
// ===================================================
Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::put('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

// ===================================================
// Penilaian & Perhitungan SAW
// ===================================================
Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');

// Form input nilai kriteria warga
Route::get('/penilaian/input/{id}', [SawController::class, 'formNilai'])->name('penilaian.create');
// Memproses penyimpanan nilai kriteria ke database
Route::post('/penilaian/store/{id}', [SawController::class, 'simpanNilai'])->name('penilaian.store');

// Rute untuk Perhitungan SAW (Menggunakan SawController sesuai update terbaru)
Route::get('/perhitungan', [SawController::class, 'hitungSaw'])->name('perhitungan.index');
// Jika butuh controller yang lama, buka komentar di bawah ini dan hapus baris di atas:
// Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');

// ===================================================
// Laporan
// ===================================================
// Letakkan di dalam grup middleware auth jika ada
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/cetak-pdf', [LaporanController::class, 'cetakPdf'])->name('laporan.pdf');