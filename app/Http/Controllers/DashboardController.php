<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;   // Pastikan nama Model Kriteria Anda sudah sesuai
use App\Models\Alternatif; // Pastikan nama Model Alternatif Anda sudah sesuai

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Mengambil total jumlah data dari database
        $totalKriteria = Kriteria::count();
        $totalAlternatif = Alternatif::count();

        // 2. Mengambil semua data kriteria untuk ditampilkan di tabel dashboard
        $daftarKriteria = Kriteria::all();

        // 3. Mengirimkan data ke view dashboard/index.blade.php
        return view('dashboard.index', compact('totalKriteria', 'totalAlternatif', 'daftarKriteria'));
    }
}