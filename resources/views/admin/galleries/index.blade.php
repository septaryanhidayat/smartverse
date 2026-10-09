@extends('admin.layouts.app')

@section('title', 'Kelola Galeri Dokumentasi')

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">🖼️ Galeri Dokumentasi Event</h1>
            <p class="text-xs text-slate-500">Dokumentasi foto kegiatan workshop Komdigi RI, Politeknik Akamigas, dan seminar kampus.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all flex items-center gap-2">
            <span>+ Tambah Dokumentasi Baru</span>
        </a>
    </div>

    <!-- Galleries Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $gal)
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm flex flex-col justify-between group">
                <div class="aspect-4/3 overflow-hidden relative bg-slate-100 border-b border-slate-100">
                    <img src="{{ $gal->image_path }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute top-2 left-2">
                        <span class="px-2 py-0.5 rounded-full bg-[#fe6000] text-white text-[9px] font-bold">
                            {{ $gal->category }}
                        </span>
                    </div>
                </div>

                <div class="p-4 space-y-2">
                    <h3 class="font-bold text-xs text-[#07153f] line-clamp-1">{{ $gal->title }}</h3>
                    <p class="text-[10px] text-slate-400 font-medium">📍 {{ $gal->location ?? 'Indonesia' }}</p>
                </div>

                <div class="p-3 pt-0 flex items-center justify-between border-t border-slate-100 text-xs">
                    <a href="{{ route('admin.galleries.edit', $gal->id) }}" class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] border border-blue-200/60 font-bold text-xs shadow-2xs transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        <span>Edit</span>
                    </a>
                    <form action="{{ route('admin.galleries.destroy', $gal->id) }}" method="POST" onsubmit="return confirm('Hapus dokumentasi event ini?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/60 font-bold text-xs shadow-2xs transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center py-12 text-slate-400 text-xs">
                Belum ada galeri dokumentasi event.
            </div>
        @endforelse
    </div>

    <div class="pt-4">
        {{ $galleries->links() }}
    </div>

</div>
@endsection
