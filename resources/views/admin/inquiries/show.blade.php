@extends('admin.layouts.app')

@section('title', 'Detail Pesan: ' . $inquiry->name)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">Detail Pesan Masuk</h1>
            <p class="text-xs text-slate-500">Diterima pada {{ $inquiry->created_at->format('d F Y, H:i') }} WIB</p>
        </div>
        <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-slate-500 hover:text-[#3E5CE7]">
            &larr; Kembali ke Daftar Pesan
        </a>
    </div>

    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-6 rounded-2xl bg-slate-50 border border-slate-100 text-xs">
            <div class="space-y-1">
                <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Nama Pengirim</span>
                <div class="font-extrabold text-sm text-[#07153f]">{{ $inquiry->name }}</div>
            </div>

            <div class="space-y-1">
                <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Email</span>
                <div class="font-bold text-sm text-[#3E5CE7]">
                    <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                </div>
            </div>

            <div class="space-y-1">
                <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Nomor WhatsApp / HP</span>
                <div class="font-bold text-sm text-emerald-600 mono">
                    {{ $inquiry->phone ?? 'Tidak dicantumkan' }}
                </div>
            </div>

            <div class="space-y-1">
                <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Ide Proyek / Subjek</span>
                <div class="font-bold text-sm text-slate-800">{{ $inquiry->subject ?? 'Permintaan Penawaran' }}</div>
            </div>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-bold text-[#07153f] uppercase tracking-wider block">Isi Pesan Kebutuhan:</span>
            <div class="p-6 rounded-2xl bg-white border border-slate-200 text-xs text-slate-800 leading-relaxed whitespace-pre-line shadow-xs">
                {{ $inquiry->message }}
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs">
                    Hapus Pesan
                </button>
            </form>

            <div class="flex items-center gap-3">
                @if($inquiry->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}?text=Halo%20{{ urlencode($inquiry->name) }},%20kami%20dari%20CV.%20Beranda%20Teknologi%20Digital%20ingin%20menindaklanjuti%20pesan%20Anda" 
                       target="_blank" 
                       class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase shadow-md transition-all">
                        Balas via WhatsApp &rarr;
                    </a>
                @endif
                <a href="mailto:{{ $inquiry->email }}?subject=Tindak%20Lanjut%20Penawaran%20CV.%20Beranda%20Teknologi%20Digital" 
                   class="px-6 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all">
                    Balas via Email &rarr;
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
