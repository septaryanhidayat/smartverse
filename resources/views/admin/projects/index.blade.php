@extends('admin.layouts.app')

@section('title', 'Kelola Portofolio Proyek')

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-[#071330] flex items-center gap-2">
                <span>📁</span>
                <span>Portofolio Proyek &amp; Karya Digital</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-0.5">
                Kelola urutan dan proyek unggulan yang tampil di baris awal beranda dan halaman portofolio resmi.
            </p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 rounded-xl bg-[#2563eb] hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-blue-500/20 transition-all flex items-center gap-2 shrink-0">
            <span>+ Tambah Proyek Baru</span>
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold flex items-center gap-3 shadow-xs">
            <span class="text-lg">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Projects Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
        <div class="p-4 sm:p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-50/50">
            <div class="flex items-center gap-2">
                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-600">Total Proyek:</span>
                <span class="px-2.5 py-0.5 rounded-full bg-blue-100 text-blue-800 font-black text-xs">{{ $projects->total() }}</span>
            </div>
            <div class="text-[11px] text-slate-500 font-medium">
                💡 <strong>Tips:</strong> Klik tombol bintang <strong>⭐ Unggulan</strong> untuk menampilkan proyek di baris teratas.
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-extrabold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-4 text-center w-16">Thumbnail</th>
                        <th class="py-3.5 px-4 min-w-[200px]">Judul Proyek</th>
                        <th class="py-3.5 px-4 min-w-[120px]">Kategori</th>
                        <th class="py-3.5 px-4 min-w-[170px] text-center">Baris Awal (Featured)</th>
                        <th class="py-3.5 px-4 min-w-[130px] text-center">Urutan Tampilan</th>
                        <th class="py-3.5 px-4 min-w-[130px]">Klien</th>
                        <th class="py-3.5 px-4 text-right min-w-[160px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($projects as $p)
                        <tr class="hover:bg-slate-50/80 transition-colors {{ $p->is_featured ? 'bg-amber-50/20' : '' }}">
                            
                            <!-- Thumbnail -->
                            <td class="py-3.5 px-4 text-center">
                                <div class="w-16 h-11 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shadow-2xs mx-auto">
                                    <img src="{{ $p->thumbnail }}" alt="{{ $p->title }}" class="w-full h-full object-cover" />
                                </div>
                            </td>

                            <!-- Judul & Slug -->
                            <td class="py-3.5 px-4">
                                <div class="font-extrabold text-slate-900 text-xs">{{ $p->title }}</div>
                                <div class="text-[10px] text-slate-400 font-mono mt-0.5">{{ $p->slug }}</div>
                            </td>

                            <!-- Kategori -->
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#2563eb] font-bold text-[10px] border border-blue-200/60 inline-block">
                                    {{ $p->category?->name ?? 'Uncategorized' }}
                                </span>
                            </td>

                            <!-- 1-Click Toggle Featured -->
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <form action="{{ route('admin.projects.toggle-featured', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @if($p->is_featured)
                                        <button type="submit" 
                                                title="Klik untuk non-aktifkan prioritas baris awal"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-amber-500 hover:bg-amber-600 text-white font-black text-[11px] shadow-sm shadow-amber-500/30 transition-all">
                                            <span>⭐</span>
                                            <span>UNGGULAN (BARIS 1)</span>
                                        </button>
                                    @else
                                        <button type="submit" 
                                                title="Klik untuk jadikan unggulan & tampil di baris awal"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-100 hover:bg-amber-50 hover:text-amber-800 border border-slate-200 hover:border-amber-300 text-slate-600 font-bold text-[11px] transition-all">
                                            <span>☆</span>
                                            <span>Jadikan Unggulan</span>
                                        </button>
                                    @endif
                                </form>
                            </td>

                            <!-- Urutan Tampilan (Quick Inline Form) -->
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <form action="{{ route('admin.projects.update-order', $p->id) }}" method="POST" class="inline-flex items-center justify-center gap-1.5">
                                    @csrf
                                    <input type="number" 
                                           name="order" 
                                           value="{{ $p->order }}" 
                                           min="0" 
                                           max="999"
                                           class="w-16 px-2 py-1 text-center font-black mono text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                                           title="Ubah nomor urutan" />
                                    <button type="submit" 
                                            class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-blue-600 hover:text-white text-slate-700 font-extrabold text-[10px] transition-all border border-slate-200"
                                            title="Simpan urutan">
                                        Simpan
                                    </button>
                                </form>
                            </td>

                            <!-- Klien -->
                            <td class="py-3.5 px-4 text-slate-700 font-semibold">
                                {{ $p->client_name ?: '-' }}
                            </td>

                            <!-- Symmetrical Action Buttons -->
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2 whitespace-nowrap">
                                    <a href="{{ route('admin.projects.edit', $p->id) }}" 
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold text-xs border border-blue-200/70 shadow-2xs transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <span>Edit</span>
                                    </a>
                                    
                                    <form action="{{ route('admin.projects.destroy', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek \'{{ $p->title }}\'?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold text-xs border border-rose-200/70 shadow-2xs transition-all">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-slate-400 space-y-2">
                                <div class="text-3xl">📁</div>
                                <p class="font-medium text-xs">Belum ada portofolio proyek yang ditambahkan.</p>
                                <a href="{{ route('admin.projects.create') }}" class="inline-block mt-2 text-blue-600 font-bold hover:underline">
                                    + Tambah Proyek Pertama &rarr;
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $projects->links() }}
        </div>
    </div>

</div>
@endsection
