@extends('admin.layouts.app')

@section('title', 'Kelola Portofolio Proyek')

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">📁 Portofolio Proyek</h1>
            <p class="text-xs text-slate-500">Daftar seluruh karya, sistem web, dan aplikasi mobile yang tampil di website.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all flex items-center gap-2">
            <span>+ Tambah Proyek Baru</span>
        </a>
    </div>

    <!-- Projects Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-extrabold uppercase tracking-wider">
                        <th class="py-4 px-6">Thumbnail</th>
                        <th class="py-4 px-6">Judul Proyek</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Klien</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($projects as $p)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <div class="w-16 h-10 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                                    <img src="{{ $p->thumbnail }}" alt="{{ $p->title }}" class="w-full h-full object-cover" />
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-xs">{{ $p->title }}</div>
                                <div class="text-[10px] text-slate-400 font-mono">{{ $p->slug }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#3E5CE7] font-bold text-[10px]">
                                    {{ $p->category?->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-600 font-semibold">
                                {{ $p->client_name ?? '-' }}
                            </td>
                            <td class="py-4 px-6">
                                @if($p->is_featured)
                                    <span class="px-2.5 py-1 rounded-full bg-orange-50 text-[#fe6000] font-extrabold text-[10px]">
                                        FEATURED
                                    </span>
                                @else
                                    <span class="text-slate-400 text-[10px]">Standar</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.projects.edit', $p->id) }}" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold transition-all">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada data portofolio proyek.
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
