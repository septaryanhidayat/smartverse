@extends('admin.layouts.app')

@section('title', 'Kelola Invoice & Penagihan Klien')

@section('content')
<div class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#071330] flex items-center gap-2.5">
                <span>🧾</span>
                <span>Faktur & Invoice Klien</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Kelola data penagihan, kwitansi pembayaran, dan cetak invoice resmi klien format standar CV. Beranda Teknologi Digital.
            </p>
        </div>
        <a href="{{ route('admin.invoices.create') }}" class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-blue-600/30 transition-all flex items-center gap-2">
            <span>+ Buat Invoice Baru</span>
        </a>
    </div>

    <!-- Invoices Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-extrabold uppercase tracking-wider text-[10px]">
                        <th class="py-4 px-6">No. Invoice</th>
                        <th class="py-4 px-6">Klien</th>
                        <th class="py-4 px-4">Tanggal</th>
                        <th class="py-4 px-4">Status</th>
                        <th class="py-4 px-6">Total Tagihan</th>
                        <th class="py-4 px-6">Terbayar</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($invoices as $inv)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <div class="font-black text-slate-900 mono text-xs flex items-center gap-1.5">
                                    <span class="text-slate-400">#</span>
                                    <span>{{ $inv->invoice_number }}</span>
                                </div>
                                <span class="text-[10px] text-slate-400 font-medium">{{ $inv->client_type }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-extrabold text-slate-900 text-xs">{{ $inv->client_name }}</div>
                                <div class="text-[11px] text-slate-500 truncate">{{ $inv->client_attn ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="mono text-slate-600 font-semibold">
                                    {{ optional($inv->invoice_date)->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                @if($inv->status === 'paid')
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-black text-[10px] uppercase border border-emerald-200">
                                        ✓ PAID
                                    </span>
                                @elseif($inv->status === 'partial')
                                    <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 font-black text-[10px] uppercase border border-amber-200">
                                        PARTIAL
                                    </span>
                                @elseif($inv->status === 'cancelled')
                                    <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 font-black text-[10px] uppercase border border-slate-200">
                                        BATAL
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-rose-50 text-rose-700 font-black text-[10px] uppercase border border-rose-200">
                                        UNPAID
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-extrabold text-[#071330] mono text-xs">
                                    Rp {{ number_format($inv->total_amount, 2, ',', '.') }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-emerald-600 mono text-xs">
                                    Rp {{ number_format($inv->paid_amount, 2, ',', '.') }}
                                </span>
                                @if($inv->remaining_amount > 0)
                                    <div class="text-[10px] text-rose-500 font-bold mono">
                                        Sisa: Rp {{ number_format($inv->remaining_amount, 2, ',', '.') }}
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Print Button -->
                                    <a href="{{ route('admin.invoices.print', $inv->id) }}" 
                                       target="_blank"
                                       class="px-3 py-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs transition-all flex items-center gap-1 border border-emerald-200/60 shadow-2xs"
                                       title="Cetak Faktur PDF">
                                        <span>🖨️ Cetak</span>
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.invoices.edit', $inv->id) }}" 
                                       class="px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold text-xs transition-all flex items-center gap-1 border border-blue-200/60 shadow-2xs">
                                        <span>Edit</span>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.invoices.destroy', $inv->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus invoice #{{ $inv->invoice_number }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs transition-all border border-rose-200/60 shadow-2xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400 space-y-2">
                                <div class="text-2xl">🧾</div>
                                <p>Belum ada faktur / invoice yang dibuat.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $invoices->links() }}
        </div>
    </div>

</div>
@endsection
