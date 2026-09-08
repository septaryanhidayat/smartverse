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
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.trainings.edit', $tr->id) }}" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.trainings.destroy', $tr->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus modul pelatihan ini?');">
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
