@extends('admin.layouts.app')

@section('title', 'Pesan Masuk & Penawaran')

@section('content')
<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">✉️ Pesan Masuk & Permintaan Penawaran</h1>
            <p class="text-xs text-slate-500">Daftar pesan dan formulir kontak yang dikirim oleh pengunjung website.</p>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-extrabold uppercase tracking-wider">
                        <th class="py-4 px-6">Pengirim</th>
                        <th class="py-4 px-6">Kontak</th>
                        <th class="py-4 px-6">Subjek / Ide Proyek</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Waktu Masuk</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($inquiries as $inq)
                        <tr class="hover:bg-slate-50/80 transition-colors {{ !$inq->is_read ? 'bg-orange-50/30' : '' }}">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $inq->name }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-slate-700 font-semibold">{{ $inq->email }}</div>
                                <div class="text-[10px] text-slate-400 font-mono">{{ $inq->phone ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-800 line-clamp-1">{{ $inq->subject ?? 'Permintaan Penawaran' }}</div>
                                <div class="text-[11px] text-slate-500 line-clamp-1">{{ $inq->message }}</div>
                            </td>
                            <td class="py-4 px-6">
                                @if(!$inq->is_read)
                                    <span class="px-2.5 py-1 rounded-full bg-orange-100 text-[#fe6000] font-extrabold text-[10px]">
                                        BARU
                                    </span>
                                @else
                                    <span class="text-slate-400 text-[10px]">Dibaca</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-slate-400 font-mono text-[11px]">
                                {{ $inq->created_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="px-3 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold transition-all">
                                    Baca &rarr;
                                </a>
                                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?');">
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
                                Belum ada pesan masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $inquiries->links() }}
        </div>
    </div>

</div>
@endsection
