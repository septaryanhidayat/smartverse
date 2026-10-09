@extends('layouts.app')

@section('title', 'Curriculum Vitae (CV) - ' . $profile->full_name . ' | Software Architect & AI Specialist')

@section('content')
<div class="min-h-screen bg-[#f8faff] dark:bg-slate-950 text-slate-800 dark:text-slate-100 transition-colors duration-300 py-10 sm:py-16" 
     x-data="{
        projectFilter: 'all',
        lightboxOpen: false,
        lightboxImage: '',
        lightboxTitle: '',
        openLightbox(img, title) {
            this.lightboxImage = img;
            this.lightboxTitle = title;
            this.lightboxOpen = true;
        },
        copied: false,
        copyLink() {
            navigator.clipboard.writeText(window.location.href);
            this.copied = true;
            setTimeout(() => this.copied = false, 2500);
        }
     }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- ACTION BAR: PRINT, SHARE & VERIFICATION -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <div class="bg-white dark:bg-slate-900 p-4 sm:p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>
                <div>
                    <span class="text-xs font-bold text-[#07153f] dark:text-white block">Official Verified Executive Curriculum Vitae</span>
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">Terverifikasi langsung di server resmi SmartVerse (smartverse.id)</span>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2.5 w-full sm:w-auto justify-end">
                <!-- Cetak PDF (A4 Ready) -->
                <a href="{{ route('cv.print') }}" target="_blank" 
                   style="background-color: #3E5CE7 !important; color: #ffffff !important;"
                   class="px-5 py-2.5 rounded-xl font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-blue-500/30 transition-all inline-flex items-center gap-2">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span style="color: #ffffff !important;">Cetak / Simpan PDF (A4)</span>
                </a>

                <!-- Salin Tautan CV -->
                <button @click="copyLink()" 
                        class="px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-100 font-bold text-xs transition-all inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <span x-text="copied ? 'Tersalin! ✓' : 'Salin Tautan'">Salin Tautan</span>
                </button>

                <!-- WhatsApp Klien -->
                <a href="https://wa.me/6285267774878?text=Halo%20Pak%20Septa%20Ryan%20Hidayat,%20kami%20telah%20melihat%20Curriculum%20Vitae%20Anda%20di%20SmartVerse%20dan%20tertarik%20untuk%20berkolaborasi/mengundang%20narasumber." 
                   target="_blank" 
                   class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition-all inline-flex items-center gap-1.5">
                    <span>💬 Kontak WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- HEADER HERO: EXECUTIVE PROFILE BANNER -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <div class="bg-gradient-to-br from-[#07153f] via-[#0b1f54] to-[#1e3a8a] rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden border border-white/10">
            <!-- Background Watermark -->
            <div class="absolute -right-6 -bottom-6 text-7xl sm:text-9xl font-black text-white/[0.04] select-none pointer-events-none tracking-widest uppercase">
                CURRICULUM VITAE
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <!-- Avatar Profile -->
                <div class="lg:col-span-4 flex justify-center lg:justify-start">
                    <div class="relative group">
                        <div class="w-48 h-48 sm:w-56 sm:h-56 rounded-3xl overflow-hidden border-4 border-white/20 shadow-2xl bg-white/10 relative">
                            <img src="{{ asset($profile->avatar_path ?? 'images/smartverse/ryan-trainer-hero.webp') }}" 
                                 alt="{{ $profile->full_name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        </div>
                        <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-[#07153f] border border-cyan-400 text-cyan-300 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider whitespace-nowrap shadow-lg">
                            ★ Certified Architect &bull; AI Specialist
                        </div>
                    </div>
                </div>

                <!-- Profile Info & Contacts -->
                <div class="lg:col-span-8 space-y-4 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 text-[11px] font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                        <span>Official Professional Portfolio &amp; Resume</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-none">
                        {{ $profile->full_name }}
                    </h1>

                    <p class="text-base sm:text-lg text-cyan-200 font-bold">
                        {{ $profile->title }}
                    </p>

                    <p class="text-xs sm:text-sm text-slate-300 font-semibold tracking-wide">
                        {{ $profile->headline }}
                    </p>

                    <!-- Contact Details Grid -->
                    <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2.5 text-xs text-slate-200">
                        <a href="mailto:{{ $profile->email }}" class="p-2.5 rounded-xl bg-white/10 hover:bg-white/15 transition-colors flex items-center gap-2 border border-white/5">
                            <span class="text-cyan-300">✉️</span>
                            <span class="break-all font-medium text-xs">{{ $profile->email }}</span>
                        </a>

                        <a href="https://wa.me/6285267774878" target="_blank" class="p-2.5 rounded-xl bg-white/10 hover:bg-white/15 transition-colors flex items-center gap-2 border border-white/5">
                            <span class="text-emerald-400">📱</span>
                            <span class="font-medium text-xs">{{ $profile->phone }}</span>
                        </a>

                        <a href="https://{{ preg_replace('#^https?://#', '', $profile->website_1) }}" target="_blank" class="p-2.5 rounded-xl bg-white/10 hover:bg-white/15 transition-colors flex items-center gap-2 border border-white/5">
                            <span class="text-amber-400">🌐</span>
                            <span class="break-all font-medium text-xs">{{ $profile->website_1 }}</span>
                        </a>

                        <a href="https://{{ preg_replace('#^https?://#', '', $profile->website_2) }}" target="_blank" class="p-2.5 rounded-xl bg-white/10 hover:bg-white/15 transition-colors flex items-center gap-2 border border-white/5">
                            <span class="text-blue-300">🏢</span>
                            <span class="break-all font-medium text-xs">{{ $profile->website_2 }}</span>
                        </a>

                        <a href="https://{{ preg_replace('#^https?://#', '', $profile->github) }}" target="_blank" class="p-2.5 rounded-xl bg-white/10 hover:bg-white/15 transition-colors flex items-center gap-2 border border-white/5">
                            <span class="text-purple-300">🐙</span>
                            <span class="break-all font-medium font-mono text-[11px]">{{ $profile->github }}</span>
                        </a>

                        <div class="p-2.5 rounded-xl bg-white/10 flex items-center gap-2 border border-white/5">
                            <span class="text-rose-400">📍</span>
                            <span class="break-words font-medium text-xs">{{ $profile->city }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-8 pt-6 border-t border-white/10 text-center">
                <div>
                    <div class="text-2xl sm:text-3xl font-black text-amber-300 mono">{{ $profile->stats['years_exp'] ?? '8+' }}</div>
                    <div class="text-[11px] text-slate-300 uppercase font-semibold">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-black text-cyan-300 mono">{{ $profile->stats['events_count'] ?? '65+' }}</div>
                    <div class="text-[11px] text-slate-300 uppercase font-semibold">Event &amp; Workshop</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-black text-emerald-300 mono">{{ $profile->stats['alumni_count'] ?? '3,500+' }}</div>
                    <div class="text-[11px] text-slate-300 uppercase font-semibold">Alumni Peserta</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-black text-pink-300 mono">{{ $projects->count() }}+ Proyek</div>
                    <div class="text-[11px] text-slate-300 uppercase font-semibold">Karya Sistem Enterprise</div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 1: RINGKASAN PROFIL (ABOUT ME) -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <section class="bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-10 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#3E5CE7]">Ringkasan Profil (About Me)</span>
            </div>

            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                {{ $profile->about_me }}
            </p>
        </section>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 2: PROFESSIONAL AFFILIATION & LEADERSHIP -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <section class="space-y-6">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                <h2 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white uppercase tracking-tight">
                    Professional Affiliation &amp; Leadership
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($profile->affiliations ?? [] as $aff)
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-7 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all space-y-3 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/50 text-[#3E5CE7] dark:text-blue-400 text-xs font-bold">
                                    {{ $aff['role'] ?? '' }}
                                </span>
                                @if(!empty($aff['period']))
                                    <span class="text-[11px] font-mono text-slate-400 font-bold">{{ $aff['period'] }}</span>
                                @endif
                            </div>

                            <h3 class="text-base font-extrabold text-[#07153f] dark:text-white">
                                {{ $aff['organization'] ?? '' }}
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $aff['description'] ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 3: KEYNOTE SPEAKER & EXPERT TRAINING EXPERIENCE -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <section class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                    <h2 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white uppercase tracking-tight">
                        Keynote Speaker &amp; Expert Training Experience
                    </h2>
                </div>
                <span class="text-xs font-bold text-slate-400">{{ $speakers->count() }} Kegiatan Strategis</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($speakers as $spk)
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-7 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition-all flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-0.5 rounded-full bg-blue-50 dark:bg-blue-950 text-[#3E5CE7] dark:text-blue-400 text-[10px] font-bold uppercase">
                                    {{ $spk->category ?? 'Keynote / Workshop' }}
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-mono text-xs font-extrabold">
                                    {{ $spk->year }}
                                </span>
                            </div>

                            <h3 class="text-base font-extrabold text-[#07153f] dark:text-white leading-snug">
                                {{ $spk->title }}
                            </h3>

                            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 dark:text-slate-400 font-medium">
                                @if($spk->organizer)
                                    <span>🏛️ {{ $spk->organizer }}</span>
                                @endif
                                @if($spk->location)
                                    <span>📍 {{ $spk->location }}</span>
                                @endif
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $spk->description }}
                            </p>
                        </div>

                        <!-- Attachments Row (Flyer Lightbox & PDF Download) -->
                        <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex flex-wrap items-center justify-between gap-2">
                            <div class="flex items-center gap-2">
                                @if($spk->flyer_path)
                                    <button type="button" 
                                            @click="openLightbox('{{ asset($spk->flyer_path) }}', '{{ addslashes($spk->title) }}')"
                                            class="px-3 py-1.5 rounded-xl bg-amber-50 dark:bg-amber-950/40 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800 font-bold text-xs inline-flex items-center gap-1.5 hover:bg-amber-100 transition-colors">
                                        <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span>Lihat Flyer Kegiatan</span>
                                    </button>
                                @endif

                                @if($spk->pdf_path)
                                    <a href="{{ asset($spk->pdf_path) }}" target="_blank" 
                                       class="px-3 py-1.5 rounded-xl bg-rose-50 dark:bg-rose-950/40 text-rose-700 dark:text-rose-300 border border-rose-200 dark:border-rose-800 font-bold text-xs inline-flex items-center gap-1.5 hover:bg-rose-100 transition-colors">
                                        <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                        <span>Unduh PDF Lampiran</span>
                                    </a>
                                @endif
                            </div>

                            <span class="text-[11px] text-slate-400 font-medium">Rekam Jejak Resmi</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 4: SOFTWARE ENGINEERING & RELEVANT PROJECTS -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <section class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                    <h2 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white uppercase tracking-tight">
                        Software Engineering &amp; Relevant Projects
                    </h2>
                </div>

                <!-- Category Filter Buttons -->
                <div class="flex items-center gap-1.5 overflow-x-auto pb-1">
                    <button @click="projectFilter = 'all'" 
                            :class="projectFilter === 'all' ? 'bg-[#3E5CE7] text-white' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100'"
                            class="px-3 py-1.5 rounded-xl text-xs font-bold transition-colors whitespace-nowrap shadow-xs">
                        Semua Proyek ({{ $projects->count() }})
                    </button>
                    @foreach($projectCategories as $cat)
                        <button @click="projectFilter = '{{ $cat }}'" 
                                :class="projectFilter === '{{ $cat }}' ? 'bg-[#3E5CE7] text-white' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100'"
                                class="px-3 py-1.5 rounded-xl text-xs font-bold transition-colors whitespace-nowrap shadow-xs">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $prj)
                    <div x-show="projectFilter === 'all' || projectFilter === '{{ $prj->category }}'" 
                         x-transition
                         class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-2.5 py-0.5 rounded-full bg-cyan-50 dark:bg-cyan-950 text-cyan-700 dark:text-cyan-300 text-[10px] font-bold uppercase whitespace-normal">
                                    {{ $prj->category ?? 'Software' }}
                                </span>
                                <span class="text-xs font-mono font-bold text-slate-400">{{ $prj->year }}</span>
                            </div>

                            <h3 class="text-sm sm:text-base font-extrabold text-[#07153f] dark:text-white leading-snug">
                                {{ $prj->title }}
                            </h3>

                            @if($prj->organizer || $prj->location)
                                <div class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">
                                    {{ $prj->organizer ? '🏢 ' . $prj->organizer : '' }}
                                    {{ $prj->location ? ' • 📍 ' . $prj->location : '' }}
                                </div>
                            @endif

                            <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                                {{ $prj->description }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs">
                            @if($prj->url)
                                <a href="{{ $prj->url }}" target="_blank" class="text-blue-600 dark:text-blue-400 font-bold hover:underline inline-flex items-center gap-1">
                                    <span>Kunjungi Sistem</span> &rarr;
                                </a>
                            @else
                                <span class="text-slate-400 text-[11px]">Private Client / Enterprise</span>
                            @endif

                            @if($prj->flyer_path)
                                <button type="button" 
                                        @click="openLightbox('{{ asset($prj->flyer_path) }}', '{{ addslashes($prj->title) }}')"
                                        class="text-amber-600 dark:text-amber-400 font-bold hover:underline inline-flex items-center gap-1 text-[11px]">
                                    <span>📸 Screenshot</span>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 5: PROFESSIONAL CERTIFICATIONS & GLOBAL COMPETENCIES -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <section class="space-y-6">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                <h2 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white uppercase tracking-tight">
                    Professional Certifications &amp; Core Competencies
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($profile->certifications ?? [] as $cert)
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all space-y-3">
                        <div class="flex items-center justify-between gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 font-bold text-[10px]">
                                {{ $cert['issuer'] ?? 'Verified' }}
                            </span>
                            <span class="font-mono text-xs font-bold text-slate-400">{{ $cert['year'] ?? '' }}</span>
                        </div>

                        <h3 class="text-sm font-extrabold text-[#07153f] dark:text-white leading-snug">
                            {{ $cert['name'] ?? '' }}
                        </h3>

                        <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $cert['description'] ?? '' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 6: CORE TECHNICAL SKILLS -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <section class="bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-10 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                <h2 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white uppercase tracking-tight">
                    Core Technical Skills &amp; Stack
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($profile->skills ?? [] as $sk)
                    <div class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 space-y-3">
                        <h4 class="text-xs font-black uppercase text-[#07153f] dark:text-white tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#3E5CE7]"></span>
                            <span>{{ $sk['category'] ?? '' }}</span>
                        </h4>

                        <div class="flex flex-wrap gap-1.5">
                            @foreach($sk['items'] ?? [] as $item)
                                <span class="px-2.5 py-1 rounded-lg bg-white dark:bg-slate-900 text-[#07153f] dark:text-slate-200 border border-slate-200 dark:border-slate-700 text-xs font-semibold shadow-2xs">
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- SECTION 7: LAMPIRAN FLYER & DOKUMENTASI KEGIATAN (APPENDIX) -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        @if($activitiesWithFlyer->isNotEmpty())
            <section class="space-y-6">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                        <h2 class="text-xl sm:text-2xl font-black text-[#07153f] dark:text-white uppercase tracking-tight">
                            Lampiran Bukti Dokumentasi Kegiatan &amp; Flyer
                        </h2>
                    </div>
                    <span class="text-xs text-slate-400 font-bold">Klik gambar untuk memperbesar</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($activitiesWithFlyer as $flyerItem)
                        <div class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all cursor-pointer group flex flex-col justify-between"
                             @click="openLightbox('{{ asset($flyerItem->flyer_path) }}', '{{ addslashes($flyerItem->title) }}')">
                            <div class="aspect-4/3 overflow-hidden relative bg-slate-100 dark:bg-slate-800 border-b border-slate-100 dark:border-slate-800">
                                <img src="{{ asset($flyerItem->flyer_path) }}" alt="{{ $flyerItem->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3 text-white text-xs font-bold">
                                    <span>🔍 Klik untuk Perbesar</span>
                                </div>
                            </div>

                            <div class="p-4 space-y-1">
                                <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 uppercase block">{{ $flyerItem->organizer ?? 'Kegiatan' }} &bull; {{ $flyerItem->year }}</span>
                                <h4 class="text-xs font-extrabold text-[#07153f] dark:text-white leading-snug">{{ $flyerItem->title }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- BOTTOM CTA BAR -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <div class="bg-gradient-to-r from-[#2A45C8] to-[#1e3a8a] rounded-3xl p-8 sm:p-12 text-center text-white space-y-4 shadow-xl">
            <h3 class="text-2xl sm:text-3xl font-extrabold">Tertarik Berkolaborasi atau Mengundang Narasumber?</h3>
            <p class="text-blue-100 text-xs sm:text-sm max-w-xl mx-auto">
                Silakan diskusikan kebutuhan perancangan arsitektur software enterprise, workshop pemanfaatan AI, atau implementasi digitalisasi institusi Anda bersama kami.
            </p>
            <div class="pt-2 flex flex-wrap items-center justify-center gap-3">
                <a href="https://wa.me/6285267774878?text=Halo%20Pak%20Septa%20Ryan%20Hidayat,%20kami%20tertarik%20mengundang%20narasumber/bekerjasama." 
                   target="_blank" 
                   style="background: #ffffff !important; color: #3E5CE7 !important;"
                   class="px-8 py-3.5 rounded-xl font-extrabold text-xs uppercase shadow-lg transition-all hover:scale-105 inline-flex items-center gap-2">
                    <span style="color: #3E5CE7 !important;">Hubungi Septa Ryan Hidayat (WhatsApp) &rarr;</span>
                </a>
                <a href="{{ route('cv.print') }}" target="_blank" 
                   class="px-6 py-3.5 rounded-xl border border-white/30 hover:bg-white/10 text-white font-bold text-xs uppercase transition-all inline-flex items-center gap-2">
                    <span>📄 Cetak PDF Resmi</span>
                </a>
            </div>
        </div>

    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- LIGHTBOX MODAL FOR FLYERS / PHOTOS -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="lightboxOpen" 
         x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-8"
         @click="lightboxOpen = false">
        <div class="fixed inset-0 bg-black/85 backdrop-blur-sm"></div>

        <div class="relative max-w-4xl max-h-[90vh] bg-slate-900 rounded-3xl overflow-hidden shadow-2xl p-2 z-10" @click.stop>
            <div class="flex items-center justify-between p-3 border-b border-white/10 text-white">
                <span class="text-xs font-bold truncate max-w-md" x-text="lightboxTitle"></span>
                <button @click="lightboxOpen = false" class="p-1 rounded-lg text-slate-400 hover:text-white hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-2 flex items-center justify-center max-h-[80vh] overflow-auto">
                <img :src="lightboxImage" :alt="lightboxTitle" class="max-h-[75vh] w-auto object-contain rounded-xl shadow-lg" />
            </div>
        </div>
    </div>

</div>
@endsection
