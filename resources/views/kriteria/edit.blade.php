@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <nav class="flex items-center gap-2 text-on-surface-variant text-xs mb-2">
            <span>Dashboard</span>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <a href="{{ route('kriteria') }}" class="hover:text-primary">Kriteria</a>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <span class="text-primary font-bold">Edit</span>
        </nav>
        <h2 class="text-2xl font-bold text-on-surface">Edit Kriteria ({{ $kriteria->kode }})</h2>
    </div>

    @if($errors->any())
    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm font-medium">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white border border-outline-variant rounded-2xl shadow-sm p-6">
        <form method="POST" action="{{ route('kriteria.update', $kriteria->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-on-surface-variant mb-1">Kode Kriteria</label>
                <input type="text" name="kode" value="{{ old('kode', $kriteria->kode) }}" required class="w-full px-4 py-2 border border-outline-variant rounded-xl text-sm focus:outline-none focus:border-primary">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-on-surface-variant mb-1">Keterangan Kriteria</label>
                <input type="text" name="nama" value="{{ old('nama', $kriteria->nama) }}" required class="w-full px-4 py-2 border border-outline-variant rounded-xl text-sm focus:outline-none focus:border-primary">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-on-surface-variant mb-1">Atribut / Jenis</label>
                <select name="jenis" required class="w-full px-4 py-2 border border-outline-variant rounded-xl text-sm focus:outline-none focus:border-primary">
                    <option value="Benefit" {{ old('jenis', $kriteria->jenis) == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="Cost" {{ old('jenis', $kriteria->jenis) == 'Cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-on-surface-variant mb-1">Bobot (w)</label>
                <input type="number" step="0.01" min="0" max="1" name="bobot" value="{{ old('bobot', $kriteria->bobot) }}" required class="w-full px-4 py-2 border border-outline-variant rounded-xl text-sm focus:outline-none focus:border-primary">
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-outline-variant">
                <a href="{{ route('kriteria') }}" class="px-4 py-2 text-sm font-semibold text-on-surface-variant hover:bg-surface-container rounded-xl text-center">Batal</a>
                <button type="submit" class="px-5 py-2 text-sm font-semibold text-on-primary bg-primary hover:bg-primary-container rounded-xl shadow-sm">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection