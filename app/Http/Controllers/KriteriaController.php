<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    // Menampilkan Halaman Tabel Kriteria
    public function index()
    {
        $kriterias = Kriteria::paginate(10);
        return view('kriteria.kriteria', compact('kriterias'));
    }

    // Mengarahkan ke halaman resources/views/kriteria/create.blade.php
    public function create()
    {
        return view('kriteria.create');
    }

    // Memproses Penyimpanan Data Kriteria Baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kriterias,kode',
            'nama' => 'required',
            'jenis' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|between:0,1',
        ]);

        // Ambil semua data KECUALI _token agar tidak eror mass assignment
        Kriteria::create($request->except('_token'));
        
        // Tetap menggunakan 'success' -> Hijau
        return redirect()->route('kriteria')->with('success', 'Kriteria berhasil ditambahkan!');
    }

    // Mengarahkan ke halaman resources/views/kriteria/edit.blade.php
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    // Memproses Pembaruan Data Kriteria Lama
    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:kriterias,kode,' . $id,
            'nama' => 'required',
            'jenis' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|between:0,1',
        ]);

        // Buang _token dan _method PUT sebelum diupdate ke database
        $kriteria->update($request->except(['_token', '_method']));
        
        // DIUBAH: Menggunakan 'info' -> Biru
        return redirect()->route('kriteria')->with('info', 'Kriteria berhasil diperbarui!');
    }

    // Memproses Penghapusan Data Kriteria
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        
        // DIUBAH: Menggunakan 'danger' -> Merah
        return redirect()->route('kriteria')->with('danger', 'Kriteria berhasil dihapus!');
    }
}