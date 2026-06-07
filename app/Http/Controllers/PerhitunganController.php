<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        // Nantinya data kriteria dan alternatif akan diambil dari database di sini
        return view('perhitungan.index');
    }
}