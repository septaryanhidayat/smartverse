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

<!-- SECTION: DEEP PROMOTIONAL SPECIFICATIONS (Dedicated by Flagship Product) -->
<section class="py-16 bg-white dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        @if(str_contains($product->slug, 'smartnews'))
            @include('public.products.partials.smartnews')
        @elseif(str_contains($product->slug, 'smartedu'))
            @include('public.products.partials.smartedu')
        @elseif(str_contains($product->slug, 'smartfeed'))
            @include('public.products.partials.smartfeed')
        @elseif(str_contains($product->slug, 'smartsdm'))
            @include('public.products.partials.smartsdm')
        @elseif(str_contains($product->slug, 'smartsynth'))
            @include('public.products.partials.smartsynth')
        @else
            <!-- Generic Feature Showcase for standard products -->
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
        @endif

        <!-- GUARANTEE & SERVICE ASSURANCE BAR -->
        <div class="p-8 sm:p-10 rounded-3xl bg-slate-50 dark:bg-slate-900/90 border border-slate-200/80 dark:border-slate-800 space-y-6">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="text-xs font-black uppercase tracking-widest text-emerald-600 dark:text-emerald-400">JAMINAN LAYANAN SMARTVERSE</span>
                <h3 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white">
                    Mengapa Memilih Solusi Digital dari SmartVerse?
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                <div class="p-5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 space-y-2">
                    <span class="text-2xl">🔒</span>
                    <h4 class="font-bold text-[#07153f] dark:text-white">Hak Milik Penuh (Lifetime)</h4>
                    <p class="text-slate-500 text-[11px] leading-relaxed">Tanpa biaya langganan software bulanan yang membebani. Beli sekali dan gunakan selamanya.</p>
                </div>
                <div class="p-5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 space-y-2">
                    <span class="text-2xl">🛠️</span>
                    <h4 class="font-bold text-[#07153f] dark:text-white">Setup & Pendampingan</h4>
                    <p class="text-slate-500 text-[11px] leading-relaxed">Didampingi proses deployment ke hosting/VPS, konfigurasi database, hingga live online.</p>
                </div>
                <div class="p-5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 space-y-2">
                    <span class="text-2xl">⚡</span>
                    <h4 class="font-bold text-[#07153f] dark:text-white">Arsitektur Teruji</h4>
                    <p class="text-slate-500 text-[11px] leading-relaxed">Dibangun di atas standar Laravel 13, PHP 8.4, dan React Native dengan keamanan data tinggi.</p>
                </div>
                <div class="p-5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700 space-y-2">
                    <span class="text-2xl">💬</span>
                    <h4 class="font-bold text-[#07153f] dark:text-white">Layanan Konsultasi 24/7</h4>
                    <p class="text-slate-500 text-[11px] leading-relaxed">Dukungan komunikasi langsung via WhatsApp untuk kendala teknis dan kustomisasi fitur.</p>
                </div>
            </div>
        </div>

        <!-- RELATED / OTHER FLAGSHIP PRODUCTS -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="space-y-6 pt-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs font-black uppercase tracking-wider text-blue-600 dark:text-blue-400">EKOSISTEM DIGITAL TERKAIT</span>
                        <h3 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white">Produk Unggulan SmartVerse Lainnya</h3>
                    </div>
                    <a href="{{ route('products.index') }}" class="text-xs font-bold text-blue-600 dark:text-blue-400 hover:underline">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $rel)
                        <div class="bg-slate-50 dark:bg-slate-900 rounded-2xl p-4 border border-slate-200/80 dark:border-slate-800 hover:border-blue-400 hover:shadow-lg transition-all space-y-3 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="h-32 rounded-xl bg-white dark:bg-slate-800 p-2 flex items-center justify-center overflow-hidden">
                                    @if($rel->thumbnail)
                                        <img src="{{ asset($rel->thumbnail) }}" alt="{{ $rel->title }}" class="max-h-full max-w-full object-contain">
                                    @else
                                        <div class="text-4xl">🚀</div>
                                    @endif
                                </div>
                                <span class="px-2 py-0.5 rounded-md bg-blue-100 text-blue-800 dark:bg-blue-950 dark:text-blue-300 font-bold text-[9px]">
                                    {{ $rel->badge }}
                                </span>
                                <h4 class="text-xs font-bold text-[#07153f] dark:text-white line-clamp-2">{{ $rel->title }}</h4>
                                <p class="text-[11px] text-slate-500 line-clamp-2">{{ $rel->tagline }}</p>
                            </div>
                            <div class="pt-2 border-t border-slate-200/60 dark:border-slate-800 flex items-center justify-between">
                                <span class="text-xs font-black text-blue-600 font-mono">Rp {{ number_format($rel->price, 0, ',', '.') }}</span>
                                <a href="{{ route('products.show', $rel->slug) }}" class="text-[11px] font-bold text-blue-600 dark:text-blue-400 hover:underline">Detail &rarr;</a>
                            </div>
                        </div>
                    @endforeach
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
                   class="px-8 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg shadow-emerald-500/25 hover:brightness-110 active:scale-95 transition-all text-white">
                    Hubungi Tim Penjualan via WhatsApp &rarr;
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
