@extends('admin.layouts.app')

@section('title', 'Kelola Modul & Pelatihan IT')

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">🎓 Modul & Pelatihan IT</h1>
            <p class="text-xs text-slate-500">Daftar silabus materi pelatihan corporate, bootcamp, dan seminar narasumber.</p>
        </div>
        <a href="{{ route('admin.trainings.create') }}" class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all flex items-center gap-2">
            <span>+ Tambah Modul Baru</span>
        </a>
    </div>

    <!-- Trainings Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-extrabold uppercase tracking-wider">
                        <th class="py-4 px-6">Judul Modul Pelatihan</th>
                        <th class="py-4 px-6">Tingkat Level</th>
                        <th class="py-4 px-6">Durasi</th>
                        <th class="py-4 px-6">Target Peserta</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($trainings as $tr)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-xs">{{ $tr->title }}</div>
                                <div class="text-[10px] text-slate-400 font-mono">{{ $tr->slug }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-purple-50 text-purple-700 font-bold text-[10px]">
                                    {{ $tr->level }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-600 font-mono font-bold">
                                {{ $tr->duration ?? '-' }}
                            </td>
                            <td class="py-4 px-6 text-slate-600">
                                {{ $tr->target_audience ?? 'Umum & Instansi' }}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5 whitespace-nowrap">
                                    <a href="{{ route('admin.trainings.edit', $tr->id) }}" class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] border border-blue-200/60 font-bold text-xs shadow-2xs transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.trainings.destroy', $tr->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus modul pelatihan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/60 font-bold text-xs shadow-2xs transition-all">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400">
                                Belum ada modul pelatihan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $trainings->links() }}
        </div>
    </div>

</div>
@endsection
