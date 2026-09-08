@extends('layouts.app')

@section('title', 'Portofolio Proyek Digital - CV. Beranda Teknologi Digital')

@section('content')
<!-- SECTION 1: PORTOFOLIO HERO & 12-GRID SHOWCASE (4 Columns x 3 Rows with Interactive Modal Slider) -->
<section x-data="{
            modalOpen: false,
            activeTitle: '',
            activeClient: '',
            activeAppType: 'web',
            activeWaUrl: '',
            activeSlides: [],
            currentSlide: 0,
            openModal(title, client, appType, waUrl, slides) {
                this.activeTitle = title;
                this.activeClient = client;
                this.activeAppType = appType;
                this.activeWaUrl = waUrl;
                this.activeSlides = Array.isArray(slides) && slides.length > 0 ? slides : [{ url: '', caption: 'Tampilan Utama' }];
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
         class="py-16 sm:py-20 bg-[#f8faff] dark:bg-slate-950 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Watermark "Portofolio" Background -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-200/40 dark:text-slate-800/25 pointer-events-none select-none tracking-wider -z-0">
        Portofolio
    </div>

    <!-- Floating Decorative Shapes -->
    <div class="absolute top-28 right-16 text-[#fe6000]/40 text-5xl font-black pointer-events-none select-none anim-logo-top">~ ~ ~</div>
    <div class="absolute top-1/2 right-8 opacity-25 pointer-events-none anim-shape-rotate">
        <svg width="140" height="140" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="45" stroke="#E83E8C" stroke-width="2" stroke-dasharray="4 4"/>
        </svg>
    </div>
    <div class="absolute top-20 left-12 w-10 h-10 border-4 border-purple-200 rotate-12 rounded-lg pointer-events-none anim-logo-bottom"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Header -->
        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-[#3E5CE7] dark:text-blue-400 font-extrabold text-xs uppercase tracking-wider border border-blue-200/80 dark:border-blue-800/60">
                <span>💼 REKAM JEJAK DIGITAL</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white leading-tight">
                Galeri Portofolio & Sistem Unggulan
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                Jelajahi karya nyata kami dalam rancang bangun Website Enterprise, Portal Edukasi, Aplikasi Mobile Flutter, dan Sistem Manajemen Terpadu. <strong>Klik gambar pada portofolio</strong> untuk membuka simulasi galeri antarmuka layar aplikasi.
            </p>
        </div>

        <!-- Category Filters -->
        <div class="flex flex-wrap items-center justify-center gap-2">
            <a href="{{ route('projects.index') }}" 
               class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all {{ !request('category') ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700' }}">
                Semua Proyek
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('projects.index', ['category' => $cat->slug]) }}" 
                   class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request('category') === $cat->slug ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- 12 Projects Grid (4 Columns x 3 Rows - Matches Home Concept) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
            @forelse($projects as $index => $project)
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
                    $waProductUrl = "https://wa.me/6289695249089?text=" . urlencode("Halo CV. Beranda Teknologi Digital, saya tertarik konsultasi portofolio sistem: {$displayTitle}");
                @endphp

                <div class="bg-white dark:bg-slate-900 rounded-2xl sm:rounded-3xl overflow-hidden border border-slate-200/90 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                    
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
                        <div class="p-4 sm:p-5 space-y-3">
                            
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-extrabold text-[#07153f] dark:text-white group-hover:text-[#3E5CE7] dark:group-hover:text-blue-400 transition-colors leading-snug line-clamp-1" title="{{ $displayTitle }}">
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
                    <div class="p-4 sm:p-5 pt-0 space-y-2">
                        <div class="pt-2.5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                            <button type="button"
                                    @click="openModal('{{ addslashes($displayTitle) }}', '{{ addslashes($project->client_name) }}', '{{ $project->app_type ?? 'web' }}', '{{ $waProductUrl }}', {{ $slidesJson }})"
                                    class="text-[11.5px] font-bold text-[#3E5CE7] dark:text-blue-400 hover:underline flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6"/>
                                </svg>
                                <span>Preview</span>
                            </button>
                            
                            <a href="{{ route('projects.show', $project->slug) }}" 
                               style="background-color: #07153f !important; color: #ffffff !important;"
                               class="px-3.5 py-1.5 rounded-xl font-bold text-[11px] hover:brightness-125 active:scale-95 transition-all flex items-center gap-1 shadow-2xs">
                                <span style="color: #ffffff !important;">Detail</span>
                                <span style="color: #ffffff !important;">&rarr;</span>
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-16 text-slate-500 dark:text-slate-400 font-medium">
                    Belum ada portofolio dalam kategori ini.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pt-6">
            {{ $projects->links() }}
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

            <!-- Modal Viewer Container -->
            <div class="p-4 sm:p-8 bg-slate-100 dark:bg-slate-950/70 overflow-y-auto flex items-center justify-center min-h-[360px] sm:min-h-[480px] relative select-none">
                
                <!-- Left Nav Arrow Button -->
                <button type="button" 
                        @click="prevSlide()" 
                        x-show="activeSlides.length > 1"
                        class="absolute left-3 sm:left-6 z-20 w-10 h-10 rounded-full bg-white/90 dark:bg-slate-800/90 text-slate-800 dark:text-white shadow-xl hover:bg-[#3E5CE7] hover:text-white flex items-center justify-center text-lg font-black transition-all"
                        title="Foto Sebelumnya (Panah Kiri)">
                    ‹
                </button>

                <!-- Right Nav Arrow Button -->
                <button type="button" 
                        @click="nextSlide()" 
                        x-show="activeSlides.length > 1"
                        class="absolute right-3 sm:right-6 z-20 w-10 h-10 rounded-full bg-white/90 dark:bg-slate-800/90 text-slate-800 dark:text-white shadow-xl hover:bg-[#3E5CE7] hover:text-white flex items-center justify-center text-lg font-black transition-all"
                        title="Foto Berikutnya (Panah Kanan)">
                    ›
                </button>

                <!-- Screen Frame Display (Adaptive Web vs Mobile) -->
                <div class="w-full flex items-center justify-center">
                    
                    <!-- 1. Mobile Phone Mockup Frame -->
                    <template x-if="activeSlides[currentSlide]?.type === 'mobile'">
                        <div class="relative mx-auto w-[280px] sm:w-[320px] rounded-[36px] p-3 bg-slate-900 border-4 border-slate-800 shadow-2xl ring-1 ring-white/20">
                            <div class="w-20 h-4 bg-slate-800 rounded-full mx-auto mb-2"></div>
                            <div class="rounded-[24px] overflow-hidden aspect-[9/19] bg-slate-950 flex items-center justify-center">
                                <img :src="activeSlides[currentSlide]?.url" 
                                     :alt="activeSlides[currentSlide]?.caption" 
                                     class="w-full h-full object-cover object-top" />
                            </div>
                        </div>
                    </template>

                    <!-- 2. Desktop Web Browser Mockup Frame -->
                    <template x-if="activeSlides[currentSlide]?.type !== 'mobile'">
                        <div class="w-full max-w-4xl rounded-2xl overflow-hidden bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl ring-1 ring-black/10 dark:ring-white/10">
                            <!-- Mac Safari Window Bar -->
                            <div class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex items-center gap-2">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                </div>
                                <div class="mx-auto w-3/5 sm:w-1/2 bg-white dark:bg-slate-900 px-3 py-0.5 rounded-md text-[10px] text-slate-400 font-mono text-center truncate border border-slate-200 dark:border-slate-700">
                                    https://berandadigital.net/system-demo
                                </div>
                            </div>
                            <div class="aspect-video bg-slate-950 flex items-center justify-center overflow-hidden">
                                <img :src="activeSlides[currentSlide]?.url" 
                                     :alt="activeSlides[currentSlide]?.caption" 
                                     class="w-full h-full object-cover object-top" />
                            </div>
                        </div>
                    </template>

                </div>

            </div>

            <!-- Modal Footer Controls & CTA -->
            <div class="px-5 py-3.5 sm:px-7 sm:py-4 border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col sm:flex-row items-center justify-between gap-3 shrink-0">
                <div class="text-xs text-slate-600 dark:text-slate-300 font-semibold text-center sm:text-left">
                    <span class="text-slate-400 font-normal">Keterangan Layar:</span>
                    <strong x-text="activeSlides[currentSlide]?.caption" class="text-[#07153f] dark:text-white ml-1"></strong>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto justify-center">
                    <!-- Dots Slide Indicator -->
                    <div class="flex items-center gap-1.5 mr-2" x-show="activeSlides.length > 1">
                        <template x-for="(slide, sIndex) in activeSlides" :key="sIndex">
                            <button type="button" 
                                    @click="currentSlide = sIndex" 
                                    class="w-2.5 h-2.5 rounded-full transition-all"
                                    :class="currentSlide === sIndex ? 'bg-[#3E5CE7] w-6' : 'bg-slate-300 dark:bg-slate-700 hover:bg-slate-400'">
                            </button>
                        </template>
                    </div>

                    <!-- Instant WhatsApp Demo CTA Button -->
                    <a :href="activeWaUrl" 
                       target="_blank"
                       style="background-color: #fe6000 !important; color: #ffffff !important;"
                       class="px-5 py-2.5 rounded-xl font-bold text-xs uppercase shadow-md shadow-orange-500/25 hover:brightness-110 active:scale-95 transition-all inline-flex items-center gap-1.5">
                        <span style="color: #ffffff !important;">💬</span>
                        <span style="color: #ffffff !important;">Konsultasi Sistem Ini</span>
                        <span style="color: #ffffff !important;">&rarr;</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2: CLIENT SECTION (Marquee: 2-Row Opposite Motion) -->
<section class="py-16 bg-[#f8faff] dark:bg-slate-950 overflow-hidden border-t border-slate-200 dark:border-slate-800 marquee-pause relative">
    
    <div class="absolute top-4 left-1/2 -translate-x-1/2 text-8xl font-black text-slate-200/40 dark:text-slate-800/25 pointer-events-none select-none tracking-wider -z-0">
        Client
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 text-center relative z-10">
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
@endsection
