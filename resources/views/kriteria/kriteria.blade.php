@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-600 rounded-xl text-sm flex items-center gap-2 font-medium">
    <span class="material-symbols-outlined text-lg">check_circle</span>
    {{ session('success') }}
</div>
@endif

@if(session('info'))
<div class="mb-4 p-4 bg-blue-50 border border-blue-200 text-blue-600 rounded-xl text-sm flex items-center gap-2 font-medium">
    <span class="material-symbols-outlined text-lg">info</span>
    {{ session('info') }}
</div>
@endif

@if(session('danger'))
<div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm flex items-center gap-2 font-medium">
    <span class="material-symbols-outlined text-lg">delete_forever</span>
    {{ session('danger') }}
</div>
@endif

<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
    <div>
        <nav class="flex items-center gap-2 text-on-surface-variant text-xs mb-2">
            <span>Dashboard</span>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <span class="text-primary font-bold">Kriteria</span>
        </nav>
        <h2 class="text-2xl font-bold text-on-surface">Kelola Kriteria</h2>
    </div>
    <a href="{{ route('kriteria.create') }}" class="bg-primary hover:bg-primary-container text-on-primary px-6 py-2.5 rounded-xl flex items-center gap-2 font-semibold shadow-sm transition-all active:scale-95 text-sm">
        <span class="material-symbols-outlined text-[20px]">add_box</span>
        <span>Tambah Kriteria</span>
    </a>
</div>

<div class="bg-white border border-outline-variant rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse table-fixed min-w-[800px]">
            <thead>
                <tr class="bg-surface-bright text-on-surface-variant text-xs uppercase tracking-wider border-b border-outline-variant">
                    <th class="px-6 py-4 font-semibold w-16 text-center">No</th>
                    <th class="px-6 py-4 font-semibold w-32 text-center">Kriteria (Ci)</th>
                    <th class="px-6 py-4 font-semibold text-left">Keterangan Kriteria</th>
                    <th class="px-6 py-4 font-semibold w-36 text-center">Atribut</th>
                    <th class="px-6 py-4 font-semibold w-32 text-center">Bobot (w)</th>
                    <th class="px-6 py-4 font-semibold w-28 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-on-surface divide-y divide-outline-variant/30">
                @forelse($kriterias as $index => $kriteria)
                <tr class="hover:bg-surface-container-low transition-colors group">
                    <td class="px-6 py-4 text-center text-on-surface-variant font-medium">{{ $kriterias->firstItem() + $index }}</td>
                    <td class="px-6 py-4 text-center font-mono font-bold text-primary">{{ $kriteria->kode }}</td>
                    <td class="px-6 py-4 font-medium">{{ $kriteria->nama }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-block px-3 py-1 {{ $kriteria->jenis == 'Benefit' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }} text-[11px] font-bold uppercase rounded-full tracking-wider w-20 text-center">
                            {{ $kriteria->jenis }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center font-mono font-semibold text-on-surface-variant">{{ str_replace('.', ',', rtrim(rtrim($kriteria->bobot, '0'), '.')) }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-primary-fixed rounded-lg transition-all" title="Edit">
                                <span class="material-symbols-outlined text-[18px]">edit</span>
                            </a>
                            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kriteria ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-on-surface-variant hover:text-error hover:bg-error-container rounded-lg transition-all" title="Hapus">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-on-surface-variant">Belum ada data kriteria.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 bg-surface-bright border-t border-outline-variant">
        {{ $kriterias->links() }}
    </div>
</div>
@endsection