@extends('layouts.app')

@section('title', 'SmartVerse (smartverse.id) - Umbrella Brand 5 Produk Digital Unggulan')

@section('content')
<!-- SECTION 1: HERO HEADER (FlyMotion Dynamic Style with Clean Mobile Layout & Crisp Typography) -->
<section class="relative pt-6 sm:pt-10 md:pt-14 pb-14 sm:pb-18 md:pb-24 lg:pt-16 lg:pb-28 overflow-hidden bg-flymotion-hero transition-colors duration-300">
    
    <!-- Organic Background Wave & Animated SVG Elements (Constrained to prevent mobile overflow) -->
    <div class="absolute -top-20 -right-20 sm:-top-24 sm:-right-24 w-72 h-72 sm:w-[500px] sm:h-[500px] bg-gradient-to-br from-blue-200/40 via-indigo-100/30 to-orange-100/30 dark:from-blue-900/20 dark:to-orange-950/20 rounded-full blur-3xl pointer-events-none anim-logo-object" aria-hidden="true"></div>
    <div class="absolute top-1/2 -left-16 sm:-left-20 w-60 h-60 sm:w-80 sm:h-80 bg-orange-100/50 dark:bg-orange-900/10 rounded-full blur-3xl pointer-events-none anim-logo-bottom" aria-hidden="true"></div>
    
    <!-- Floating Decorative Dotted Grids & Shapes -->
    <div class="hidden sm:block absolute top-12 left-10 text-slate-300 dark:text-slate-700 text-xs pointer-events-none select-none tracking-widest anim-logo-top" aria-hidden="true">••••••••••••••••</div>
    <div class="hidden sm:block absolute bottom-20 left-1/3 text-orange-700 dark:text-orange-400/40 text-4xl font-black pointer-events-none select-none anim-logo-bottom" aria-hidden="true">~</div>
    <div class="hidden sm:block absolute top-20 right-20 text-blue-700 dark:text-blue-400/30 text-5xl font-black pointer-events-none select-none anim-shape-rotate" aria-hidden="true">✦</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 items-center">
            
            <!-- Left Column: Typography & FlyMotion Action Buttons -->
            <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left hero-content">
                
                <!-- Subtitle / Tagline Badge (Corporate Eyebrow) -->
                <div class="flex items-center justify-center lg:justify-start">
                    <div class="inline-flex items-center gap-2 px-3 sm:px-3.5 py-1 sm:py-1.5 rounded-full bg-blue-50/90 dark:bg-blue-950/50 border border-blue-200/80 dark:border-blue-800/60 text-blue-700 dark:text-blue-400 dark:text-blue-400 text-[11px] sm:text-xs font-extrabold tracking-wide uppercase shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-[#3E5CE7] dark:bg-blue-400 animate-pulse"></span>
                        <span>{{ $settings['hero_badge'] ?? 'Digital Agency & Software House Terpercaya' }}</span>
                    </div>
                </div>

                <!-- Main Dynamic Headline (Spacious & Balanced 2-Line Flow) -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-[42px] xl:text-[48px] font-black tracking-tight text-[#07153f] dark:text-white leading-[1.35] max-w-2xl">
                    <span class="inline-block whitespace-normal sm:whitespace-nowrap pb-1">{{ $settings['hero_title_1'] ?? 'Bangun Ekosistem Digital' }}</span>
                    <span class="block text-blue-700 dark:text-blue-400 dark:text-blue-400 pt-1 sm:pt-1.5">{{ $settings['hero_title_2'] ?? 'yang Berdampak Nyata' }}</span>
                </h1>

                <!-- Subtitle Description -->
                <p class="text-xs sm:text-sm md:text-base text-slate-600 dark:text-slate-300 max-w-xl mx-auto lg:mx-0 leading-relaxed font-medium">
                    {{ $settings['hero_description'] ?? 'Kami mengintegrasikan solusi perangkat lunak mutakhir dan program edukasi untuk mentransformasi operasional bisnis Anda. Mulai dari perancangan web korporat, pengembangan aplikasi seluler, solusi otomasi cerdas, hingga penciptaan talenta digital profesional.' }}
                </p>

                <!-- 4 Quick Feature / Service Circular Icons Row (FlyMotion Signature) -->
                <div class="pt-1 pb-1 flex flex-wrap items-center justify-center lg:justify-start gap-2 sm:gap-3">
                    <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50/90 dark:bg-blue-950/50 border border-blue-100 dark:border-blue-800/60 text-[11px] font-extrabold text-blue-700 dark:text-blue-400 dark:text-blue-300 shadow-xs">
                        <span>🌐</span>
                        <span>Web Enterprise</span>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-orange-50/90 dark:bg-orange-950/50 border border-orange-100 dark:border-orange-800/60 text-[11px] font-extrabold text-orange-700 dark:text-orange-400 dark:text-orange-400 shadow-xs">
                        <span>📱</span>
                        <span>Mobile Flutter</span>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-purple-50/90 dark:bg-purple-950/50 border border-purple-100 dark:border-purple-800/60 text-[11px] font-extrabold text-purple-700 dark:text-purple-300 shadow-xs">
                        <span>🤖</span>
                        <span>AI Automation</span>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50/90 dark:bg-emerald-950/50 border border-emerald-100 dark:border-emerald-800/60 text-[11px] font-extrabold text-emerald-700 dark:text-emerald-300 shadow-xs">
                        <span>🎓</span>
                        <span>IT Training</span>
                    </div>
                </div>

                <!-- Strategic 2-CTA Hierarchy (Clear Road, High Conversion, Zero Clutter) -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3.5">
                    <!-- Primary CTA: Konsultasi Gratis (Solid Orange) -->
                    <a href="#kalkulator" 
                       class="w-full sm:w-auto px-7 py-3.5 sm:px-8 sm:py-4 rounded-xl font-black text-xs sm:text-sm uppercase tracking-wider shadow-xl shadow-orange-500/30 hover:shadow-orange-500/50 hover:scale-105 active:scale-98 transition-all flex items-center justify-center gap-2 border border-orange-300"
                       style="background: linear-gradient(135deg, #fe6000 0%, #ff7a29 100%) !important; color: #ffffff !important;">
                        <span class="font-black drop-shadow-xs" style="color: #ffffff !important;">KONSULTASI GRATIS</span>
                        <svg class="w-4 h-4" style="color: #ffffff !important;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    
                    <!-- Secondary CTA: Lihat Portofolio (Clean Corporate Outline Button) -->
                    <a href="{{ route('projects.index') }}" 
                       class="w-full sm:w-auto px-7 py-3.5 sm:px-8 sm:py-4 rounded-xl font-black text-xs sm:text-sm uppercase tracking-wider border-2 border-[#3E5CE7] dark:border-blue-400 text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:bg-[#3E5CE7] hover:text-white dark:hover:bg-blue-600 dark:hover:text-white active:scale-98 transition-all flex items-center justify-center gap-2 shadow-xs">
                        <span>LIHAT PORTOFOLIO</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                <!-- Action Button Group -->
                <div class="pt-2 sm:pt-4 flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4">
                    <a href="{{ route('products.index') }}" 
                       style="background-color: #00B5B8 !important; color: #ffffff !important;"
                       class="px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl font-black text-xs sm:text-sm uppercase tracking-wider shadow-lg shadow-cyan-500/30 hover:brightness-110 active:scale-95 transition-all text-center flex items-center justify-center gap-2">
                        <span>🚀 Jelajahi 5 Produk Unggulan</span>
                    </a>
                    
                    <a href="https://wa.me/6289695249089" target="_blank" 
                       style="background-color: #fe6000 !important; color: #ffffff !important;"
                       class="px-6 sm:px-7 py-3.5 sm:py-4 rounded-xl font-bold text-xs sm:text-sm uppercase tracking-wider shadow-lg shadow-orange-500/25 hover:brightness-110 active:scale-95 transition-all text-center flex items-center justify-center gap-2">
                        <span>💬 Konsultasi WhatsApp</span>
                    </a>
                </div>

                <!-- Trust Micro Badges -->
                <div class="pt-2 sm:pt-3 flex flex-wrap items-center justify-center lg:justify-start gap-x-4 gap-y-2 text-[11px] sm:text-xs text-slate-500 dark:text-slate-400 font-semibold">
                    <span class="inline-flex items-center gap-1.5"><span class="text-emerald-500 font-bold">✓</span> Sekali Bayar Lisensi Permanen</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-cyan-500 font-bold">✓</span> Full Source Code & Database</span>
                    <span class="inline-flex items-center gap-1.5"><span class="text-amber-500 font-bold">✓</span> Garansi Setup & Support</span>
                </div>

            </div>

            <!-- Right Column: Interactive Hero Mockup Card -->
            <div class="lg:col-span-5 relative mt-4 lg:mt-0 reveal-on-scroll">
                <div class="relative max-w-md mx-auto">
                    
                    <!-- Background Ambient Disk -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-blue-300/40 via-purple-200/30 to-orange-200/40 dark:from-blue-800/20 dark:via-purple-900/20 dark:to-orange-900/20 rounded-full blur-2xl opacity-80 anim-logo-object" aria-hidden="true"></div>
                    
                    <!-- Hero Person Card Container -->
                    <div class="relative bg-white/95 dark:bg-slate-900/95 backdrop-blur-md rounded-2xl sm:rounded-3xl p-3.5 sm:p-5 shadow-2xl border border-slate-100 dark:border-slate-800">
                        
                        <!-- Top Mini Browser Bar -->
                        <div class="flex items-center justify-between pb-2.5 border-b border-slate-100 dark:border-slate-800 text-xs mb-3">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                                <span class="font-bold text-[#07153f] dark:text-slate-200 ml-1.5 text-[10px] sm:text-[11px] mono">smartverse.id</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full bg-cyan-50 dark:bg-cyan-950/70 text-cyan-700 dark:text-cyan-400 font-bold text-[9px] sm:text-[10px]">Umbrella Brand Ecosystem</span>
                        </div>

                        <!-- Hero Image (Explicit aspect ratio 700/617 to prevent CLS) -->
                        <div class="relative rounded-xl sm:rounded-2xl overflow-hidden bg-gradient-to-b from-blue-50 via-slate-50 to-indigo-50/60 dark:from-slate-800 dark:via-slate-900 dark:to-slate-950 p-2 sm:p-3 border border-slate-100 dark:border-slate-800 flex items-center justify-center">
                            <img src="{{ asset($settings['hero_image'] ?? 'images/hero-person-old.webp') }}" alt="{{ $settings['site_title'] ?? 'SmartVerse (smartverse.id)' }} Hero" fetchpriority="high" loading="eager" decoding="async" width="700" height="617" class="w-full h-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500" style="aspect-ratio: 700 / 617;" />
                            
                            <!-- Bottom Verified Badge -->
                            <div class="absolute bottom-2.5 left-2.5 right-2.5 p-2.5 rounded-xl bg-[#07153f]/95 dark:bg-slate-950/95 backdrop-blur-md text-white text-xs space-y-0.5 shadow-xl border border-white/10">
                                <div class="flex items-center justify-between text-[9px] sm:text-[10px]">
                                    <span class="text-amber-400 font-bold">★ 5 Produk Digital Unggulan</span>
                                    <span class="text-cyan-300 font-semibold">smartverse.id</span>
                                </div>
                                <div class="font-bold text-white text-[11px] sm:text-xs">Satu Ekosistem Solusi Digital & AI Nasional</div>
                            </div>
                        </div>

                        <!-- Floating Badges (Contained & Responsive) -->
                        <div class="absolute -top-3 left-2 sm:-top-4 sm:-left-4 bg-white dark:bg-slate-800 px-2.5 sm:px-3.5 py-1 sm:py-1.5 rounded-xl sm:rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700 flex items-center gap-1.5 text-[10px] sm:text-xs font-bold text-orange-700 dark:text-orange-400 anim-logo-top" aria-hidden="true">
                            <span>🎨 Figma UI Design</span>
                        </div>

                        <div class="absolute -top-3 right-2 sm:-top-4 sm:-right-4 bg-white dark:bg-slate-800 px-2.5 sm:px-3.5 py-1 sm:py-1.5 rounded-xl sm:rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700 flex items-center gap-1.5 text-[10px] sm:text-xs font-bold text-pink-600 dark:text-pink-400 anim-logo-bottom" aria-hidden="true">
                            <span>⚡ Web Builder</span>
                        </div>

                        <div class="absolute -bottom-3 right-2 sm:-bottom-4 sm:-right-4 bg-white dark:bg-slate-800 px-2.5 sm:px-3.5 py-1 sm:py-1.5 rounded-xl sm:rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700 flex items-center gap-1.5 text-[10px] sm:text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 anim-logo-top" aria-hidden="true">
                            <span>🚀 Laravel & Flutter</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION: 5 PRODUK DIGITAL UNGGULAN SMARTVERSE (Flagship Ecosystem) -->
<section id="flagship-products" class="py-16 sm:py-20 bg-gradient-to-b from-white via-slate-50/70 to-blue-50/30 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 border-t border-slate-200/80 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    <!-- Ambient Glow Background -->
    <div class="absolute top-1/4 -right-24 w-96 h-96 bg-blue-500/10 dark:bg-blue-600/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
    <div class="absolute bottom-10 -left-20 w-80 h-80 bg-orange-500/10 dark:bg-orange-600/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-3 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100/80 dark:bg-blue-950/60 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-400 text-xs font-black uppercase tracking-wider shadow-xs">
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                <span>Flagship Digital Ecosystem</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#07153f] dark:text-white tracking-tight">
                5 Produk Digital Unggulan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-orange-500">SmartVerse</span>
            </h2>
            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                Satu ekosistem terintegrasi untuk akselerasi masa depan: portal media standar Dewan Pers, ERP edukasi multi-unit, otomatisasi konten AI, HRIS presensi biometrik, dan lab forensik konten AI saintifik.
            </p>
        </div>

        <!-- 5 Flagship Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse($flagshipProducts as $index => $prod)
                <div class="bg-white dark:bg-slate-800/95 rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-700/70 shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group relative overflow-hidden reveal-on-scroll {{ $loop->iteration === 5 ? 'md:col-span-2 lg:col-span-1 border-indigo-200 dark:border-indigo-900/60' : '' }}">
                    
                    <!-- Top Ribbon / Order -->
                    <div class="absolute -top-3 -right-3 w-16 h-16 pointer-events-none overflow-hidden">
                        <span class="absolute transform rotate-45 bg-blue-600 text-white font-black text-[10px] py-1 right-[-35px] top-[18px] w-[120px] text-center shadow-xs">
                            TOP 0{{ $loop->iteration }}
                        </span>
                    </div>

                    <div class="space-y-4">
                        <!-- Product Logo / Thumbnail -->
                        <div class="relative rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-900 border border-slate-100 dark:border-slate-700/60 p-3 flex items-center justify-center h-48 group-hover:scale-[1.02] transition-transform duration-300">
                            @if($prod->thumbnail)
                                <img src="{{ asset($prod->thumbnail) }}" alt="{{ $prod->title }}" class="max-h-full max-w-full object-contain drop-shadow-md transition-all duration-500">
                            @else
                                <div class="text-5xl">🚀</div>
                            @endif
                            <div class="absolute bottom-2 left-2">
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider bg-[#07153f]/90 text-cyan-300 backdrop-blur-xs border border-cyan-400/20 shadow-xs">
                                    {{ $prod->badge }}
                                </span>
                            </div>
                        </div>

                        <!-- Product Title & Tagline -->
                        <div>
                            <h3 class="text-lg sm:text-xl font-black text-[#07153f] dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-2">
                                {{ $prod->title }}
                            </h3>
                            <p class="text-xs sm:text-sm text-blue-600 dark:text-blue-400 font-semibold mt-1">
                                {{ $prod->tagline }}
                            </p>
                        </div>

                        <!-- Product Description -->
                        <p class="text-xs text-slate-600 dark:text-slate-300 line-clamp-3 leading-relaxed">
                            {{ $prod->description }}
                        </p>

                        <!-- Key Features Checklist -->
                        @if($prod->features)
                            @php
                                $featuresList = is_array($prod->features) ? $prod->features : (json_decode($prod->features, true) ?? []);
                            @endphp
                            <div class="pt-2 border-t border-slate-100 dark:border-slate-700/60 space-y-1.5">
                                @foreach(array_slice($featuresList, 0, 4) as $feat)
                                    <div class="flex items-start gap-2 text-xs text-slate-700 dark:text-slate-300">
                                        <span class="text-emerald-500 font-bold shrink-0">✓</span>
                                        <span class="line-clamp-1 font-medium">{{ $feat }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Bottom Action / CTA -->
                    <div class="pt-5 mt-5 border-t border-slate-100 dark:border-slate-700/60 space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold block">Harga Lisensi</span>
                                <span class="text-base sm:text-lg font-black text-[#07153f] dark:text-white font-mono">
                                    Rp {{ number_format($prod->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                Permanent
                            </span>
                        </div>

                        <!-- Special Action for SmartSynth vs others -->
                        @if($prod->slug === 'smartsynth-lab-forensik-ai')
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('products.show', $prod->slug) }}" 
                                   class="px-3 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 text-[#07153f] dark:text-white font-bold text-xs hover:bg-slate-100 dark:hover:bg-slate-700 text-center transition-all">
                                    Detail Produk
                                </a>
                                <a href="{{ asset('forensic/index.html') }}" 
                                   target="_blank" 
                                   class="px-3 py-2.5 rounded-xl font-black text-xs text-white text-center shadow-md shadow-indigo-500/20 hover:shadow-indigo-500/40 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1 bg-gradient-to-r from-indigo-600 to-cyan-600">
                                    <span>🔬 Buka Lab</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            </div>
                        @else
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('products.show', $prod->slug) }}" 
                                   class="px-3 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 text-[#07153f] dark:text-white font-bold text-xs hover:bg-slate-100 dark:hover:bg-slate-700 text-center transition-all">
                                    Detail Produk
                                </a>
                                <a href="{{ $prod->buy_url ?? 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20' . urlencode($prod->title) }}" 
                                   target="_blank" 
                                   class="px-3 py-2.5 rounded-xl font-black text-xs text-white text-center shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/40 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1 bg-emerald-600 hover:bg-emerald-500">
                                    <span>Konsultasi Demo</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>
                        @endif
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500">
                    Produk digital unggulan sedang disiapkan.
                </div>
            @endforelse
        </div>

        <!-- View All Products CTA -->
        <div class="text-center pt-4">
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center gap-2.5 px-8 py-3.5 rounded-xl font-black text-xs sm:text-sm uppercase tracking-wider bg-[#07153f] text-white hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 transition-all shadow-lg hover:shadow-blue-500/30 hover:scale-105 active:scale-95">
                <span>Lihat Seluruh Katalog Produk Digital SmartVerse</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>

<!-- SECTION 2: WHAT WE DO (6 Bento Cards with Centered Icon on Mobile & Full Dark Mode) -->
<section class="py-20 bg-[#f8faff] dark:bg-slate-900/50 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Background Floating Accents -->
    <div class="absolute top-10 right-10 text-slate-200 dark:text-slate-800 text-xs pointer-events-none select-none tracking-widest anim-logo-bottom" aria-hidden="true">••••••••••••</div>
    <div class="absolute bottom-10 left-10 text-blue-200/40 dark:text-blue-900/20 text-6xl font-black pointer-events-none select-none anim-logo-top" aria-hidden="true">✦</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Section Title Header -->
        <div class="space-y-2 text-center sm:text-left reveal-on-scroll">
            <div class="flex items-center justify-center sm:justify-start gap-3">
                <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                <span class="text-sm font-bold tracking-wider uppercase text-orange-700 dark:text-orange-400">{{ $settings['services_badge'] ?? 'SERVICE' }}</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#07153f] dark:text-white">{{ $settings['services_title'] ?? 'What We Do' }}</h2>
            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300">{{ $settings['services_description'] ?? 'Solusi komprehensif teknologi informasi, pengembangan software, dan pemasaran digital untuk bisnis Anda.' }}</p>
        </div>

        <!-- 6 Bento Cards Grid (Icons Centered on Mobile, Clean Typography & Border Dark Mode) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            
            <!-- Card 1: Web Development -->
            <div class="bg-white dark:bg-slate-800/90 p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700/70 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 space-y-5 flex flex-col justify-between group reveal-on-scroll delay-100">
                <div class="space-y-4">
                    <!-- Icon Centered on Mobile (mx-auto sm:mx-0) -->
                    <div class="w-16 h-16 rounded-2xl bg-orange-50 dark:bg-orange-950/50 text-orange-700 dark:text-orange-400 flex items-center justify-center text-3xl font-bold shadow-inner mx-auto sm:mx-0">
                        💻
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors text-center sm:text-left">Web Development</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed text-center sm:text-left">
                        Jasa pembuatan website company profile, portal berita instansi, sistem informasi desa & sekolah, hingga web application Laravel.
                    </p>
                    <ul class="space-y-2 text-xs font-semibold pt-2 border-t border-slate-100 dark:border-slate-700">
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Desain Engaging & 100% Mobile Responsive</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Panel Admin CMS Mudah Digunakan</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Gratis Domain .com & Server SSD Fast</span></li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                    <a href="{{ route('services') }}" class="text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:underline flex items-center justify-center sm:justify-start gap-1">
                        <span>Konsultasi Web Development</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 2: Web Promotion -->
            <div class="bg-white dark:bg-slate-800/90 p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700/70 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 space-y-5 flex flex-col justify-between group reveal-on-scroll delay-150">
                <div class="space-y-4">
                    <!-- Icon Centered on Mobile (mx-auto sm:mx-0) -->
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 dark:text-blue-400 flex items-center justify-center text-3xl font-bold shadow-inner mx-auto sm:mx-0">
                        🚀
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors text-center sm:text-left">Web Promotion</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed text-center sm:text-left">
                        Strategi pemasaran digital, SEO optimasi mesin pencari, dan promosi online terukur untuk mempercepat pertumbuhan bisnis Anda.
                    </p>
                    <ul class="space-y-2 text-xs font-semibold pt-2 border-t border-slate-100 dark:border-slate-700">
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Optimasi Kata Kunci Masuk Halaman 1 Google</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Audit Kecepatan & Performa Situs</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Laporan Analisis Trafik Pengunjung</span></li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                    <a href="{{ route('services') }}" class="text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:underline flex items-center justify-center sm:justify-start gap-1">
                        <span>Konsultasi SEO & Promosi</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Web Maintenance -->
            <div class="bg-white dark:bg-slate-800/90 p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700/70 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 space-y-5 flex flex-col justify-between group reveal-on-scroll delay-200">
                <div class="space-y-4">
                    <!-- Icon Centered on Mobile (mx-auto sm:mx-0) -->
                    <div class="w-16 h-16 rounded-2xl bg-amber-50 dark:bg-amber-950/50 text-amber-500 flex items-center justify-center text-3xl font-bold shadow-inner mx-auto sm:mx-0">
                        🛠️
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors text-center sm:text-left">Web Maintenance</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed text-center sm:text-left">
                        Layanan pemeliharaan teknis berkala, keamanan sertifikat SSL, pembaruan server cloud hosting, dan perbaikan bug sistem.
                    </p>
                    <ul class="space-y-2 text-xs font-semibold pt-2 border-t border-slate-100 dark:border-slate-700">
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Backup Rutin Berkala & Anti-Malware</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Update Patch Keamanan & Server</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Bantuan Teknis Prioritas 24/7</span></li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                    <a href="{{ route('services') }}" class="text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:underline flex items-center justify-center sm:justify-start gap-1">
                        <span>Konsultasi Pemeliharaan</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 4: Social Media Management -->
            <div class="bg-white dark:bg-slate-800/90 p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700/70 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 space-y-5 flex flex-col justify-between group reveal-on-scroll delay-250">
                <div class="space-y-4">
                    <!-- Icon Centered on Mobile (mx-auto sm:mx-0) -->
                    <div class="w-16 h-16 rounded-2xl bg-pink-50 dark:bg-pink-950/50 text-[#E83E8C] flex items-center justify-center text-3xl font-bold shadow-inner mx-auto sm:mx-0">
                        📱
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors text-center sm:text-left">Social Media Management</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed text-center sm:text-left">
                        Pengelolaan konten media sosial profesional, desain feed & reels estetik, penulisan caption persuasif, dan kampanye interaktif.
                    </p>
                    <ul class="space-y-2 text-xs font-semibold pt-2 border-t border-slate-100 dark:border-slate-700">
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Desain Visual Grafis & Video Reels</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Riset Hashtag & Target Audience</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Jadwal Publikasi Konten Konsisten</span></li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                    <a href="{{ route('services') }}" class="text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:underline flex items-center justify-center sm:justify-start gap-1">
                        <span>Konsultasi Sosial Media</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 5: Logo & Visual Branding -->
            <div class="bg-white dark:bg-slate-800/90 p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700/70 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 space-y-5 flex flex-col justify-between group reveal-on-scroll delay-300">
                <div class="space-y-4">
                    <!-- Icon Centered on Mobile (mx-auto sm:mx-0) -->
                    <div class="w-16 h-16 rounded-2xl bg-emerald-50 dark:bg-emerald-950/50 text-[#20C997] flex items-center justify-center text-3xl font-bold shadow-inner mx-auto sm:mx-0">
                        🎨
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors text-center sm:text-left">Logo & Visual Branding</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed text-center sm:text-left">
                        Perancangan identitas visual merek, logo vektor modern, brand guidelines profesional, dan perlengkapan stationery bisnis.
                    </p>
                    <ul class="space-y-2 text-xs font-semibold pt-2 border-t border-slate-100 dark:border-slate-700">
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">File Master Vektor (AI, SVG, PDF, PNG)</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Panduan Tipografi & Skema Warna</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Revisi Desain Fleksibel</span></li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                    <a href="{{ route('services') }}" class="text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:underline flex items-center justify-center sm:justify-start gap-1">
                        <span>Konsultasi Logo & Brand</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 6: Google & Meta Ads -->
            <div class="bg-white dark:bg-slate-800/90 p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700/70 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 space-y-5 flex flex-col justify-between group reveal-on-scroll delay-350">
                <div class="space-y-4">
                    <!-- Icon Centered on Mobile (mx-auto sm:mx-0) -->
                    <div class="w-16 h-16 rounded-2xl bg-cyan-50 dark:bg-cyan-950/50 text-[#17A2B8] flex items-center justify-center text-3xl font-bold shadow-inner mx-auto sm:mx-0">
                        🎯
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors text-center sm:text-left">Google & Meta Ads</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed text-center sm:text-left">
                        Kampanye iklan digital berbayar Google Search, YouTube, dan Instagram/Facebook Ads tertarget untuk mendatangkan omset nyata.
                    </p>
                    <ul class="space-y-2 text-xs font-semibold pt-2 border-t border-slate-100 dark:border-slate-700">
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Target Demografi & Minat Akurat</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Pelacakan Pixel & Retargeting Leads</span></li>
                        <li class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-600 dark:text-slate-300">Efisiensi Biaya Iklan Tertinggi (ROAS)</span></li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                    <a href="{{ route('services') }}" class="text-xs font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400 hover:underline flex items-center justify-center sm:justify-start gap-1">
                        <span>Konsultasi Iklan Ads</span> &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 3: TECH STACK & EKOSISTEM TEKNOLOGI (Compact, Elegant, Full Ecosystem) -->
<section class="py-14 sm:py-16 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Watermark "Stack" -->
    <div class="absolute top-4 left-1/2 -translate-x-1/2 text-7xl sm:text-8xl font-black text-slate-100/60 dark:text-slate-800/30 pointer-events-none select-none tracking-wider -z-0" aria-hidden="true">
        Stack
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 relative z-10">
        
        <!-- Header Text (Compact) -->
        <div class="text-center space-y-2 max-w-xl mx-auto reveal-on-scroll">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-100 dark:border-blue-800/50 text-blue-700 dark:text-blue-400 dark:text-blue-400 text-[11px] font-extrabold uppercase tracking-wider">
                <span>⚡ Ekosistem & Framework</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#07153f] dark:text-white">
                Teknologi yang Kami Gunakan
            </h2>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                Standar teknologi modern dan teruji untuk membangun website, mobile app, dan sistem enterprise.
            </p>
        </div>

        <!-- Compact 4-Card Grid Layout with WordPress Included -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
            
            <!-- 1. Frontend & UI -->
            <div class="p-4 sm:p-5 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-100 dark:border-slate-700/80 shadow-xs space-y-3 hover:shadow-md transition-all reveal-on-scroll delay-75 flex flex-col items-center sm:items-start text-center sm:text-left">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-2 sm:gap-2.5">
                    <span class="text-2xl sm:text-xl">🎨</span>
                    <div>
                        <h3 class="font-extrabold text-xs text-[#07153f] dark:text-white">Frontend & UI</h3>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400">User Interface & Layout</p>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center sm:justify-start gap-1.5 pt-1 w-full">
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-orange-700 dark:text-orange-400 dark:text-orange-400">HTML5</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400">CSS3</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-cyan-600 dark:text-cyan-400">Tailwind</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-yellow-600 dark:text-yellow-400">JavaScript</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-blue-500 dark:text-blue-400">TypeScript</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">Vue.js</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-cyan-500 dark:text-cyan-300">React</span>
                </div>
            </div>

            <!-- 2. Backend & CMS (Includes WordPress) -->
            <div class="p-4 sm:p-5 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-100 dark:border-slate-700/80 shadow-xs space-y-3 hover:shadow-md transition-all reveal-on-scroll delay-100 flex flex-col items-center sm:items-start text-center sm:text-left">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-2 sm:gap-2.5">
                    <span class="text-2xl sm:text-xl">⚙️</span>
                    <div>
                        <h3 class="font-extrabold text-xs text-[#07153f] dark:text-white">Backend & CMS</h3>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400">Server & Content Engine</p>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center sm:justify-start gap-1.5 pt-1 w-full">
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-indigo-600 dark:text-indigo-400">PHP 8.4</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-red-600 dark:text-red-400">Laravel 13</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-orange-700 dark:text-orange-400 dark:text-orange-400">CodeIgniter</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-blue-700 dark:text-blue-400 dark:text-blue-300">WordPress</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-cyan-700 dark:text-cyan-300">Golang</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-amber-700 dark:text-amber-400 dark:text-amber-300">Python</span>
                </div>
            </div>

            <!-- 3. Mobile Apps -->
            <div class="p-4 sm:p-5 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-100 dark:border-slate-700/80 shadow-xs space-y-3 hover:shadow-md transition-all reveal-on-scroll delay-150 flex flex-col items-center sm:items-start text-center sm:text-left">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-2 sm:gap-2.5">
                    <span class="text-2xl sm:text-xl">📱</span>
                    <div>
                        <h3 class="font-extrabold text-xs text-[#07153f] dark:text-white">Mobile Apps</h3>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400">Android & iOS Solutions</p>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center sm:justify-start gap-1.5 pt-1 w-full">
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-sky-600 dark:text-sky-400">Flutter</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400">Dart</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-purple-600 dark:text-purple-400">Kotlin</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-cyan-600 dark:text-cyan-400">React Native</span>
                </div>
            </div>

            <!-- 4. Database & Tools -->
            <div class="p-4 sm:p-5 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-100 dark:border-slate-700/80 shadow-xs space-y-3 hover:shadow-md transition-all reveal-on-scroll delay-200 flex flex-col items-center sm:items-start text-center sm:text-left">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-2 sm:gap-2.5">
                    <span class="text-2xl sm:text-xl">🗄️</span>
                    <div>
                        <h3 class="font-extrabold text-xs text-[#07153f] dark:text-white">Database & Tools</h3>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400">Data Storage & Versioning</p>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center sm:justify-start gap-1.5 pt-1 w-full">
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-blue-700 dark:text-blue-300">MySQL</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-blue-700 dark:text-blue-400 dark:text-blue-400">PostgreSQL</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-indigo-500 dark:text-indigo-300">SQLite</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">NoSQL</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-red-600 dark:text-red-400">Redis</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-slate-800 dark:text-slate-200">Git / GitHub</span>
                    <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[11px] font-bold text-sky-600 dark:text-sky-400">Docker</span>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECTION 4: ABOUT US (FlyMotion Layout with Animated Floating Illustrations) -->
<section class="py-20 bg-[#f8faff] dark:bg-slate-950 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left reveal-on-scroll">
                <div class="flex items-center justify-center lg:justify-start gap-3">
                    <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                    <span class="text-sm font-bold tracking-wider uppercase text-blue-700 dark:text-blue-400">{{ $settings['about_badge'] ?? 'About us' }}</span>
                </div>
                
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white leading-tight">
                    {{ $settings['about_title'] ?? 'We develop digital strategies products and services.' }}
                </h2>
                
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    {!! nl2br(e($settings['about_description'] ?? 'SmartVerse (smartverse.id) adalah umbrella brand produk digital terintegrasi yang menghadirkan solusi teknologi mutakhir untuk sektor media jurnalisme, institusi pendidikan Islam, manajemen SDM korporasi, otomatisasi konten visual AI, serta forensik digital saintifik. Didukung arsitektur software berstandar industri dan teknologi artificial intelligence modern.')) !!}
                </p>

                <div class="pt-2 flex justify-center lg:justify-start">
                    <a href="{{ $settings['about_button_url'] ?? route('services') }}" class="px-7 py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md inline-flex items-center gap-2 transition-all">
                        <span>{{ $settings['about_button_text'] ?? 'Pelajari Selengkapnya' }}</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Right Column: Interactive Illustration Showcase with Floating Shapes -->
            <div class="lg:col-span-5 flex justify-center relative reveal-on-scroll delay-200">
                
                <!-- Floating Decorative Shapes -->
                <div class="absolute -top-6 -left-6 text-orange-700 dark:text-orange-400 text-3xl font-black anim-logo-top" aria-hidden="true">✦</div>
                <div class="absolute -bottom-6 -right-6 text-blue-700 dark:text-blue-400 text-4xl font-black anim-logo-bottom" aria-hidden="true">~</div>

                <div class="bg-white dark:bg-slate-800 p-5 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-xl max-w-md w-full relative">
                    <div class="aspect-video rounded-2xl overflow-hidden border border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 shadow-xs p-2 flex items-center justify-center">
                        <img src="{{ asset($settings['about_image'] ?? 'images/Ilustrasi-Homepage-1-1.webp') }}" alt="{{ $settings['about_title'] ?? 'SmartVerse Umbrella Brand Ecosystem' }}" loading="lazy" decoding="async" width="881" height="661" class="w-full h-full object-contain" style="aspect-ratio: 881 / 661;" />
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 4.1: EKOSISTEM 5 PRODUK UNGGULAN SMARTVERSE (Umbrella Brand Flagship Ecosystem) -->
<section class="py-16 sm:py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Decorative Watermark "SmartVerse" -->
    <div class="absolute top-4 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-100/60 dark:text-slate-800/25 pointer-events-none select-none tracking-wider -z-0" aria-hidden="true">
        SmartVerse
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Header -->
        <div class="text-center space-y-3 max-w-3xl mx-auto reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-50 dark:bg-cyan-950/60 border border-cyan-200 dark:border-cyan-800/60 text-cyan-700 dark:text-cyan-400 text-xs font-extrabold uppercase tracking-wider">
                <span>🚀 UMBRELLA BRAND EKOSISTEM DIGITAL</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#07153f] dark:text-white leading-tight">
                5 Pilar Inovasi Produk Digital Unggulan SmartVerse
            </h2>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                <strong class="text-slate-800 dark:text-slate-100">SmartVerse (smartverse.id)</strong> menaungi 5 produk digital mandiri dengan lisensi kepemilikan permanen (sekali bayar tanpa sewa bulanan), arsitektur modern berstandar enterprise, dan integrasi Artificial Intelligence mutakhir.
            </p>
        </div>

        <!-- 5 Flagship Product Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Card 1: SmartNews -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border-2 border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all space-y-3 reveal-on-scroll delay-75 flex flex-col justify-between items-center sm:items-stretch text-center sm:text-left">
                <div class="space-y-3 w-full">
                    <div class="w-14 h-14 rounded-2xl bg-sky-50 dark:bg-sky-950 text-sky-600 dark:text-sky-400 flex items-center justify-center text-3xl font-bold shadow-xs mx-auto sm:mx-0">
                        📰
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-sky-600 dark:text-sky-400 block">Jurnalisme & Media</span>
                        <h3 class="text-base font-black text-[#07153f] dark:text-white">SmartNews CMS Portal Berita</h3>
                        <p class="text-xs font-mono font-bold text-slate-800 dark:text-slate-200 pt-0.5">
                            Standar Regulasi Dewan Pers & AI Writer
                        </p>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed pt-2 border-t border-slate-100 dark:border-slate-700">
                        CMS portal media online berkecepatan tinggi dengan integrasi AI SEO Writer, 6 slot monetisasi iklan mandiri, dan multi-role redaksi editorial.
                    </p>
                </div>
                <div class="pt-3 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 w-full">
                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">✓ Sekali Bayar</span>
                    <a href="{{ route('products.show', 'smartnews-cms-portal-berita') }}" class="text-xs font-bold text-sky-600 dark:text-sky-400 hover:underline inline-flex items-center gap-1">Detail Produk &rarr;</a>
                </div>
            </div>

            <!-- Card 2: SmartEdu SIT -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border-2 border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all space-y-3 reveal-on-scroll delay-150 flex flex-col justify-between items-center sm:items-stretch text-center sm:text-left">
                <div class="space-y-3 w-full">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-3xl font-bold shadow-xs mx-auto sm:mx-0">
                        🎓
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-emerald-600 dark:text-emerald-400 block">Edukasi & Pesantren</span>
                        <h3 class="text-base font-black text-[#07153f] dark:text-white">SmartEdu SIT Educational ERP</h3>
                        <p class="text-xs font-mono font-bold text-slate-800 dark:text-slate-200 pt-0.5">
                            25 Modul Terintegrasi & SafeSchool
                        </p>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed pt-2 border-t border-slate-100 dark:border-slate-700">
                        ERP lengkap sekolah Islam terpadu & pesantren dengan mutabaah yaumiyah, buku induk digital, SPP Virtual Account otomatis, dan kanal anti-bullying.
                    </p>
                </div>
                <div class="pt-3 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 w-full">
                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">✓ Sekali Bayar</span>
                    <a href="{{ route('products.show', 'smartedu-ekosistem-sekolah-terpadu') }}" class="text-xs font-bold text-emerald-600 dark:text-emerald-400 hover:underline inline-flex items-center gap-1">Detail Produk &rarr;</a>
                </div>
            </div>

            <!-- Card 3: SmartFeed -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border-2 border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all space-y-3 reveal-on-scroll delay-200 flex flex-col justify-between items-center sm:items-stretch text-center sm:text-left">
                <div class="space-y-3 w-full">
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 dark:bg-purple-950 text-purple-600 dark:text-purple-400 flex items-center justify-center text-3xl font-bold shadow-xs mx-auto sm:mx-0">
                        ⚡
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-purple-600 dark:text-purple-400 block">Kreatif & Pemasaran AI</span>
                        <h3 class="text-base font-black text-[#07153f] dark:text-white">SmartFeed AI Visual Studio</h3>
                        <p class="text-xs font-mono font-bold text-slate-800 dark:text-slate-200 pt-0.5">
                            15+ Mode Kreatif & Multi-Slide Instan
                        </p>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed pt-2 border-t border-slate-100 dark:border-slate-700">
                        Otomatisasi konten sosial media dalam hitungan detik. Hasilkan carousel swipeable, gridfeed branding, copywriting AIDA/PAS, dan video script affiliate.
                    </p>
                </div>
                <div class="pt-3 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 w-full">
                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">✓ Sekali Bayar</span>
                    <a href="{{ route('products.show', 'smartfeed-ai-visual-studio') }}" class="text-xs font-bold text-purple-600 dark:text-purple-400 hover:underline inline-flex items-center gap-1">Detail Produk &rarr;</a>
                </div>
            </div>

            <!-- Card 4: SmartSDM -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border-2 border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all space-y-3 reveal-on-scroll delay-250 flex flex-col justify-between items-center sm:items-stretch text-center sm:text-left">
                <div class="space-y-3 w-full">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 dark:bg-blue-950 text-blue-600 dark:text-blue-400 flex items-center justify-center text-3xl font-bold shadow-xs mx-auto sm:mx-0">
                        📱
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-blue-600 dark:text-blue-400 block">HRIS & Operasional</span>
                        <h3 class="text-base font-black text-[#07153f] dark:text-white">SmartSDM Mobile HRIS</h3>
                        <p class="text-xs font-mono font-bold text-slate-800 dark:text-slate-200 pt-0.5">
                            Biometrik Face Liveness & Radar GPS
                        </p>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed pt-2 border-t border-slate-100 dark:border-slate-700">
                        Aplikasi mobile absensi biometrik anti-titip absen dengan deteksi wajah liveness (kedipan mata), radius geofencing Haversine, dan penggajian otomatis.
                    </p>
                </div>
                <div class="pt-3 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 w-full">
                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">✓ Sekali Bayar</span>
                    <a href="{{ route('products.show', 'smartsdm-mobile-hris-presensi') }}" class="text-xs font-bold text-blue-600 dark:text-blue-400 hover:underline inline-flex items-center gap-1">Detail Produk &rarr;</a>
                </div>
            </div>

            <!-- Card 5: SmartSynth -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border-2 border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all space-y-3 reveal-on-scroll delay-300 flex flex-col justify-between items-center sm:items-stretch text-center sm:text-left sm:col-span-2 lg:col-span-1">
                <div class="space-y-3 w-full">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 dark:bg-indigo-950 text-indigo-600 dark:text-indigo-400 flex items-center justify-center text-3xl font-bold shadow-xs mx-auto sm:mx-0">
                        🔬
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-indigo-600 dark:text-indigo-400 block">AI & Forensik Digital</span>
                        <h3 class="text-base font-black text-[#07153f] dark:text-white">SmartSynth Lab Forensik AI</h3>
                        <p class="text-xs font-mono font-bold text-slate-800 dark:text-slate-200 pt-0.5">
                            C2PA 2.4, Real ELA & 2D FFT Saintifik
                        </p>
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed pt-2 border-t border-slate-100 dark:border-slate-700">
                        Suite pengujian keaslian foto digital secara saintifik melalui EXIF biner, kriptografi C2PA 2.4, Error Level Analysis (ELA), dan spektrogram 2D FFT.
                    </p>
                </div>
                <div class="pt-3 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 w-full">
                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">✓ Sekali Bayar</span>
                    <a href="{{ route('products.show', 'smartsynth-lab-forensik-ai') }}" class="text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline inline-flex items-center gap-1">Detail Produk &rarr;</a>
                </div>
            </div>

            <!-- Card 6: Custom Enterprise Software -->
            <div class="bg-gradient-to-br from-[#07153f] to-[#0d2360] dark:from-slate-950 dark:to-[#07153f] p-6 rounded-3xl text-white shadow-xl hover:-translate-y-1 transition-all space-y-3 reveal-on-scroll delay-350 flex flex-col justify-between items-center sm:items-stretch text-center sm:text-left sm:col-span-2 lg:col-span-1 border border-cyan-500/30">
                <div class="space-y-3 w-full">
                    <div class="w-14 h-14 rounded-2xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-3xl font-bold shadow-xs mx-auto sm:mx-0">
                        🏢
                    </div>
                    <div class="space-y-1">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-cyan-300 block">Custom Architecture</span>
                        <h3 class="text-base font-black text-white">Custom Software & AI Solution</h3>
                        <p class="text-xs font-mono font-bold text-slate-300 pt-0.5">
                            Tailor-Made Sesuai Kebutuhan Anda
                        </p>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed pt-2 border-t border-white/10">
                        Butuh kustomisasi sistem khusus atau integrasi enterprise? Tim software engineer SmartVerse siap mendampingi dari tahap arsitektur hingga deployment.
                    </p>
                </div>
                <div class="pt-3 flex items-center justify-between border-t border-white/10 w-full">
                    <span class="text-[10px] font-bold text-cyan-300 flex items-center gap-1">✓ Dedicated Team</span>
                    <a href="https://wa.me/6289695249089" target="_blank" class="text-xs font-bold text-orange-400 hover:underline inline-flex items-center gap-1">Konsultasi &rarr;</a>
                </div>
            </div>

        </div>

        <!-- 5 Keunggulan SmartVerse -->
        <div class="p-6 sm:p-8 rounded-3xl bg-[#f8faff] dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 space-y-6 reveal-on-scroll">
            <div class="text-center sm:text-left space-y-1">
                <span class="text-xs font-bold text-orange-700 dark:text-orange-400 uppercase tracking-wider mono block text-center sm:text-left">KENAPA MEMILIH KAMI</span>
                <h3 class="text-lg sm:text-xl font-extrabold text-[#07153f] dark:text-white">5 Jaminan Keunggulan Layanan SmartVerse</h3>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="space-y-2 p-4 sm:p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-700 shadow-2xs text-center sm:text-left flex flex-col items-center sm:items-start">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-950/60 text-2xl flex items-center justify-center mx-auto sm:mx-0 shadow-2xs">⏱️</div>
                    <h4 class="font-extrabold text-xs text-[#07153f] dark:text-white">Pengerjaan Cepat</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-relaxed">Dikerjakan tim profesional berpengalaman dengan timeline pengerjaan terukur.</p>
                </div>
                <div class="space-y-2 p-4 sm:p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-700 shadow-2xs text-center sm:text-left flex flex-col items-center sm:items-start">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-2xl flex items-center justify-center mx-auto sm:mx-0 shadow-2xs">✨</div>
                    <h4 class="font-extrabold text-xs text-[#07153f] dark:text-white">Hasil Memuaskan</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-relaxed">Desain modern, UI responsif seluruh perangkat, dan kode berkualitas tinggi.</p>
                </div>
                <div class="space-y-2 p-4 sm:p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-700 shadow-2xs text-center sm:text-left flex flex-col items-center sm:items-start">
                    <div class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-950/60 text-2xl flex items-center justify-center mx-auto sm:mx-0 shadow-2xs">🏷️</div>
                    <h4 class="font-extrabold text-xs text-[#07153f] dark:text-white">Harga Terjangkau</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-relaxed">Kualitas terbaik dengan penawaran bersaing dan fitur sesuai kebutuhan.</p>
                </div>
                <div class="space-y-2 p-4 sm:p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-700 shadow-2xs text-center sm:text-left flex flex-col items-center sm:items-start">
                    <div class="w-10 h-10 rounded-xl bg-yellow-50 dark:bg-yellow-950/60 text-2xl flex items-center justify-center mx-auto sm:mx-0 shadow-2xs">🤝</div>
                    <h4 class="font-extrabold text-xs text-[#07153f] dark:text-white">Konsultasi Gratis</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-relaxed">Diskusi arsitektur dan kebutuhan sistem tanpa ikatan komitmen awal.</p>
                </div>
                <div class="space-y-2 p-4 sm:p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-700 shadow-2xs text-center sm:text-left flex flex-col items-center sm:items-start">
                    <div class="w-10 h-10 rounded-xl bg-cyan-50 dark:bg-cyan-950/60 text-2xl flex items-center justify-center mx-auto sm:mx-0 shadow-2xs">💎</div>
                    <h4 class="font-extrabold text-xs text-[#07153f] dark:text-white">Lisensi Permanen</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-relaxed">Sekali bayar kepemilikan penuh tanpa biaya langganan bulanan yang membebani.</p>
                </div>
            </div>
        </div>

    </div>
</section>

        </div>

    </div>
</section>

<!-- SECTION 5: PRODUCT & READY SOFTWARE SOLUTIONS ("Our Products & Solutions with Interactive UI Slider") -->
<section id="produk-unggulan" 
         x-data="{
             modalOpen: false,
             activeTitle: '',
             activeClient: '',
             activeType: 'web',
             activeUrl: '',
             activeSlides: [],
             currentSlide: 0,

             openModal(title, client, type, url, slides) {
                 this.activeTitle = title;
                 this.activeClient = client;
                 this.activeType = type || 'web';
                 this.activeUrl = url;
                 this.activeSlides = (slides && Array.isArray(slides) && slides.length > 0) ? slides : [];
                 this.currentSlide = 0;
                 this.modalOpen = true;
             },
             closeModal() {
                 this.modalOpen = false;
             },
             nextSlide() {
                 if (this.activeSlides.length > 0) {
                     this.currentSlide = (this.currentSlide + 1) % this.activeSlides.length;
                 }
             },
             prevSlide() {
                 if (this.activeSlides.length > 0) {
                     this.currentSlide = (this.currentSlide - 1 + this.activeSlides.length) % this.activeSlides.length;
                 }
             }
         }"
         @keydown.escape.window="closeModal()"
         @keydown.arrow-right.window="if (modalOpen) nextSlide()"
         @keydown.arrow-left.window="if (modalOpen) prevSlide()"
         class="py-20 bg-[#f8faff] dark:bg-slate-950 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Background Watermark Text "Product" -->
    <div class="absolute top-8 left-8 text-8xl sm:text-9xl font-black text-slate-200/40 dark:text-slate-800/30 pointer-events-none select-none tracking-wider -z-0" aria-hidden="true">
        Products
    </div>

    <!-- Ambient Decorative Gradients -->
    <div class="absolute top-1/4 right-0 w-96 h-96 bg-blue-400/10 dark:bg-blue-600/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 left-1/4 w-80 h-80 bg-orange-400/10 dark:bg-orange-600/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Section Header -->
        <div class="space-y-4 text-center sm:text-left reveal-on-scroll max-w-3xl mx-auto sm:mx-0">
            <div class="flex items-center justify-center sm:justify-start gap-3">
                <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                <span class="text-xs sm:text-sm font-extrabold tracking-wider uppercase text-orange-700 dark:text-orange-400 mono">
                    💼 REKAM JEJAK & PORTOFOLIO KARYA
                </span>
            </div>
            
            <div class="space-y-2">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white leading-tight tracking-tight">
                    Portofolio & Solusi Digital Unggulan
                </h2>
                <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    {!! $settings['portfolio_description'] ?? 'Eksplorasi portofolio proyek dan sistem informasi enterprise inovatif yang kami rancang dan kembangkan untuk berbagai instansi pemerintah, institusi pendidikan, dan perusahaan nasional. <strong>Klik foto portofolio</strong> untuk melihat galeri tampilan layar aplikasi.' !!}
                </p>
            </div>

            <!-- Value Highlights Pills -->
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 sm:gap-3 pt-1">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200/80 dark:border-blue-800/60 text-blue-700 dark:text-blue-400 dark:text-blue-400 text-xs font-bold shadow-2xs">
                    <span>⚡</span> <span>Implementasi Instan & Teruji</span>
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200/80 dark:border-emerald-800/60 text-emerald-700 dark:text-emerald-400 text-xs font-bold shadow-2xs">
                    <span>🔒</span> <span>Keamanan Berstandar Tinggi</span>
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 dark:bg-amber-950/60 border border-amber-200/80 dark:border-amber-800/60 text-amber-700 dark:text-amber-400 text-xs font-bold shadow-2xs">
                    <span>💬</span> <span>Notifikasi Otomatis WhatsApp</span>
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-purple-50 dark:bg-purple-950/60 border border-purple-200/80 dark:border-purple-800/60 text-purple-700 dark:text-purple-400 text-xs font-bold shadow-2xs">
                    <span>📱</span> <span>Responsif Web & Mobile Flutter</span>
                </span>
            </div>
        </div>

        <!-- 12 Portfolio Showcase Grid (4 Columns x 3 Rows) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
            @foreach($featuredProjects->take(12) as $index => $project)
                @php
                    $displayTitle = $project->title;
                    $displaySubtitle = $project->summary;
                    $badgeCategory = $project->category?->name ?? 'Portofolio';
                    $statusBadge = $project->status_badge ?? '🟢 Siap Pakai';

                    $keyFeatures = !empty($project->features) && is_array($project->features) 
                        ? array_slice($project->features, 0, 2)
                        : [
                            'Antarmuka modern & mobile responsive',
                            'Integrasi database & proteksi keamanan'
                        ];

                    $techPills = !empty($project->tech_stack) && is_array($project->tech_stack)
                        ? array_slice($project->tech_stack, 0, 3)
                        : ['Laravel 13', 'Tailwind', 'MySQL'];

                    $sliderScreens = $project->slider_screens;
                    $slidesJson = json_encode($sliderScreens);
                    $waProductUrl = "https://wa.me/6289695249089?text=" . urlencode("Halo SmartVerse, saya tertarik konsultasi portofolio sistem: {$displayTitle}");
                @endphp

                <div class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200/90 dark:border-slate-800 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group reveal-on-scroll">
                    
                    <!-- Top Visual Image Container with Interactive Click to Open Gallery Slider (Auto Fit Lebar, Tidak Terpotong) -->
                    <div>
                        <div class="aspect-video overflow-hidden relative border-b border-slate-100 dark:border-slate-800 bg-slate-950 cursor-pointer group/img"
                             @click="openModal('{{ addslashes($displayTitle) }}', '{{ addslashes($project->client_name) }}', '{{ $project->app_type ?? 'web' }}', '{{ $waProductUrl }}', {{ $slidesJson }})"
                             title="Klik untuk membuka preview screenshot antarmuka">
                            
                            <img src="{{ asset($project->thumbnail) }}" 
                                 alt="{{ $displayTitle }}" 
                                 loading="lazy"
                                 decoding="async"
                                 width="600"
                                 height="338"
                                 class="w-full h-full object-cover object-top group-hover/img:scale-105 transition-transform duration-700" />
                            
                            <!-- Overlay Gradient for contrast -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20 pointer-events-none"></div>

                            <!-- Interactive Click Hover Prompt -->
                            <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center p-3">
                                <span class="px-3.5 py-1.5 rounded-xl bg-white/95 dark:bg-slate-900/95 text-[#07153f] dark:text-white font-extrabold text-[11px] shadow-2xl flex items-center gap-1.5 transform translate-y-2 group-hover/img:translate-y-0 transition-transform">
                                    <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6"/>
                                    </svg>
                                    <span>Preview ({{ count($sliderScreens) }} Layar)</span>
                                </span>
                            </div>

                            <!-- Floating Badges Top -->
                            <div class="absolute top-2.5 inset-x-2.5 flex items-center justify-between pointer-events-none z-10">
                                <span class="px-2.5 py-0.5 rounded-full bg-white/95 dark:bg-slate-900/95 backdrop-blur-md text-blue-700 dark:text-blue-400 font-extrabold text-[10px] border border-blue-100 dark:border-blue-900/60 shadow-xs line-clamp-1 max-w-[65%]">
                                    {{ $badgeCategory }}
                                </span>
                                <span class="px-2 py-0.5 rounded-full bg-emerald-600/90 text-white font-bold text-[9px] shadow-xs backdrop-blur-sm shrink-0">
                                    {{ $statusBadge }}
                                </span>
                            </div>

                            <!-- Client Badge Bottom Left & Layar Count Bottom Right -->
                            <div class="absolute bottom-2.5 inset-x-2.5 flex items-center justify-between pointer-events-none z-10">
                                <span class="text-[10px] font-semibold text-white/95 drop-shadow-md flex items-center gap-1 bg-black/50 backdrop-blur-md px-2 py-0.5 rounded-lg border border-white/15 line-clamp-1 max-w-[70%]">
                                    <span>📍</span> <span>{{ $project->client_name }}</span>
                                </span>
                                <span class="text-[9px] font-bold text-white bg-black/70 backdrop-blur-md px-2 py-0.5 rounded-lg border border-white/20 flex items-center gap-1 shadow-xs shrink-0">
                                    <span>🖼️</span> <span>{{ count($sliderScreens) }} Foto</span>
                                </span>
                            </div>
                        </div>

                        <!-- Card Content Body (Versi Lama yang Rapi & Lengkap Sesuai Permintaan) -->
                        <div class="p-5 space-y-3">
                            
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-extrabold text-[#07153f] dark:text-white group-hover:text-blue-700 dark:text-blue-400 transition-colors leading-snug line-clamp-1" title="{{ $displayTitle }}">
                                    {{ $displayTitle }}
                                </h3>
                                <p class="text-[11px] text-slate-600 dark:text-slate-300 leading-relaxed font-normal line-clamp-2">
                                    {{ $displaySubtitle }}
                                </p>
                            </div>

                            <!-- Feature Checklist Highlights (Versi Lama) -->
                            <div class="space-y-1.5 pt-2 border-t border-slate-100 dark:border-slate-800/80">
                                <ul class="space-y-1 text-[11px] text-slate-700 dark:text-slate-300">
                                    @foreach($keyFeatures as $feat)
                                        <li class="flex items-start gap-1.5 line-clamp-1">
                                            <span class="text-emerald-500 font-bold shrink-0">✓</span>
                                            <span class="leading-tight truncate">{{ $feat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Tech Stack Pills -->
                            <div class="flex flex-wrap gap-1 pt-1">
                                @foreach($techPills as $tp)
                                    <span class="px-2 py-0.5 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-medium text-[9px] mono">
                                        {{ $tp }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Controls: Ganti Layar UI Menjadi Icon Kaca Pembesar / Zoom + Preview -->
                    <div class="p-5 pt-0 space-y-2">
                        <div class="pt-2.5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                            <button type="button"
                                    @click="openModal('{{ addslashes($displayTitle) }}', '{{ addslashes($project->client_name) }}', '{{ $project->app_type ?? 'web' }}', '{{ $waProductUrl }}', {{ $slidesJson }})"
                                    class="text-[11.5px] font-bold text-blue-700 dark:text-blue-400 hover:underline flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6"/>
                                </svg>
                                <span>Preview</span>
                            </button>
                            
                            <a href="{{ route('projects.show', $project->slug) }}" 
                               style="background-color: #07153f !important; color: #ffffff !important;"
                               class="px-3 py-1.5 rounded-xl font-bold text-[11px] hover:brightness-125 active:scale-95 transition-all flex items-center gap-1">
                                <span style="color: #ffffff !important;">Detail</span>
                                <span style="color: #ffffff !important;">&rarr;</span>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Big Dedicated Portfolio Page Link Button -->
        <div class="text-center pt-4">
            <a href="{{ route('projects.index') }}" 
               style="background-color: #3E5CE7 !important; color: #ffffff !important;"
               class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl font-black text-xs sm:text-sm uppercase tracking-wider shadow-xl shadow-blue-500/25 hover:brightness-110 active:scale-98 transition-all">
                <span style="color: #ffffff !important;">🚀 Lihat Semua 15+ Portofolio di Halaman Khusus Portofolio</span>
                <span style="color: #ffffff !important;">&rarr;</span>
            </a>
        </div>

        <!-- Interactive Custom Solution Callout Box -->
        <div class="rounded-3xl p-6 sm:p-8 bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-6 reveal-on-scroll">
            <div class="space-y-2 text-center lg:text-left max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-50 dark:bg-orange-950/50 text-orange-700 dark:text-orange-400 text-xs font-bold border border-orange-200/60 dark:border-orange-900/50">
                    <span>💡 Solusi Kustom Sesuai Alur Organisasi</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-extrabold text-[#07153f] dark:text-white">
                    Punya Kebutuhan Sistem Khusus di Luar Portofolio di Atas?
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Kami berpengalaman merancang sistem informasi terintegrasi sesuai SOP dan alur kerja instansi Anda. Diskusikan rencana dan dapatkan estimasi biaya transparan tanpa komitmen awal.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3 shrink-0 w-full lg:w-auto">
                <a href="#kalkulator" class="w-full sm:w-auto text-center px-6 py-3.5 rounded-xl surface border border-slate-200 dark:border-slate-700 text-[#07153f] dark:text-white font-bold text-xs hover:border-[#3E5CE7] dark:hover:border-blue-400 transition-all shadow-xs">
                    <span>⚡ Hitung Estimasi Biaya</span>
                </a>
                <a href="https://wa.me/6289695249089?text=Halo%20CV.%20Beranda%20Teknologi%20Digital,%20saya%20ingin%20konsultasi%20pembuatan%20sistem%20kustom" 
                   target="_blank" 
                   style="background-color: #fe6000 !important; color: #ffffff !important;"
                   class="w-full sm:w-auto text-center px-6 py-3.5 rounded-xl font-bold text-xs uppercase shadow-md shadow-orange-600/25 hover:brightness-110 transition-all flex items-center justify-center gap-2">
                    <span style="color: #ffffff !important;">💬 Konsultasi Sekarang</span>
                    <span style="color: #ffffff !important;">&rarr;</span>
                </a>
            </div>
        </div>

    </div>

    <!-- ========================================================================= -->
    <!-- INTERACTIVE PRODUCT GALLERY SLIDER MODAL (Responsive Web & Mobile Frame)   -->
    <!-- ========================================================================= -->
    <div x-show="modalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-slate-950/85 backdrop-blur-md flex items-center justify-center p-2.5 sm:p-6 overflow-y-auto" 
         style="display: none;">
        
        <div @click.away="closeModal()" 
             x-show="modalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="w-full max-w-5xl bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-2xl overflow-hidden flex flex-col my-auto relative max-h-[95vh]">
            
            <!-- Modal Header Bar -->
            <div class="px-5 py-3.5 sm:px-7 sm:py-4 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between bg-slate-50/70 dark:bg-slate-900/90 shrink-0">
                <div class="space-y-0.5 pr-4">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-extrabold text-[#07153f] dark:text-white" x-text="activeTitle"></h3>
                        <span x-show="activeSlides[currentSlide]?.type === 'mobile'" class="px-2 py-0.5 rounded-full bg-purple-100 dark:bg-purple-950/70 text-purple-700 dark:text-purple-300 text-[10px] font-extrabold shrink-0">
                            📱 Smartphone Frame
                        </span>
                        <span x-show="activeSlides[currentSlide]?.type !== 'mobile'" class="px-2 py-0.5 rounded-full bg-blue-100 dark:bg-blue-950/70 text-blue-700 dark:text-blue-300 text-[10px] font-extrabold shrink-0">
                            🖥️ Desktop Web Frame
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400" x-text="activeClient"></p>
                </div>

                <div class="flex items-center gap-3 shrink-0">
                    <span class="text-xs font-mono font-bold text-slate-400 dark:text-slate-500 hidden sm:inline">
                        <span x-text="currentSlide + 1"></span> / <span x-text="activeSlides.length"></span>
                    </span>
                    <button type="button" 
                            @click="closeModal()" 
                            class="w-8 h-8 rounded-full bg-slate-200/80 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-rose-500 hover:text-white flex items-center justify-center font-bold text-sm transition-all"
                            title="Tutup (Esc)">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Modal Body Screen View (Simulated Web Desktop vs Smartphone Frame) -->
            <div class="bg-slate-950 p-4 sm:p-8 flex items-center justify-center min-h-[320px] sm:min-h-[480px] overflow-hidden relative select-none flex-grow">
                
                <!-- PREV BUTTON -->
                <button type="button" 
                        @click.stop="prevSlide()" 
                        x-show="activeSlides.length > 1" 
                        class="absolute left-2 sm:left-5 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#fe6000] text-white backdrop-blur-md flex items-center justify-center font-bold text-lg shadow-2xl transition-all z-30"
                        title="Foto Sebelumnya">
                    ❮
                </button>

                <!-- NEXT BUTTON -->
                <button type="button" 
                        @click.stop="nextSlide()" 
                        x-show="activeSlides.length > 1" 
                        class="absolute right-2 sm:right-5 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#fe6000] text-white backdrop-blur-md flex items-center justify-center font-bold text-lg shadow-2xl transition-all z-30"
                        title="Foto Selanjutnya">
                    ❯
                </button>

                <!-- 1. DESKTOP WEB FRAME (16:9 Landscape) -->
                <div x-show="activeSlides[currentSlide]?.type !== 'mobile'" 
                     class="w-full max-w-4xl mx-auto rounded-2xl overflow-hidden border border-slate-700 bg-slate-900 shadow-2xl transition-all">
                    <!-- Browser Simulated Titlebar -->
                    <div class="h-7 bg-slate-800 border-b border-slate-700 px-3 flex items-center gap-2">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500/90"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500/90"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/90"></span>
                        </div>
                        <div class="flex-grow max-w-xs mx-auto bg-slate-900/80 rounded-md py-0.5 px-3 text-[10px] text-slate-400 font-mono truncate text-center">
                            https://smartverse.id/system-preview
                        </div>
                    </div>
                    <!-- Image Content -->
                    <div class="relative bg-slate-950 flex items-center justify-center">
                        <img :src="activeSlides[currentSlide]?.url" 
                             :alt="activeSlides[currentSlide]?.title" 
                             class="w-full h-auto max-h-[58vh] object-contain mx-auto" />
                    </div>
                </div>

                <!-- 2. SMARTPHONE MOBILE FRAME (9:16 Portrait) -->
                <div x-show="activeSlides[currentSlide]?.type === 'mobile'" 
                     class="w-full max-w-[280px] sm:max-w-[320px] mx-auto rounded-[2.5rem] border-[5px] border-slate-700 bg-black shadow-2xl p-2 relative transition-all">
                    <!-- Smartphone Notch / Dynamic Island -->
                    <div class="w-24 h-4 bg-black rounded-full mx-auto mb-2 border border-slate-800"></div>
                    <!-- Screen Image -->
                    <div class="rounded-[1.8rem] overflow-hidden bg-slate-900 flex items-center justify-center">
                        <img :src="activeSlides[currentSlide]?.url" 
                             :alt="activeSlides[currentSlide]?.title" 
                             class="w-full h-auto max-h-[58vh] object-contain mx-auto" />
                    </div>
                </div>

            </div>

            <!-- Modal Footer Caption & Action Bar -->
            <div class="px-5 py-4 sm:px-7 sm:py-5 border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col sm:flex-row items-center justify-between gap-4 shrink-0">
                <div class="space-y-1 text-center sm:text-left">
                    <h4 class="text-xs sm:text-sm font-extrabold text-[#07153f] dark:text-white" x-text="activeSlides[currentSlide]?.title"></h4>
                    <p class="text-[11px] sm:text-xs text-slate-500 dark:text-slate-400 max-w-xl" x-text="activeSlides[currentSlide]?.caption"></p>
                </div>

                <!-- Dots Slider Indicators -->
                <div class="flex items-center gap-1.5" x-show="activeSlides.length > 1">
                    <template x-for="(slide, idx) in activeSlides" :key="idx">
                        <button type="button" 
                                @click="currentSlide = idx" 
                                :class="currentSlide === idx ? 'w-6 bg-[#fe6000]' : 'w-2 bg-slate-300 dark:bg-slate-700'" 
                                class="h-2 rounded-full transition-all duration-200"
                                :title="'Lompat ke slide ' + (idx + 1)">
                        </button>
                    </template>
                </div>

                <!-- WhatsApp Direct Order CTA from inside the modal -->
                <div class="shrink-0 w-full sm:w-auto text-center sm:text-right">
                    <a :href="activeUrl" 
                       target="_blank"
                       style="background-color: #fe6000 !important; color: #ffffff !important;"
                       class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-extrabold text-xs shadow-md shadow-orange-500/25 hover:brightness-110 transition-all">
                        <span style="color: #ffffff !important;">💬</span>
                        <span style="color: #ffffff !important; font-weight: 800;">Pesan & Tanya Sistem Ini (WA)</span>
                        <span style="color: #ffffff !important;">&rarr;</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 6: CONTACT & INTERACTIVE MODULAR PROJECT COST ESTIMATOR -->
<section id="kalkulator" class="py-16 sm:py-20 bg-[#f8faff] dark:bg-slate-950 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 scroll-mt-20 relative overflow-hidden"
         x-data="{
            // 1. Platform Type
            platform: 'company_profile',
            platformName: 'Website Company Profile / Lembaga',
            platformPrice: 2500000,
            
            // 2. Modular Addons
            addonWhatsapp: false,
            addonPayment: false,
            addonRoles: false,
            addonAI: false,
            
            // 3. Timeline
            timeline: 'standard',
            timelineName: 'Pengerjaan Reguler (14 - 30 Hari Kerja)',
            timelinePrice: 0,
            
            // Calculation State
            hasCalculated: false,
            isCalculating: false,
            calculatedTotal: 0,
            calculatedMin: 0,
            calculatedMax: 0,
            selectedAddonsSummary: [],
            
            setPlatform(id, name, price) {
                this.platform = id;
                this.platformName = name;
                this.platformPrice = price;
                this.hasCalculated = false;
            },
            
            setTimeline(id, name, price) {
                this.timeline = id;
                this.timelineName = name;
                this.timelinePrice = price;
                this.hasCalculated = false;
            },
            
            calculateEstimate() {
                this.isCalculating = true;
                
                setTimeout(() => {
                    let total = this.platformPrice + this.timelinePrice;
                    let addons = [];
                    
                    if (this.addonWhatsapp) { total += 850000; addons.push('Notifikasi Otomatis WhatsApp Gateway'); }
                    if (this.addonPayment) { total += 1000000; addons.push('Payment Gateway Otomatis (QRIS/VA)'); }
                    if (this.addonRoles) { total += 750000; addons.push('Multi-Role & Hak Akses User'); }
                    if (this.addonAI) { total += 1500000; addons.push('Integrasi AI Assistant / Chatbot'); }
                    
                    this.calculatedTotal = total;
                    this.calculatedMin = Math.round((total * 0.9) / 50000) * 50000;
                    this.calculatedMax = Math.round((total * 1.1) / 50000) * 50000;
                    this.selectedAddonsSummary = addons;
                    
                    this.isCalculating = false;
                    this.hasCalculated = true;
                }, 300);
            },
            
            formatRupiah(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            },
            
            getWhatsAppLink() {
                let text = 'Halo SmartVerse, saya ingin konsultasi estimasi proyek yang saya hitung di website:\n\n';
                text += '📌 Platform: ' + this.platformName + '\n';
                text += '⏱️ Waktu: ' + this.timelineName + '\n';
                text += '✨ Fasilitas Gratis: Free Domain, Hosting SSD, SSL Let\'s Encrypt, Desain Logo, Revisi Sepuasnya Sampai Sesuai Keinginan, & Responsif Semua Device\n';
                if (this.selectedAddonsSummary.length > 0) {
                    text += '⚡ Fitur Tambahan: ' + this.selectedAddonsSummary.join(', ') + '\n';
                }
                text += '\n💰 Perkiraan Investasi: Rp ' + this.formatRupiah(this.calculatedTotal) + ' (Kisaran: Rp ' + this.formatRupiah(this.calculatedMin) + ' - Rp ' + this.formatRupiah(this.calculatedMax) + ')\n\nMohon informasi jadwal diskusi dan penawaran resminya. Terima kasih!';
                return 'https://wa.me/6289695249089?text=' + encodeURIComponent(text);
            }
         }">
    
    <!-- Watermark "Estimator" -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-200/40 dark:text-slate-800/25 pointer-events-none select-none tracking-wider -z-0" aria-hidden="true">
        Estimator
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-8">
        
        <!-- Header -->
        <div class="text-center space-y-2.5 max-w-3xl mx-auto reveal-on-scroll">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 dark:bg-blue-950/80 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-400 dark:text-blue-400 text-xs font-extrabold uppercase tracking-wider">
                <span>🧮 SIMULASI ANGGARAN PROYEK</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#07153f] dark:text-white leading-tight">
                Kalkulator Estimasi Biaya Proyek Digital
            </h2>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                Pilih kebutuhan sistem informasi Anda. Klik tombol <strong>Hitung Estimasi Biaya</strong> untuk melihat estimasi anggaran transparan.
            </p>
        </div>

        <!-- Standard Inclusions Banner (Always Included Free) -->
        <div style="background-color: #07153f !important; color: #ffffff !important;"
             class="rounded-2xl p-4 sm:p-6 shadow-xl border border-slate-800 text-center max-w-4xl mx-auto space-y-3 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 text-xs font-bold text-amber-400 uppercase tracking-wider">
                <span>✨</span> <span>SEMUA PAKET SUDAH TERMASUK FASILITAS (FREE):</span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-xs font-semibold">
                <span class="px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 text-center">🌐 Free Domain 1 Tahun</span>
                <span class="px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 text-center">⚡ Free Cloud SSD Hosting</span>
                <span class="px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 text-center">🔒 Free SSL Let's Encrypt</span>
                <span class="px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 text-center">🎨 Free Desain Logo Sistem</span>
                <span class="px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 text-center">🔄 Revisi Sepuasnya</span>
                <span class="px-3 py-1.5 rounded-full bg-white/10 text-white border border-white/15 text-center">📱 Responsif Semua Device</span>
            </div>
        </div>


        <!-- Calculator Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left 7 Columns: Compact Options Selector -->
            <div class="lg:col-span-7 bg-white dark:bg-slate-900 p-6 sm:p-7 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl space-y-6 reveal-on-scroll">
                
                <!-- 1. Pilihan Solusi / Platform (6 Pilihan Populer) -->
                <div class="space-y-2.5">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-black uppercase tracking-wider text-[#07153f] dark:text-white flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 flex items-center justify-center text-[10px]">1</span>
                            <span>Pilih Solusi / Platform Digital:</span>
                        </label>
                        <span class="text-[10px] text-slate-500 dark:text-slate-400">Pilih salah satu</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                        
                        <button type="button" 
                                @click="setPlatform('company_profile', 'Website Company Profile / Lembaga', 2500000)"
                                :class="platform === 'company_profile' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold ring-2 ring-blue-500/30' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:border-blue-300'"
                                class="p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2">
                            <div>
                                <strong class="block text-xs text-[#07153f] dark:text-white">Web Company Profile</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Profil Usaha & Portofolio Lembaga</span>
                            </div>
                            <span class="text-lg">🏢</span>
                        </button>

                        <button type="button" 
                                @click="setPlatform('web_sekolah', 'Website Sekolah, Kampus & PPDB', 3000000)"
                                :class="platform === 'web_sekolah' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold ring-2 ring-blue-500/30' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:border-blue-300'"
                                class="p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2">
                            <div>
                                <strong class="block text-xs text-[#07153f] dark:text-white">Web Sekolah / PPDB</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Portal Edukasi & Pendaftaran Baru</span>
                            </div>
                            <span class="text-lg">🎓</span>
                        </button>

                        <button type="button" 
                                @click="setPlatform('ecommerce', 'Toko Online / Katalog Digital', 3500000)"
                                :class="platform === 'ecommerce' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold ring-2 ring-blue-500/30' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:border-blue-300'"
                                class="p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2">
                            <div>
                                <strong class="block text-xs text-[#07153f] dark:text-white">Toko Online / Katalog</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Produk, Keranjang & Checkout</span>
                            </div>
                            <span class="text-lg">🛍️</span>
                        </button>

                        <button type="button" 
                                @click="setPlatform('sim_desa', 'Sistem Informasi Digital (Surat, Akademik, Absensi)', 4500000)"
                                :class="platform === 'sim_desa' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold ring-2 ring-blue-500/30' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:border-blue-300'"
                                class="p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2">
                            <div>
                                <strong class="block text-xs text-[#07153f] dark:text-white">Sistem Informasi Digital</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Surat, Akademik, Absensi</span>
                            </div>
                            <span class="text-lg">⚙️</span>
                        </button>

                        <button type="button" 
                                @click="setPlatform('mobile_app', 'Aplikasi Mobile Android & iOS', 4500000)"
                                :class="platform === 'mobile_app' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold ring-2 ring-blue-500/30' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:border-blue-300'"
                                class="p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2">
                            <div>
                                <strong class="block text-xs text-[#07153f] dark:text-white">Mobile App (Flutter)</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Aplikasi Android & iOS Responsif</span>
                            </div>
                            <span class="text-lg">📱</span>
                        </button>

                        <button type="button" 
                                @click="setPlatform('custom_system', 'Sistem Kustom / E-Klinik EMR', 7500000)"
                                :class="platform === 'custom_system' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold ring-2 ring-blue-500/30' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200 hover:border-blue-300'"
                                class="p-3 rounded-2xl border text-left transition-all flex items-center justify-between gap-2">
                            <div>
                                <strong class="block text-xs text-[#07153f] dark:text-white">Sistem Kustom / E-Klinik</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Rekam Medis, ERP & Alur Khusus</span>
                            </div>
                            <span class="text-lg">🏥</span>
                        </button>

                    </div>
                </div>

                <!-- 2. Fitur Tambahan & Integrasi (Opsional - 4 Opsi Ringkas) -->
                <div class="space-y-2.5 pt-3 border-t border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-black uppercase tracking-wider text-[#07153f] dark:text-white flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 flex items-center justify-center text-[10px]">2</span>
                            <span>Fitur Tambahan (Opsional):</span>
                        </label>
                        <span class="text-[10px] text-slate-500 dark:text-slate-400">Sesuai kebutuhan</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                        
                        <label class="flex items-center gap-2.5 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 cursor-pointer hover:border-blue-400 transition-colors">
                            <input type="checkbox" x-model="addonWhatsapp" @change="hasCalculated = false" class="w-4 h-4 rounded text-orange-700 dark:text-orange-400 focus:ring-orange-400">
                            <div>
                                <strong class="text-xs text-[#07153f] dark:text-white block">WhatsApp Gateway</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Notifikasi WA otomatis transaksi</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-2.5 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 cursor-pointer hover:border-blue-400 transition-colors">
                            <input type="checkbox" x-model="addonPayment" @change="hasCalculated = false" class="w-4 h-4 rounded text-orange-700 dark:text-orange-400 focus:ring-orange-400">
                            <div>
                                <strong class="text-xs text-[#07153f] dark:text-white block">Payment Gateway</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">QRIS, Virtual Account & Transfer</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-2.5 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 cursor-pointer hover:border-blue-400 transition-colors">
                            <input type="checkbox" x-model="addonRoles" @change="hasCalculated = false" class="w-4 h-4 rounded text-orange-700 dark:text-orange-400 focus:ring-orange-400">
                            <div>
                                <strong class="text-xs text-[#07153f] dark:text-white block">Multi-Role & User</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Hak akses Admin, Operator, & User</span>
                            </div>
                        </label>

                        <label class="flex items-center gap-2.5 p-2.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 cursor-pointer hover:border-blue-400 transition-colors">
                            <input type="checkbox" x-model="addonAI" @change="hasCalculated = false" class="w-4 h-4 rounded text-orange-700 dark:text-orange-400 focus:ring-orange-400">
                            <div>
                                <strong class="text-xs text-[#07153f] dark:text-white block">Engine AI Chatbot</strong>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Smart AI Assistant tanya jawab SOP</span>
                            </div>
                        </label>

                    </div>
                </div>

                <!-- 3. Target Waktu Pengerjaan -->
                <div class="space-y-2 pt-3 border-t border-slate-100 dark:border-slate-800">
                    <label class="text-xs font-black uppercase tracking-wider text-[#07153f] dark:text-white flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 flex items-center justify-center text-[10px]">3</span>
                        <span>Target Waktu Pengerjaan:</span>
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                        <button type="button" 
                                @click="setTimeline('standard', 'Pengerjaan Reguler (14 - 30 Hari Kerja)', 0)"
                                :class="timeline === 'standard' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200'"
                                class="p-2.5 rounded-xl border text-left transition-all flex items-center justify-between">
                            <div>
                                <strong class="text-xs block text-[#07153f] dark:text-white">Pengerjaan Standar</strong>
                                <span class="text-[10px] text-slate-500">14 - 30 Hari Kerja</span>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950 px-2 py-0.5 rounded-full">Included</span>
                        </button>

                        <button type="button" 
                                @click="setTimeline('fast', 'Prioritas Express Kilat (7 - 14 Hari Kerja)', 1000000)"
                                :class="timeline === 'fast' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-blue-700 dark:text-blue-400 font-bold' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800/80 text-slate-700 dark:text-slate-200'"
                                class="p-2.5 rounded-xl border text-left transition-all flex items-center justify-between">
                            <div>
                                <strong class="text-xs block text-[#07153f] dark:text-white">Prioritas Express</strong>
                                <span class="text-[10px] text-slate-500">7 - 14 Hari Kerja</span>
                            </div>
                            <span class="text-[10px] font-bold text-amber-700 dark:text-amber-400 bg-amber-50 dark:bg-amber-950 px-2 py-0.5 rounded-full">+ Express</span>
                        </button>
                    </div>
                </div>

                <!-- Tombol Hitung Estimasi Biaya (TRIGGER UTAMA) -->
                <div class="pt-2">
                    <button type="button" 
                            @click="calculateEstimate()"
                            style="background-color: #fe6000 !important; color: #ffffff !important;"
                            class="w-full py-3.5 rounded-2xl font-black text-sm uppercase tracking-wider shadow-xl shadow-orange-500/25 hover:brightness-110 active:scale-98 transition-all flex items-center justify-center gap-2">
                        <span x-show="!isCalculating">📊</span>
                        <span x-show="isCalculating" class="inline-block animate-spin">⏳</span>
                        <span x-text="isCalculating ? 'Mengkalkulasi Estimasi...' : 'Hitung Estimasi Biaya Sekarang'" style="color: #ffffff !important; font-weight: 900;"></span>
                        <span x-show="!isCalculating" style="color: #ffffff !important;">&rarr;</span>
                    </button>
                </div>

            </div>

            <!-- Right 5 Columns: Result Display Box (Hidden Until Calculated!) -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- 1. State: Sebelum Ditekan (Panduan & Fasilitas Free) -->
                <div x-show="!hasCalculated" class="bg-white dark:bg-slate-900 p-6 sm:p-7 rounded-3xl border-2 border-dashed border-slate-300 dark:border-slate-700 text-center space-y-4">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-orange-50 dark:bg-orange-950/60 text-orange-700 dark:text-orange-400 flex items-center justify-center text-2xl font-black shadow-inner">
                        🧮
                    </div>
                    <div class="space-y-1.5">
                        <h3 class="text-base sm:text-lg font-black text-[#07153f] dark:text-white">
                            Estimasi Belum Dihitung
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed max-w-sm mx-auto font-medium">
                            Pilih solusi platform di sebelah kiri, kemudian tekan tombol <strong>"Hitung Estimasi Biaya Sekarang"</strong> untuk melihat rincian anggaran.
                        </p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 text-left space-y-2 text-xs">
                        <div class="font-bold text-[#07153f] dark:text-white flex items-center gap-1.5">
                            <span>✨</span> <span>Fasilitas Standar Sudah Termasuk:</span>
                        </div>
                        <ul class="space-y-1.5 text-slate-600 dark:text-slate-300 text-[11px]">
                            <li class="flex items-center gap-1.5 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-700 dark:text-slate-300">Free Domain Resmi & Hosting Cloud SSD 1 Thn</span></li>
                            <li class="flex items-center gap-1.5 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-700 dark:text-slate-300">Free SSL Certificate Let's Encrypt (HTTPS)</span></li>
                            <li class="flex items-center gap-1.5 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-700 dark:text-slate-300">Free Desain Logo & Identitas Visual Sistem</span></li>
                            <li class="flex items-center gap-1.5 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-700 dark:text-slate-300">Garansi Revisi Sepuasnya Sampai Sesuai Keinginan</span></li>
                            <li class="flex items-center gap-1.5 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">✓ <span class="text-slate-700 dark:text-slate-300">Desain Responsif Semua Device (Mobile & Web)</span></li>
                        </ul>
                    </div>
                </div>

                <!-- 2. State: Setelah Ditekan (Hasil Perhitungan Muncul!) -->
                <div x-show="hasCalculated" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-7 border-2 border-emerald-500 shadow-2xl space-y-5 relative overflow-hidden">
                    
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                        <span class="px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 dark:text-emerald-400 font-extrabold text-[10px] uppercase tracking-wider">
                            ✓ Hasil Estimasi Biaya
                        </span>
                        <button type="button" @click="hasCalculated = false" class="text-[11px] text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 underline">
                            Ubah Pilihan
                        </button>
                    </div>

                    <!-- Nominal Perkiraan Investasi -->
                    <div style="background-color: #07153f !important; color: #ffffff !important;" 
                         class="space-y-1.5 p-5 rounded-2xl text-white shadow-lg text-center sm:text-left">
                        <span class="text-[11px] font-bold text-slate-300 uppercase tracking-wider block">Perkiraan Nilai Investasi:</span>
                        <div class="text-3xl sm:text-4xl font-black mono text-emerald-400 flex items-baseline justify-center sm:justify-start gap-1">
                            <span class="text-sm font-bold text-slate-400">Rp</span>
                            <span x-text="formatRupiah(calculatedTotal)"></span>
                        </div>
                        <div class="text-[11px] text-slate-300 pt-1">
                            Kisaran Anggaran: <strong class="text-white">Rp <span x-text="formatRupiah(calculatedMin)"></span> - Rp <span x-text="formatRupiah(calculatedMax)"></span></strong>
                        </div>
                    </div>

                    <!-- Rincian Pilihan -->
                    <div class="space-y-2 text-xs">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 block">Rincian Spesifikasi Terpilih:</span>
                        <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 space-y-2 text-slate-700 dark:text-slate-200">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-1">
                                <span class="text-slate-500 dark:text-slate-400 shrink-0 text-[10px] sm:text-xs">Platform:</span>
                                <strong class="text-right text-[10px] sm:text-xs text-[#07153f] dark:text-white" x-text="platformName"></strong>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-1">
                                <span class="text-slate-500 dark:text-slate-400 shrink-0 text-[10px] sm:text-xs">Domain & Server SSD:</span>
                                <span class="text-right text-[10px] sm:text-xs font-bold text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">Included FREE (1 Tahun)</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-1">
                                <span class="text-slate-500 dark:text-slate-400 shrink-0 text-[10px] sm:text-xs">SSL Let's Encrypt:</span>
                                <span class="text-right text-[10px] sm:text-xs font-bold text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">Included FREE</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-1">
                                <span class="text-slate-500 dark:text-slate-400 shrink-0 text-[10px] sm:text-xs">Desain Logo & Revisi:</span>
                                <span class="text-right text-[10px] sm:text-xs font-bold text-emerald-700 dark:text-emerald-400 dark:text-emerald-400">Sepuasnya (FREE)</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-1">
                                <span class="text-slate-500 dark:text-slate-400 shrink-0 text-[10px] sm:text-xs">Timeline:</span>
                                <span class="text-right text-[10px] sm:text-xs text-[#07153f] dark:text-white" x-text="timelineName"></span>
                            </div>
                            <div x-show="selectedAddonsSummary.length > 0" class="pt-2 border-t border-slate-200/60 dark:border-slate-700 space-y-1">
                                <span class="text-slate-500 dark:text-slate-400 block">Fitur Tambahan:</span>
                                <div class="flex flex-wrap gap-1">
                                    <template x-for="item in selectedAddonsSummary" :key="item">
                                        <span class="px-2 py-0.5 rounded-md bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-[10px] font-semibold text-blue-700 dark:text-blue-400 dark:text-blue-400" x-text="item"></span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Direct WhatsApp Button With Pre-Filled Specification -->
                    <div class="pt-1">
                        <a :href="getWhatsAppLink()" 
                           target="_blank"
                           style="background-color: #10b981 !important; color: #ffffff !important;"
                           class="w-full py-3.5 rounded-2xl font-black text-xs uppercase tracking-wider shadow-lg shadow-emerald-500/25 hover:brightness-110 active:scale-98 transition-all flex items-center justify-center gap-2 text-center">
                            <span style="color: #ffffff !important; font-size: 1.1rem;">💬</span>
                            <span style="color: #ffffff !important; font-weight: 900;">Konsultasikan Hasil via WhatsApp</span>
                            <span style="color: #ffffff !important;">&rarr;</span>
                        </a>
                        <p class="text-[10px] text-center text-slate-500 dark:text-slate-400 pt-2">
                            *Estimasi ini bersifat fleksibel dan dapat dinegosiasikan sesuai batasan anggaran instansi Anda.
                        </p>
                    </div>

                </div>

                <!-- Contact Direct Quick Card -->
                <div class="p-5 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-2.5 text-xs">
                    <h4 class="font-extrabold text-sm text-[#07153f] dark:text-white flex items-center gap-2">
                        <span>🏢</span> <span>Kantor Operasional & Tim Teknis</span>
                    </h4>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-[11px]">
                        Ingin diskusi langsung atau presentasi sistem di kantor Anda? Tim kami siap hadir untuk konsultasi teknis dan demo aplikasi.
                    </p>
                    <div class="pt-0.5 font-mono font-bold text-slate-800 dark:text-slate-200">
                        📞 Hotline / WA: 0896 9524 9089
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- SECTION 7: PERFORMANCE / STATS COUNTER BAND -->
<section class="py-16 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Background Animated Graphic -->
    <div class="absolute -top-10 -right-10 w-48 h-48 bg-blue-100/50 dark:bg-blue-950/30 rounded-full blur-2xl pointer-events-none anim-logo-object" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center">
            
            <div class="p-4 sm:p-6 rounded-3xl bg-[#f8faff] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 shadow-sm space-y-1 hover:shadow-xl transition-shadow reveal-on-scroll delay-100">
                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-blue-700 dark:text-blue-400 dark:text-blue-400 mono">{{ $siteSettings['stats_clients'] ?? '150+' }}</div>
                <div class="text-[10px] sm:text-xs font-bold text-[#07153f] dark:text-slate-200">Happy Clients</div>
            </div>

            <div class="p-4 sm:p-6 rounded-3xl bg-[#f8faff] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 shadow-sm space-y-1 hover:shadow-xl transition-shadow reveal-on-scroll delay-150">
                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-blue-700 dark:text-blue-400 dark:text-blue-400 mono">{{ $siteSettings['stats_projects'] ?? '99+' }}</div>
                <div class="text-[10px] sm:text-xs font-bold text-[#07153f] dark:text-slate-200">Projects Done</div>
            </div>

            <div class="p-4 sm:p-6 rounded-3xl bg-[#f8faff] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 shadow-sm space-y-1 hover:shadow-xl transition-shadow reveal-on-scroll delay-200">
                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-blue-700 dark:text-blue-400 dark:text-blue-400 mono">{{ $siteSettings['stats_reviews'] ?? '85+' }}</div>
                <div class="text-[10px] sm:text-xs font-bold text-[#07153f] dark:text-slate-200">Top Reviews & Event</div>
            </div>

            <div class="p-4 sm:p-6 rounded-3xl bg-[#f8faff] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 shadow-sm space-y-1 hover:shadow-xl transition-shadow reveal-on-scroll delay-250">
                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-orange-700 dark:text-orange-400 mono">{{ $siteSettings['stats_experience'] ?? '10+' }}</div>
                <div class="text-[10px] sm:text-xs font-bold text-[#07153f] dark:text-slate-200">Years Experience</div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 8: CLIENT SECTION (Pure Text Names - No Logos, No Icons) -->
<section class="py-16 bg-[#f8faff] dark:bg-slate-950 overflow-hidden border-t border-slate-100 dark:border-slate-800 marquee-pause relative">
    
    <!-- Watermark "Client" -->
    <div class="absolute top-4 left-1/2 -translate-x-1/2 text-8xl font-black text-slate-100/60 dark:text-slate-800/30 pointer-events-none select-none tracking-wider -z-0" aria-hidden="true">
        Client
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 text-center relative z-10 reveal-on-scroll">
        
        <h2 class="text-3xl font-extrabold text-[#07153f] dark:text-white">Client & Partner Kami</h2>
        
        <p class="text-xs font-bold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mono">
            Dipercaya Oleh Instansi Pemerintah, Perguruan Tinggi & Perusahaan Mitra
        </p>

        <!-- Marquee Text List (Rich Multi-Client Marquee Track) -->
        <div class="space-y-4 pt-4">
            <!-- Row 1 (Track 1: Bergerak dari Kiri ke Kanan) -->
            <div class="relative w-full overflow-hidden marquee-mask">
                <div class="marquee-track marquee-ltr items-center gap-3 sm:gap-4">
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Kementerian Komunikasi dan Digital RI (Komdigi)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        New Zealand BodyTalk Alliance (Selandia Baru)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Universitas Sriwijaya (Unsri)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Politeknik Akamigas Palembang
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dinas Koperasi Kab. Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Master Your Muscles (Kuala Lumpur, Malaysia)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Pemerintah Desa Senuro Timur Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ikatan Guru Indonesia (IGI) Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        PT. Duta Solusi Rumput Palembang
                    </div>

                    <!-- Repeat for seamless loop -->
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Kementerian Komunikasi dan Digital RI (Komdigi)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        New Zealand BodyTalk Alliance (Selandia Baru)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Universitas Sriwijaya (Unsri)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Politeknik Akamigas Palembang
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dinas Koperasi Kab. Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Master Your Muscles (Kuala Lumpur, Malaysia)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Pemerintah Desa Senuro Timur Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ikatan Guru Indonesia (IGI) Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        PT. Duta Solusi Rumput Palembang
                    </div>
                </div>
            </div>

            <!-- Row 2 (Track 2: Bergerak dari Kanan ke Kiri) -->
            <div class="relative w-full overflow-hidden marquee-mask">
                <div class="marquee-track marquee-rtl items-center gap-3 sm:gap-4">
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan As-Salam Jayapura, Papua
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SIT Robbani Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dompet Sosial Robbani (DSRP)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Ishlahul Ummah Prabumulih
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Raudhatul Ulum
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan Pendidikan Islam Ash-Shaff
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ralenta Learning Center
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Koperasi Pegawai Robbani
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Penerbit Laya Aksara Jaya
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Portal Berita Kabar32.com
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Iin's Cake (Katalog Kuliner & UMKM)
                    </div>

                    <!-- Repeat for seamless loop -->
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan As-Salam Jayapura, Papua
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SIT Robbani Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dompet Sosial Robbani (DSRP)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Ishlahul Ummah Prabumulih
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Raudhatul Ulum
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan Pendidikan Islam Ash-Shaff
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ralenta Learning Center
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Koperasi Pegawai Robbani
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Penerbit Laya Aksara Jaya
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Portal Berita Kabar32.com
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Iin's Cake (Katalog Kuliner & UMKM)
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- SECTION 9: WORKSHOP & WEBINAR GALLERY (Exact File 2 Square Grid with Filtering) -->
<section class="py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden"
         x-data="{ 
            activeTab: 'all',
            items: [
                { 
                    id: 1, 
                    title: 'Insight Talks Bersama Komdigi RI & Media Indonesia', 
                    category: 'webinar', 
                    image: '/images/Insight-Talks-Komdigi.webp', 
                    tag: 'Webinar Nasional',
                    organizer: 'Komdigi RI & Media Indonesia'
                },
                { 
                    id: 2, 
                    title: 'The Era of Vibe Coding: AI Pembelajaran & Manajemen Informasi', 
                    category: 'pelatihan', 
                    image: '/images/631476506_1210308331315502_7735877304621369529_n.webp', 
                    tag: 'Pelatihan Dosen IT',
                    organizer: 'Politeknik Akamigas Palembang'
                },
                { 
                    id: 3, 
                    title: 'Lecturer Development Program: Pembuatan Aplikasi AI Tanpa Coding', 
                    category: 'pelatihan', 
                    image: '/images/626271180_17940187239113665_1282635413631214268_n.webp', 
                    tag: 'Pelatihan Dosen',
                    organizer: 'Politeknik Akamigas Palembang'
                },
                { 
                    id: 4, 
                    title: 'Pelatihan Coding & AI Tenaga Pendidik SD & SMP OKU Timur', 
                    category: 'pelatihan', 
                    image: '/images/545410148_1090108853335451_8582489098678183559_n.webp', 
                    tag: 'Pelatihan Guru',
                    organizer: 'Dinas Pendidikan OKU Timur'
                },
                { 
                    id: 5, 
                    title: 'Pelatihan Coding & AI Optimalisasi SDM SIT Robbani', 
                    category: 'pelatihan', 
                    image: '/images/561378805_1119891467023856_3474954454940095689_n.webp', 
                    tag: 'Pelatihan Guru',
                    organizer: 'SIT Robbani Ogan Ilir'
                },
                { 
                    id: 6, 
                    title: 'Workshop Online: Menciptakan Chatbot AI dengan Python', 
                    category: 'webinar', 
                    image: '/images/486603910_961047622908242_7404185485069841584_n.webp', 
                    tag: 'Workshop Online 32 JP',
                    organizer: 'IGI Kab. Ogan Ilir'
                },
                { 
                    id: 7, 
                    title: 'Online Training of Trainer: Coding for Kids IGI Ogan Ilir', 
                    category: 'webinar', 
                    image: '/images/485185738_958093913203613_4067422706425259653_n.webp', 
                    tag: 'Online Training 32 JP',
                    organizer: 'IGI Kab. Ogan Ilir'
                },
                { 
                    id: 8, 
                    title: 'Pelatihan Website & Aplikasi Administrasi Surat Desa Senuro Timur', 
                    category: 'pelatihan', 
                    image: '/images/495965916_995856726093998_1582227333173346053_n.webp', 
                    tag: 'Digitalisasi Desa',
                    organizer: 'Pemdes Senuro Timur'
                },
                { 
                    id: 9, 
                    title: 'Augmented Reality for Education: Pembuatan Media Pembelajaran AR', 
                    category: 'pelatihan', 
                    image: '/images/Flyer-AR-New-1-scaled.webp', 
                    tag: 'Workshop AR',
                    organizer: 'Ralenta Learning Center'
                },
                { 
                    id: 10, 
                    title: 'Pelatihan Coding for Kids: Belajar Koding Mudah & Menyenangkan', 
                    category: 'pelatihan', 
                    image: '/images/FlyerCoding-for-Kids2023-scaled.webp', 
                    tag: 'Coding for Kids',
                    organizer: 'Ralenta Learning Center'
                },
                { 
                    id: 11, 
                    title: 'Training for Trainer Coding for Kids Guru SIT Robbani', 
                    category: 'pelatihan', 
                    image: '/images/Flyer-Coding-for-Kids-3.webp', 
                    tag: 'ToT Guru Sekolah',
                    organizer: 'SIT Robbani Ogan Ilir'
                }
            ]
         }">
    
    <!-- Watermark Background -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-200/30 dark:text-slate-800/30 pointer-events-none select-none tracking-wider -z-0" aria-hidden="true">
        Gallery
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 relative z-10">
        
        <!-- Header Text (Centered Style matching File 2) -->
        <div class="text-center space-y-2 reveal-on-scroll">
            <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-blue-700 dark:text-blue-400 dark:text-blue-400">
                <span>—</span>
                <span>Berita & Dokumentasi Terbaru</span>
                <span>—</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white">
                Workshop dan Webinar Kami
            </h2>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 max-w-xl mx-auto font-medium">
                Dokumentasi kegiatan pelatihan teknologi, coding, workshop kecerdasan buatan (AI), dan seminar digital yang telah kami selenggarakan.
            </p>
        </div>

        <!-- Filter Tabs (ALL / PELATIHAN / WEBINAR) -->
        <div class="flex items-center justify-center gap-2 sm:gap-3 reveal-on-scroll delay-100">
            <button type="button"
                    @click="activeTab = 'all'"
                    :class="activeTab === 'all' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700'"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all">
                ALL
            </button>
            <button type="button"
                    @click="activeTab = 'pelatihan'"
                    :class="activeTab === 'pelatihan' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700'"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all">
                PELATIHAN
            </button>
            <button type="button"
                    @click="activeTab = 'webinar'"
                    :class="activeTab === 'webinar' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700'"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all">
                WEBINAR
            </button>
        </div>

        <!-- 3-Column Square Grid Layout (Exact File 2 Aspect-Ratio) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 pt-4">
            <template x-for="(item, idx) in items" :key="item.id">
                <div x-show="activeTab === 'all' || activeTab === item.category"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden border border-slate-200/80 dark:border-slate-700 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col reveal-on-scroll">
                    
                    <!-- Square Poster Box (1:1 Ratio) -->
                    <div class="aspect-square relative overflow-hidden bg-slate-900 flex items-center justify-center">
                        <img :src="item.image" 
                             :alt="item.title" 
                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" 
                             loading="lazy" />
                        
                        <!-- Top Category Badge Overlay -->
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 rounded-full bg-[#07153f]/90 backdrop-blur-md text-white font-bold text-[10px] shadow-sm tracking-wide"
                                  x-text="item.tag">
                            </span>
                        </div>
                    </div>

                    <!-- Caption & Details -->
                    <div class="p-4 space-y-1.5 flex-grow flex flex-col justify-between">
                        <h3 class="text-xs sm:text-sm font-bold text-[#07153f] dark:text-slate-100 line-clamp-2 group-hover:text-blue-700 dark:text-blue-400 dark:group-hover:text-blue-400 transition-colors"
                            x-text="item.title">
                        </h3>
                        <div class="pt-2 border-t border-slate-100 dark:border-slate-700 flex items-center justify-between text-[11px] font-semibold text-blue-700 dark:text-blue-400 dark:text-blue-400">
                            <span>SmartVerse (smartverse.id)</span>
                            <span class="text-xs">&rarr;</span>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Direct CTA to Trainer Page -->
        <div class="text-center pt-6 reveal-on-scroll">
            <a href="{{ route('trainer.index') }}" class="px-8 py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider shadow-lg hover:shadow-blue-600/30 transition-all inline-flex items-center gap-2">
                <span>Lihat Seluruh Galeri & Workshop</span> &rarr;
            </a>
        </div>

    </div>
</section>

<!-- SECTION 10: LET'S WORK TOGETHER (Ultra High-Contrast Solid Deep Navy Banner with Crystal Clear Text) -->
<section class="py-16 bg-[#f8faff] dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-[#07153f] dark:bg-[#060e24] p-8 sm:p-14 lg:p-16 text-center text-white space-y-6 shadow-2xl border-2 border-blue-600/40 relative overflow-hidden reveal-on-scroll">
            
            <div class="space-y-3 relative z-10">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-500/20 border border-blue-400/40 text-cyan-300 text-xs font-bold uppercase tracking-wider">
                    <span>⚡ Transformasi Digital Terpercaya</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight drop-shadow-md">
                    {{ $settings['cta_headline'] ?? $siteSettings['cta_headline'] ?? "Let's Work Together" }}
                </h2>
            </div>
            
            <p class="text-white text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl mx-auto font-medium drop-shadow-md opacity-100">
                {{ $settings['cta_description'] ?? $siteSettings['cta_description'] ?? 'Konsultasikan rencana implementasi 5 produk digital unggulan SmartVerse (SmartNews, SmartEdu, SmartFeed, SmartSDM, SmartSynth) atau perancangan custom software enterprise bersama tim teknologi kami.' }}
            </p>
            
            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 relative z-10">
                <a href="https://wa.me/6289695249089" target="_blank" 
                   style="background-color: #fe6000 !important; color: #ffffff !important;"
                   class="w-full sm:w-auto px-8 py-4 rounded-xl font-black text-xs sm:text-sm uppercase tracking-wider shadow-2xl shadow-orange-500/50 hover:brightness-110 active:scale-95 transition-all inline-flex items-center justify-center gap-2 border border-orange-400">
                    <span style="color: #ffffff !important;">💬 Hubungi Tim Kami (WhatsApp)</span> &rarr;
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-white hover:bg-slate-100 text-[#07153f] font-extrabold text-xs sm:text-sm uppercase tracking-wider shadow-lg hover:scale-105 active:scale-95 transition-all inline-flex items-center justify-center">
                    <span>Kalkulator Estimasi Biaya</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
