@extends('layouts.app')

@section('title', 'Katalog Produk Digital & Solusi Software - SmartVerse.id')

@section('content')
<!-- SECTION 1: STORE HERO BANNER (FlyMotion Digital Store Banner) -->
<section class="py-12 bg-[#f8faff] dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div style="background-color: #1A4499 !important; color: #ffffff !important;" 
             class="rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="space-y-4 max-w-xl text-center md:text-left relative z-10">
                <span class="px-3.5 py-1 rounded-full bg-white/20 backdrop-blur-md text-xs font-bold uppercase tracking-wider text-blue-100">
                    SmartVerse Digital Store
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-white leading-tight" style="color: #ffffff !important;">
                    Katalog Produk & Solusi Digital Unggulan
                </h1>
                <p class="text-sm sm:text-base text-blue-100 leading-relaxed font-medium" style="color: #dbeafe !important;">
                    Eksplorasi software enterprise siap pakai, portal berita standar dewan pers, ERP pendidikan Islam, HRIS presensi, otomatisasi konten AI, hingga alat forensik visual.
                </p>
                <div class="pt-2">
                    <a href="#katalog" 
                       style="background-color: #fe6000 !important; color: #ffffff !important;"
                       class="px-7 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg hover:brightness-110 active:scale-95 inline-flex items-center gap-2 transition-all">
                        <span style="color: #ffffff !important;">Jelajahi Sekarang</span> &rarr;
                    </a>
                </div>
            </div>

            <div class="w-72 h-auto shrink-0 relative z-10 hidden md:block anim-logo-top">
                <img src="{{ asset('images/smartverse/logo-smartverse.webp') }}" alt="SmartVerse Store" class="w-full h-auto object-contain rounded-2xl drop-shadow-2xl" />
            </div>

            <!-- Ambient Glow -->
            <div class="absolute -bottom-16 -right-16 w-80 h-80 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
        </div>

    </div>
</section>

<!-- SECTION 2: KATEGORI PILIHAN (Category Chips) -->
<section class="py-8 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[#fe6000]">
            <span>✨ Kategori Pilihan</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            <div class="bg-[#f8faff] dark:bg-slate-800 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 text-center hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer space-y-2">
                <div class="w-10 h-10 mx-auto rounded-xl bg-blue-100 dark:bg-blue-950/70 text-[#3E5CE7] dark:text-blue-400 flex items-center justify-center font-bold text-lg">📰</div>
                <div class="text-xs font-bold text-[#07153f] dark:text-white">Media CMS</div>
            </div>
            <div class="bg-[#f8faff] dark:bg-slate-800 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 text-center hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer space-y-2">
                <div class="w-10 h-10 mx-auto rounded-xl bg-purple-100 dark:bg-purple-950/70 text-purple-600 dark:text-purple-400 flex items-center justify-center font-bold text-lg">🏫</div>
                <div class="text-xs font-bold text-[#07153f] dark:text-white">School ERP</div>
            </div>
            <div class="bg-[#f8faff] dark:bg-slate-800 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 text-center hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer space-y-2">
                <div class="w-10 h-10 mx-auto rounded-xl bg-emerald-100 dark:bg-emerald-950/70 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold text-lg">📱</div>
                <div class="text-xs font-bold text-[#07153f] dark:text-white">Mobile HRIS</div>
            </div>
            <div class="bg-[#f8faff] dark:bg-slate-800 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 text-center hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer space-y-2">
                <div class="w-10 h-10 mx-auto rounded-xl bg-orange-100 dark:bg-orange-950/70 text-[#fe6000] flex items-center justify-center font-bold text-lg">🎨</div>
                <div class="text-xs font-bold text-[#07153f] dark:text-white">AI Creative</div>
            </div>
            <div class="bg-[#f8faff] dark:bg-slate-800 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 text-center hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer space-y-2">
                <div class="w-10 h-10 mx-auto rounded-xl bg-pink-100 dark:bg-pink-950/70 text-pink-600 dark:text-pink-400 flex items-center justify-center font-bold text-lg">🔬</div>
                <div class="text-xs font-bold text-[#07153f] dark:text-white">AI Forensik</div>
            </div>
            <div class="bg-[#f8faff] dark:bg-slate-800 p-4 rounded-2xl border border-slate-200 dark:border-slate-700 text-center hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer space-y-2">
                <div class="w-10 h-10 mx-auto rounded-xl bg-cyan-100 dark:bg-cyan-950/70 text-cyan-600 dark:text-cyan-400 flex items-center justify-center font-bold text-lg">⚡</div>
                <div class="text-xs font-bold text-[#07153f] dark:text-white">Enterprise Script</div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 3: KATALOG PRODUK (FlyMotion Store Card Grid) -->
<section id="katalog" class="py-16 bg-[#f8faff] dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <h2 class="text-3xl font-extrabold text-[#07153f] dark:text-white">Katalog Produk Digital</h2>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium">Daftar software enterprise dan produk digital berlisensi permanen.</p>
            </div>
            <a href="#katalog" class="text-xs font-bold text-[#3E5CE7] dark:text-blue-400 hover:underline">Semua Produk &rarr;</a>
        </div>

        <!-- Products Grid (16:9 Landscape Thumbnails with Ratings & Tags) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white dark:bg-slate-800/90 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="aspect-video overflow-hidden bg-slate-100 dark:bg-slate-900 relative border-b border-slate-200 dark:border-slate-700 p-2 flex items-center justify-center">
                            @if($product->thumbnail)
                                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->title }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500" />
                            @else
                                <img src="/btd/{{ ($loop->index % 12) }}.webp" alt="{{ $product->title }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" />
                            @endif
                            <div class="absolute top-2 left-2">
                                <span class="px-2.5 py-0.5 rounded-full bg-[#3E5CE7] text-white font-bold text-[9px] shadow-xs">
                                    {{ $product->badge }}
                                </span>
                            </div>
                        </div>

                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1 text-amber-400 text-xs">
                                <span>★★★★★</span>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400 font-bold ml-1">5.0 (48 review)</span>
                            </div>

                            <h3 class="text-sm font-bold text-[#07153f] dark:text-white group-hover:text-[#3E5CE7] dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                                {{ $product->title }}
                            </h3>

                            <p class="text-[11px] text-slate-600 dark:text-slate-300 line-clamp-2 leading-relaxed">
                                {{ $product->description }}
                            </p>

                            <div class="pt-2 flex items-center justify-between">
                                <div>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold block">Model Lisensi</span>
                                    <span class="text-xs sm:text-sm font-black text-cyan-600 dark:text-cyan-400">
                                        Solusi Enterprise
                                    </span>
                                </div>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                    Full Source Code
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 pt-0">
                        <a href="{{ route('products.show', $product->slug) }}" 
                           style="background-color: #3E5CE7 !important; color: #ffffff !important;"
                           class="block w-full py-2.5 text-center rounded-xl font-bold text-xs uppercase shadow-xs hover:brightness-110 active:scale-95 transition-all">
                            <span style="color: #ffffff !important;">Lihat Spesifikasi &amp; Demo &rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-6">
            {{ $products->links() }}
        </div>
    </div>
</section>

<!-- SECTION 4: UNLIMITED ACCESS BANNER -->
<section class="py-12 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="background-color: #0F172A !important; color: #ffffff !important;" 
             class="rounded-3xl p-8 sm:p-12 text-white shadow-2xl flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden border border-slate-800">
            <div class="space-y-2 relative z-10">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-amber-400">MEMBERSHIP PASS</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white" style="color: #ffffff !important;">Akses Semua Produk & Template Tanpa Batas!</h3>
                <p class="text-xs text-slate-300 max-w-xl font-medium" style="color: #cbd5e1 !important;">Dapatkan lisensi komersial dan pembaruan seumur hidup untuk seluruh produk software SmartVerse (smartverse.id).</p>
            </div>
            <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20membership%20akses%20semua%20produk" 
               target="_blank" 
               style="background-color: #fe6000 !important; color: #ffffff !important;"
               class="px-7 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shrink-0 shadow-lg hover:brightness-110 active:scale-95 transition-all relative z-10">
                <span style="color: #ffffff !important;">Gabung Sekarang &rarr;</span>
            </a>
        </div>
    </div>
</section>

<!-- SECTION 5: FAQ ACCORDION (Frequently Asked Questions) -->
<section class="py-16 bg-[#f8faff] dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-[#3E5CE7] dark:text-blue-400">BANTUAN & PANDUAN</span>
            <h2 class="text-3xl font-extrabold text-[#07153f] dark:text-white">Frequently Asked Questions ❓</h2>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-xs">
                <button @click="active = (active === 1 ? null : 1)" class="w-full p-4 text-left flex items-center justify-between text-xs font-bold text-[#07153f] dark:text-white">
                    <span>Bagaimana cara membeli produk digital di sini?</span>
                    <span x-text="active === 1 ? '−' : '+'" class="text-base text-[#3E5CE7] dark:text-blue-400 font-black"></span>
                </button>
                <div x-show="active === 1" class="p-4 pt-0 text-xs text-slate-600 dark:text-slate-300 leading-relaxed border-t border-slate-100 dark:border-slate-700">
                    Anda dapat mengklik tombol Beli / Detail pada produk pilihan, kemudian checkout melalui WhatsApp Support kami untuk menerima link unduhan instan dan lisensi resmi.
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-xs">
                <button @click="active = (active === 2 ? null : 2)" class="w-full p-4 text-left flex items-center justify-between text-xs font-bold text-[#07153f] dark:text-white">
                    <span>Apakah saya mendapatkan panduan instalasi dan source code?</span>
                    <span x-text="active === 2 ? '−' : '+'" class="text-base text-[#3E5CE7] dark:text-blue-400 font-black"></span>
                </button>
                <div x-show="active === 2" class="p-4 pt-0 text-xs text-slate-600 dark:text-slate-300 leading-relaxed border-t border-slate-100 dark:border-slate-700">
                    Ya, setiap pembelian produk digital sudah disertai file source code lengkap, dokumentasi instalasi langkah demi langkah, dan contoh konfigurasi environment (.env).
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-xs">
                <button @click="active = (active === 3 ? null : 3)" class="w-full p-4 text-left flex items-center justify-between text-xs font-bold text-[#07153f] dark:text-white">
                    <span>Apakah produk digital bisa dikustomisasi sesuai kebutuhan saya?</span>
                    <span x-text="active === 3 ? '−' : '+'" class="text-base text-[#3E5CE7] dark:text-blue-400 font-black"></span>
                </button>
                <div x-show="active === 3" class="p-4 pt-0 text-xs text-slate-600 dark:text-slate-300 leading-relaxed border-t border-slate-100 dark:border-slate-700">
                    Tentu saja. Anda bebas memodifikasi kode program untuk keperluan pribadi maupun klien. Jika memerlukan tim kami untuk melakukan kustomisasi khusus, Anda bisa memesan paket custom development.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
