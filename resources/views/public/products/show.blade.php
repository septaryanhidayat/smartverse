@extends('layouts.app')

@section('title', $product->title . ' - SmartVerse.id')

@section('content')
<!-- BREADCRUMB & HEADER -->
<section class="pt-8 pb-12 bg-gradient-to-b from-blue-50/50 via-white to-slate-50/30 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 border-b border-slate-200/80 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 dark:text-slate-400">
            <a href="{{ route('home') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Beranda</a>
            <span>/</span>
            <a href="{{ route('products.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">Produk Digital</a>
            <span>/</span>
            <span class="text-blue-600 dark:text-blue-400 truncate max-w-xs sm:max-w-md">{{ $product->title }}</span>
        </nav>

        <!-- Product Hero Box -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pt-4">
            
            <!-- Left: Info & Details -->
            <div class="lg:col-span-7 space-y-5">
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="px-3.5 py-1.5 rounded-full bg-blue-100/90 dark:bg-blue-950/70 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-400 text-xs font-black uppercase tracking-wider shadow-xs">
                        {{ $product->badge ?? 'Flagship Product' }}
                    </span>
                    <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 text-xs font-bold">
                        Permanent License
                    </span>
                    <span class="text-xs text-slate-400 font-mono">
                        SmartVerse Ecosystem
                    </span>
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#07153f] dark:text-white leading-tight">
                    {{ $product->title }}
                </h1>

                <p class="text-sm sm:text-base text-blue-600 dark:text-blue-400 font-bold leading-relaxed">
                    {{ $product->tagline }}
                </p>

                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                    {{ $product->description }}
                </p>

                <!-- Price & CTA Bar -->
                <div class="pt-4 p-5 rounded-2xl bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700 shadow-md space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wider font-semibold block">Harga Lisensi Resmi</span>
                            <div class="flex items-baseline gap-2">
                                <span class="text-2xl sm:text-3xl font-black text-[#07153f] dark:text-white font-mono">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs text-slate-500">/ lisensi penuh</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-2.5">
                            @if($product->slug === 'smartsynth-lab-forensik-ai')
                                <a href="{{ asset('forensic/index.html') }}" 
                                   target="_blank" 
                                   class="px-5 py-3 rounded-xl font-black text-xs text-white shadow-lg shadow-indigo-500/30 hover:scale-105 active:scale-95 transition-all flex items-center gap-2 bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-600">
                                    <span>🔬 Buka Interactive Lab Forensik</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            @elseif($product->demo_url)
                                <a href="{{ $product->demo_url }}" 
                                   target="_blank" 
                                   class="px-5 py-3 rounded-xl border border-slate-300 dark:border-slate-600 text-[#07153f] dark:text-white font-bold text-xs hover:bg-slate-100 dark:hover:bg-slate-700 text-center transition-all">
                                    Live Demo &rarr;
                                </a>
                            @endif

                            <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20digital:%20{{ urlencode($product->title) }}" 
                               target="_blank" 
                               style="background-color: #059669 !important; color: #ffffff !important;"
                               class="px-6 py-3 rounded-xl font-black text-xs text-white shadow-lg shadow-emerald-500/25 hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
                                <span>💬 Konsultasi & Order via WhatsApp</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right: Product Logo / Visual Showcase -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-md bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-2xl border border-slate-200/80 dark:border-slate-700/80 space-y-4">
                    <div class="relative rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 p-4 flex items-center justify-center min-h-[280px]">
                        @if($product->thumbnail)
                            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->title }}" class="max-h-[260px] w-auto object-contain drop-shadow-xl hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="text-6xl">📦</div>
                        @endif
                    </div>
                    
                    <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/60 border border-slate-200/60 dark:border-slate-800 space-y-2 text-xs">
                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                            <span>Kategori:</span>
                            <span class="font-bold text-[#07153f] dark:text-white">{{ $product->category->name ?? 'Digital Solution' }}</span>
                        </div>
                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                            <span>Format Pengiriman:</span>
                            <span class="font-bold text-[#07153f] dark:text-white">Source Code, Database, Panduan & Instalasi</span>
                        </div>
                        <div class="flex justify-between text-slate-500 dark:text-slate-400">
                            <span>Garansi Teknis:</span>
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">100% Siap Operasional & Dukungan Bugfix</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECTION: PRODUCT FEATURES & SCIENTIFIC MODULES -->
<section class="py-16 bg-white dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Features List -->
        @if($product->features)
            @php
                $featuresList = is_array($product->features) ? $product->features : (json_decode($product->features, true) ?? []);
            @endphp
            <div class="space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-black tracking-wider uppercase text-blue-600 dark:text-blue-400">FITUR UTAMA</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#07153f] dark:text-white">
                        Kemampuan & Spesifikasi Lengkap
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($featuresList as $feat)
                        <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-900/80 border border-slate-200/80 dark:border-slate-800 flex items-start gap-3 shadow-xs hover:border-blue-400 transition-colors">
                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">
                                ✓
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-slate-700 dark:text-slate-200 leading-snug">
                                {{ $feat }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- SPECIAL SHOWCASE: SMARTSYNTH FORENSIC MODULES -->
        @if($product->slug === 'smartsynth-lab-forensik-ai')
            <div class="mt-12 p-8 sm:p-10 rounded-3xl bg-gradient-to-br from-slate-900 via-indigo-950 to-[#07153f] text-white border border-indigo-500/30 shadow-2xl space-y-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-white/10">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/20 text-cyan-300 text-xs font-mono font-bold">
                            <span>🔬 MULTI-LAYER SCIENTIFIC VERIFICATION ENGINE</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-black text-white">
                            Metodologi Pengujian Forensik Gambar Digital
                        </h3>
                        <p class="text-slate-300 text-xs sm:text-sm max-w-2xl leading-relaxed">
                            Alat kerja nyata yang menguji keaslian foto digital secara saintifik melalui 4 lapis pembuktian matematis dan kriptografi standar industri jurnalisme investigasi.
                        </p>
                    </div>

                    <a href="{{ asset('forensic/index.html') }}" 
                       target="_blank" 
                       class="px-6 py-3.5 rounded-xl font-black text-xs uppercase tracking-wider text-slate-900 bg-cyan-400 hover:bg-cyan-300 transition-all shadow-lg shadow-cyan-400/30 hover:scale-105 active:scale-95 text-center shrink-0 flex items-center justify-center gap-2">
                        <span>Luncurkan Lab Forensik</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <!-- 4 Layers Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Layer 1 -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-3 hover:bg-white/10 transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl font-bold">
                            1
                        </div>
                        <h4 class="font-bold text-sm text-cyan-300">EXIF Biner Scanner</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Membaca biner ArrayBuffer gambar untuk mendeteksi kamera asli, lensa, koordinat GPS, segmen XMP, serta software prompt AI (Midjourney, DALL-E, ComfyUI).
                        </p>
                    </div>

                    <!-- Layer 2 -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-3 hover:bg-white/10 transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl font-bold">
                            2
                        </div>
                        <h4 class="font-bold text-sm text-purple-300">Kriptografi C2PA 2.4</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Memindai blok biner JUMBF (jumb & c2pa) guna memverifikasi sertifikat tanda tangan digital manifest provenance resmi penerbit (OpenAI, Adobe, dll).
                        </p>
                    </div>

                    <!-- Layer 3 -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-3 hover:bg-white/10 transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl font-bold">
                            3
                        </div>
                        <h4 class="font-bold text-sm text-amber-300">Real ELA (Error Level 80%)</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Mengompresi kanvas pada rasio matematis 80% JPEG untuk menghitung selisih differensial |original - compressed|, mengungkap anomali editan/sambungan objek.
                        </p>
                    </div>

                    <!-- Layer 4 -->
                    <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-3 hover:bg-white/10 transition-colors">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl font-bold">
                            4
                        </div>
                        <h4 class="font-bold text-sm text-emerald-300">2D FFT Spektrogram</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Menghitung Fast Fourier Transform 2D spektrum frekuensi untuk mendeteksi pola kisi periodik (checkerboard artifacts) khas dekonvolusi generator AI.
                        </p>
                    </div>
                </div>

                <!-- SOP Generator Highlight -->
                <div class="p-4 rounded-xl bg-indigo-900/40 border border-indigo-400/20 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">📋</span>
                        <div>
                            <span class="font-bold text-white block">Ekspor Otomatis Berita Acara SOP Redaksi Resmi</span>
                            <span class="text-slate-300">Menghasilkan dokumen Berita Acara Forensik siap cetak PDF dengan skor probabilitas AI & rekomendasi redaksi.</span>
                        </div>
                    </div>
                    <a href="{{ asset('forensic/index.html') }}" target="_blank" class="text-cyan-300 hover:underline font-bold whitespace-nowrap">
                        Coba Demo Forensik &rarr;
                    </a>
                </div>
            </div>
        @endif

        <!-- CTA Order Footer -->
        <div class="pt-8 text-center space-y-4">
            <h3 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white">
                Siap Mengimplementasikan Solusi Ini di Organisasi Anda?
            </h3>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 max-w-xl mx-auto">
                Tim teknis SmartVerse siap membantu instalasi server, kustomisasi alur bisnis, hingga pendampingan pelatihan operator.
            </p>
            <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
                <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20ingin%20konsultasi%20implementasi%20produk%20{{ urlencode($product->title) }}" 
                   target="_blank"
                   style="background-color: #059669 !important; color: #ffffff !important;"
                   class="px-8 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg shadow-emerald-500/25 hover:brightness-110 active:scale-95 transition-all">
                    Hubungi Tim Penjualan via WhatsApp
                </a>
                <a href="{{ route('products.index') }}" 
                   class="px-6 py-3.5 rounded-xl border border-slate-300 dark:border-slate-700 font-bold text-xs text-[#07153f] dark:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition-all">
                    Katalog Produk Lainnya
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
