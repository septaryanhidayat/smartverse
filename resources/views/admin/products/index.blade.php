@extends('admin.layouts.app')

@section('title', 'Kelola Produk Digital')

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">🛒 Produk Digital & Store</h1>
            <p class="text-xs text-slate-500">Daftar template kit, source code, dan software yang dijual di website.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="px-5 py-2.5 rounded-xl bg-[#fe6000] hover:bg-[#e05400] text-white font-bold text-xs uppercase shadow-md transition-all flex items-center gap-2">
            <span>+ Tambah Produk Baru</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-extrabold uppercase tracking-wider">
                        <th class="py-4 px-6">Preview</th>
                        <th class="py-4 px-6">Nama Produk</th>
                        <th class="py-4 px-6">Badge</th>
                        <th class="py-4 px-6">Harga</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($products as $pr)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <div class="w-16 h-10 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                                    <img src="{{ $pr->thumbnail }}" alt="{{ $pr->title }}" class="w-full h-full object-cover" />
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-xs">{{ $pr->title }}</div>
                                <div class="text-[10px] text-slate-400 font-mono">{{ $pr->slug }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#3E5CE7] font-bold text-[10px]">
                                    {{ $pr->badge ?? 'Template' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="mono font-bold text-[#fe6000] text-xs">Rp {{ number_format($pr->price, 0, ',', '.') }}</span>
                            </td>
                            <td class="py-4 px-6">
                                @if($pr->is_featured)
                                    <span class="px-2.5 py-1 rounded-full bg-orange-50 text-[#fe6000] font-extrabold text-[10px]">
                                        FEATURED
                                    </span>
                                @else
                                    <span class="text-slate-400 text-[10px]">Aktif</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.products.edit', $pr->id) }}" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $pr->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk digital ini?');">
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
                                Belum ada data produk digital.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection
