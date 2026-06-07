@extends('layouts.app') @section('content')
<div class="p-6">
    <div class="text-sm text-gray-500 mb-2">
        Dashboard <span class="mx-2">&gt;</span> <span class="text-blue-600 font-medium">Perhitungan</span>
    </div>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Perhitungan Nilai Alternatif</h1>
            <p class="text-sm text-gray-500 mt-1">Input dan kelola nilai kriteria untuk setiap warga calon penerima bantuan langsung tunai (BLT).</p>
        </div>
        <a href="#" class="bg-[#0b2545] hover:bg-[#133966] text-white font-medium rounded-lg px-4 py-2.5 inline-flex items-center text-sm transition-colors shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Input Nilai Warga
        </a>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold text-center w-16">NO</th>
                        <th scope="col" class="px-6 py-4 font-semibold">NAMA KEPALA KELUARGA</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center">C1 (Penghasilan)</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center">C2 (Tanggungan)</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center">C3 (Kondisi Rumah)</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center w-28">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b border-gray-100">
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Belum ada data nilai alternatif warga yang diinput.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection