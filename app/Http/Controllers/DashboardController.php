<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKriteria = Kriteria::count();
        
        // Memanggil file index.blade.php di root folder views
        return view('dashboard.index', compact('totalKriteria'));
    }
}