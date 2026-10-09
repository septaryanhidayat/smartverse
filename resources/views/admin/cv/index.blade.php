@extends('admin.layouts.app')

@section('title', 'Curriculum Vitae (CV) & Resume Eksekutif - Admin SmartVerse')

@section('content')
<div class="space-y-8" x-data="{
    activeTab: 'profile',
    activityModalOpen: false,
    activityModalMode: 'create', // 'create' or 'edit'
    activityFormAction: '{{ route('admin.cv.activity.store') }}',
    activityMethod: 'POST',
    activityData: {
        id: null,
        type: 'speaker',
        title: '',
        category: '',
        organizer: '',
        year: '{{ date('Y') }}',
        location: '',
        url: '',
        description: '',
        is_featured: true,
        show_in_print: true,
        order: 0,
        flyer_path: null,
        pdf_path: null
    },
    openCreateModal(type = 'speaker') {
        this.activityModalMode = 'create';
        this.activityFormAction = '{{ route('admin.cv.activity.store') }}';
        this.activityMethod = 'POST';
        this.activityData = {
            id: null,
            type: type,
            title: '',
            category: type === 'speaker' ? 'Keynote / Workshop' : 'Proprietary SaaS Ecosystem',
            organizer: '',
            year: '{{ date('Y') }}',
            location: '',
            url: '',
            description: '',
            is_featured: true,
            show_in_print: true,
            order: 0,
            flyer_path: null,
            pdf_path: null
        };
        this.activityModalOpen = true;
    },
    openEditModal(item) {
        this.activityModalMode = 'edit';
        this.activityFormAction = '/admin/cv/activities/' + item.id;
        this.activityMethod = 'POST'; // we'll use hidden @method('PUT')
        this.activityData = {
            id: item.id,
            type: item.type,
            title: item.title,
            category: item.category || '',
            organizer: item.organizer || '',
            year: item.year || '',
            location: item.location || '',
            url: item.url || '',
            description: item.description || '',
            is_featured: item.is_featured ? true : false,
            show_in_print: item.show_in_print ? true : false,
            order: item.order || 0,
            flyer_path: item.flyer_path,
            pdf_path: item.pdf_path
        };
        this.activityModalOpen = true;
    },
    copied: false,
    copyCvLink() {
        navigator.clipboard.writeText('{{ route('cv.show') }}');
        this.copied = true;
        setTimeout(() => this.copied = false, 2500);
    }
}">

    <!-- HERO HEADER: CV STATUS & QUICK ACTIONS -->
    <div class="bg-gradient-to-r from-[#071330] via-[#0b1f54] to-[#1e3a8a] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden border border-white/10">
        <!-- Background Accent Grid -->
        <div class="absolute -right-10 -bottom-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-400/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">
                <div class="relative group">
                    <img src="{{ asset($profile->avatar_path ?? 'images/smartverse/ryan-trainer-hero.webp') }}" 
                         alt="{{ $profile->full_name }}" 
                         class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl object-cover border-2 border-white/20 shadow-2xl bg-white/10" />
                    <span class="absolute -bottom-1.5 -right-1.5 bg-emerald-500 border-2 border-[#071330] text-[9px] font-black px-2 py-0.5 rounded-full text-white">
                        LIVE
                    </span>
                </div>
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded-full bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 font-bold text-[10px] tracking-wide uppercase">
                            Executive Resume Engine
                        </span>
                        <span class="text-xs text-white/50">&bull; Auto-Synchronized</span>
                    </div>
                    <h1 class="text-xl sm:text-2xl font-black text-white tracking-tight flex items-center gap-2">
                        {{ $profile->full_name }}
                    </h1>
                    <p class="text-xs sm:text-sm text-cyan-200 font-semibold leading-relaxed">
                        {{ $profile->title }}
                    </p>
                    <p class="text-[11px] text-slate-300 font-mono">
                        {{ $profile->email }} &bull; {{ $profile->phone }} &bull; {{ $profile->city }}
                    </p>
                </div>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex flex-wrap items-center gap-2.5 pt-2 lg:pt-0">
                <!-- Lihat CV Web -->
                <a href="{{ route('cv.show') }}" target="_blank" 
                   class="px-4 py-2.5 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-[#071330] font-extrabold text-xs shadow-lg transition-all inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.164 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <span>Lihat CV Web</span>
                </a>

                <!-- Cetak PDF -->
                <a href="{{ route('cv.print') }}" target="_blank" 
                   class="px-4 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-[#071330] font-extrabold text-xs shadow-lg transition-all inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>Cetak PDF (A4)</span>
                </a>

                <!-- Salin Link -->
                <button @click="copyCvLink()" 
                        class="px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs border border-white/15 transition-all inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <span x-text="copied ? 'Tersalin! ✓' : 'Salin Link'">Salin Link</span>
                </button>

                <!-- Kirim WA -->
                <a href="https://wa.me/?text=Halo,%20berikut%20adalah%20Curriculum%20Vitae%20(CV)%20resmi%20dan%20profil%20profesional%20Septa%20Ryan%20Hidayat%20(Software%20Architect%20%26%20AI%20Specialist):%20{{ urlencode(route('cv.show')) }}" 
                   target="_blank"
                   class="px-3.5 py-2.5 rounded-xl bg-emerald-500/80 hover:bg-emerald-500 text-white font-bold text-xs shadow-md transition-all inline-flex items-center gap-1.5">
                    <span>💬 Kirim ke Klien</span>
                </a>

                <!-- Reset ke Default -->
                <form action="{{ route('admin.cv.reset') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin me-reset data CV kembali ke data bawaan lengkap Septa Ryan Hidayat? Seluruh perubahan manual akan direset.');" class="inline">
                    @csrf
                    <button type="submit" title="Reset ke data awal" class="p-2.5 rounded-xl bg-white/5 hover:bg-rose-500/20 text-white/60 hover:text-rose-300 border border-white/10 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Metric Badges Row -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-6 pt-5 border-t border-white/10">
            <div class="bg-white/5 rounded-2xl p-3 border border-white/5 text-center">
                <span class="block text-lg font-black text-amber-300 mono">{{ $profile->stats['years_exp'] ?? '8+' }}</span>
                <span class="text-[10px] text-slate-300 uppercase font-semibold">Tahun Pengalaman</span>
            </div>
            <div class="bg-white/5 rounded-2xl p-3 border border-white/5 text-center">
                <span class="block text-lg font-black text-cyan-300 mono">{{ $speakerActivities->count() }} Kegiatan</span>
                <span class="text-[10px] text-slate-300 uppercase font-semibold">Keynote &amp; Workshop</span>
            </div>
            <div class="bg-white/5 rounded-2xl p-3 border border-white/5 text-center">
                <span class="block text-lg font-black text-emerald-300 mono">{{ $projectActivities->count() }} Proyek</span>
                <span class="text-[10px] text-slate-300 uppercase font-semibold">Karya &amp; Software</span>
            </div>
            <div class="bg-white/5 rounded-2xl p-3 border border-white/5 text-center">
                @php
                    $flyerCount = $speakerActivities->whereNotNull('flyer_path')->count() + $projectActivities->whereNotNull('flyer_path')->count();
                @endphp
                <span class="block text-lg font-black text-pink-300 mono">{{ $flyerCount }} Flyer / Bukti</span>
                <span class="text-[10px] text-slate-300 uppercase font-semibold">Lampiran Otomatis</span>
            </div>
        </div>
    </div>

    <!-- NAVIGATION TABS -->
    <div class="flex items-center gap-2 border-b border-slate-200 pb-2 overflow-x-auto">
        <button @click="activeTab = 'profile'" 
                :class="activeTab === 'profile' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100'"
                class="px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
            <span>👤</span>
            <span>Profil &amp; Kontak</span>
        </button>

        <button @click="activeTab = 'speakers'" 
                :class="activeTab === 'speakers' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100'"
                class="px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
            <span>🎙️</span>
            <span>Narasumber &amp; Pelatihan ({{ $speakerActivities->count() }})</span>
        </button>

        <button @click="activeTab = 'projects'" 
                :class="activeTab === 'projects' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100'"
                class="px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
            <span>💻</span>
            <span>Portofolio Proyek ({{ $projectActivities->count() }})</span>
        </button>

        <button @click="activeTab = 'affiliations'" 
                :class="activeTab === 'affiliations' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100'"
                class="px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
            <span>🎖️</span>
            <span>Afiliasi &amp; Sertifikasi</span>
        </button>

        <button @click="activeTab = 'flyers'" 
                :class="activeTab === 'flyers' ? 'bg-[#3E5CE7] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100'"
                class="px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap">
            <span>📎</span>
            <span>Galeri Flyer &amp; Lampiran Bukti</span>
        </button>
    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- TAB 1: PROFIL & KONTAK UTAMA -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="activeTab === 'profile'" x-cloak class="space-y-6">
        <form action="{{ route('admin.cv.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                            <span>👤</span>
                            <span>Identitas &amp; Kontak Utama CV</span>
                        </h2>
                        <p class="text-xs text-slate-400">Informasi ini tercetak otomatis di header CV web dan lembar PDF.</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[10px]">Header CV</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                    <!-- Foto Profil Upload -->
                    <div class="md:col-span-4 space-y-3">
                        <label class="block text-xs font-bold text-[#071330]">Foto Profil Resmi (Avatar / Jas)</label>
                        <div class="p-4 rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 flex flex-col items-center text-center space-y-3">
                            <img src="{{ asset($profile->avatar_path ?? 'images/smartverse/ryan-trainer-hero.webp') }}" 
                                 alt="Avatar" 
                                 class="w-32 h-32 rounded-2xl object-cover shadow-md border-2 border-white bg-slate-200" />
                            <div class="w-full">
                                <input type="file" name="avatar_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#3E5CE7] file:text-white hover:file:bg-blue-700 cursor-pointer" />
                                <span class="text-[10px] text-slate-400 block mt-1">Format: JPG, PNG, WebP (Maks 10MB). Otomatis dioptimasi.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Isian Identitas -->
                    <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2 space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Nama Lengkap Resmi *</label>
                            <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-extrabold text-[#071330] focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Jabatan / Gelar Profesional *</label>
                            <input type="text" name="title" value="{{ old('title', $profile->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Headline / Peran Kunci *</label>
                            <input type="text" name="headline" value="{{ old('headline', $profile->headline) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Email Resmi *</label>
                            <input type="email" name="email" value="{{ old('email', $profile->email) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Nomor HP / WhatsApp *</label>
                            <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-mono" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Website Utama (SmartVerse)</label>
                            <input type="text" name="website_1" value="{{ old('website_1', $profile->website_1) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Website Perusahaan (BTD)</label>
                            <input type="text" name="website_2" value="{{ old('website_2', $profile->website_2) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">GitHub Repository</label>
                            <input type="text" name="github" value="{{ old('github', $profile->github) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-mono" />
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Sosial Media / Instagram</label>
                            <input type="text" name="social" value="{{ old('social', $profile->social) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <div class="sm:col-span-2 space-y-1">
                            <label class="block text-xs font-bold text-[#071330]">Domisili / Kota</label>
                            <input type="text" name="city" value="{{ old('city', $profile->city) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>
                    </div>
                </div>

                <!-- RINGKASAN PROFIL (ABOUT ME) -->
                <div class="space-y-2 pt-4 border-t border-slate-100">
                    <label class="block text-xs font-bold text-[#071330]">Ringkasan Profil (Executive Summary / About Me) *</label>
                    <textarea name="about_me" rows="5" class="w-full px-4 py-3 rounded-2xl border border-slate-200 text-xs leading-relaxed focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none text-slate-700 font-medium">{{ old('about_me', $profile->about_me) }}</textarea>
                    <span class="text-[11px] text-slate-400">Ringkasan kredibilitas, keahlian khusus AI, kepemimpinan produk, dan institusi yang pernah bermitra.</span>
                </div>
            </div>

            <!-- KEAHLIAN TEKNIS (CORE TECHNICAL SKILLS) -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                            <span>⚡</span>
                            <span>Keahlian Teknis Utama (Core Technical Skills)</span>
                        </h2>
                        <p class="text-xs text-slate-400">Pisahkan masing-masing teknologi/keahlian dengan tanda koma (,).</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">Skill Badges</span>
                </div>

                <div class="space-y-4">
                    @php
                        $skillsData = $profile->skills ?? [];
                    @endphp

                    @foreach([
                        ['key' => 0, 'default_cat' => 'AI & Emerging Tech', 'default_items' => 'Python, Prompt Engineering, Retrieval-Augmented Generation (RAG), AI Forensics (C2PA 2.4, 2D FFT, ELA), Virtual Reality (VR), Augmented Reality (AR)'],
                        ['key' => 1, 'default_cat' => 'Software Architecture & Web', 'default_items' => 'Laravel 13, PHP 8.4, RESTful API, Multi-Tenancy Architecture, JavaScript (ES6+), Tailwind CSS, Alpine.js, MySQL, SQLite, WordPress, Git/GitHub'],
                        ['key' => 2, 'default_cat' => 'Mobile Development', 'default_items' => 'React Native (Expo SDK 52), Flutter, Android Studio, Biometric Liveness, Haversine Geofencing']
                    ] as $i => $sDef)
                        @php
                            $catVal = $skillsData[$i]['category'] ?? $sDef['default_cat'];
                            $itemsVal = isset($skillsData[$i]['items']) && is_array($skillsData[$i]['items'])
                                ? implode(', ', $skillsData[$i]['items'])
                                : $sDef['default_items'];
                        @endphp
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                            <div class="md:col-span-4">
                                <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Kategori Skill #{{ $i + 1 }}</label>
                                <input type="text" name="skills[{{ $i }}][category]" value="{{ $catVal }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-bold text-[#071330] bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                            </div>
                            <div class="md:col-span-8">
                                <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Daftar Keahlian (Pisahkan dengan koma)</label>
                                <input type="text" name="skills[{{ $i }}][items_raw]" value="{{ $itemsVal }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- PENGATURAN CETAK PDF & WATERMARK -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                            <span>🖨️</span>
                            <span>Pengaturan Dokumen Cetak PDF (A4 Ready)</span>
                        </h2>
                        <p class="text-xs text-slate-400">Atur elemen yang disertakan saat CV dicetak atau diekspor ke PDF untuk klien.</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-purple-50 text-purple-700 font-bold text-[10px]">Print Engine</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="flex items-start gap-3 p-4 rounded-2xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition-colors">
                        <input type="checkbox" name="print_config[show_flyers_appendix]" value="1" {{ ($profile->print_config['show_flyers_appendix'] ?? true) ? 'checked' : '' }} class="mt-0.5 rounded text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <div>
                            <span class="block text-xs font-bold text-[#071330]">Sertakan Lembar Lampiran Flyer Kegiatan</span>
                            <span class="text-[11px] text-slate-500">Mencetak flyer/foto bukti kegiatan di halaman lampiran belakang PDF secara otomatis.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-4 rounded-2xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition-colors">
                        <input type="checkbox" name="print_config[show_contact_qr]" value="1" {{ ($profile->print_config['show_contact_qr'] ?? true) ? 'checked' : '' }} class="mt-0.5 rounded text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <div>
                            <span class="block text-xs font-bold text-[#071330]">Tampilkan QR Code Verifikasi Live</span>
                            <span class="text-[11px] text-slate-500">Menampilkan barcode QR di lembar cetak agar klien dapat memverifikasi keaslian via smartphone.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-4 rounded-2xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition-colors">
                        <input type="checkbox" name="print_config[show_certifications]" value="1" {{ ($profile->print_config['show_certifications'] ?? true) ? 'checked' : '' }} class="mt-0.5 rounded text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <div>
                            <span class="block text-xs font-bold text-[#071330]">Tampilkan Bagian Sertifikasi Internasional</span>
                            <span class="text-[11px] text-slate-500">Menampilkan sertifikasi Microsoft, Google, AWS, Red Hat, dan Cybersecurity.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-4 rounded-2xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition-colors">
                        <input type="checkbox" name="print_config[show_projects]" value="1" {{ ($profile->print_config['show_projects'] ?? true) ? 'checked' : '' }} class="mt-0.5 rounded text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <div>
                            <span class="block text-xs font-bold text-[#071330]">Tampilkan Portofolio Software Engineering</span>
                            <span class="text-[11px] text-slate-500">Mencetak rekam jejak karya sistem internasional, edtech, dan ekosistem SaaS SmartVerse.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-xl transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Pembaruan Profil &amp; Pengaturan</span>
                </button>
            </div>
        </form>
    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- TAB 2: PENGALAMAN PEMBICARA & PELATIHAN (KEYNOTE & WORKSHOP) -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="activeTab === 'speakers'" x-cloak class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-extrabold text-[#071330] flex items-center gap-2">
                    <span>🎙️</span>
                    <span>Keynote Speaker, Narasumber Ahli &amp; Workshop</span>
                </h2>
                <p class="text-xs text-slate-400">Daftar rekam jejak seminar, pelatihan kementerian, kampus, dan corporate training.</p>
            </div>
            <button @click="openCreateModal('speaker')" 
                    class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all inline-flex items-center gap-2 self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah Kegiatan Speaker Baru</span>
            </button>
        </div>

        <!-- Speaker Cards List -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($speakerActivities as $activity)
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 font-extrabold text-[10px] uppercase">
                                {{ $activity->category ?? 'Workshop & Keynote' }}
                            </span>
                            <div class="flex items-center gap-1.5 font-mono text-xs font-bold text-slate-500">
                                <span>📅 {{ $activity->year }}</span>
                                @if($activity->show_in_print)
                                    <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-600 text-[9px] font-bold" title="Tercetak di PDF">PDF ✓</span>
                                @endif
                            </div>
                        </div>

                        <h3 class="text-sm font-extrabold text-[#071330] leading-snug">
                            {{ $activity->title }}
                        </h3>

                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-slate-500 font-medium">
                            @if($activity->organizer)
                                <span>🏛️ {{ $activity->organizer }}</span>
                            @endif
                            @if($activity->location)
                                <span>📍 {{ $activity->location }}</span>
                            @endif
                        </div>

                        <p class="text-xs text-slate-600 leading-relaxed">
                            {{ $activity->description }}
                        </p>

                        <!-- Attached Flyer / PDF Indicators -->
                        <div class="pt-2 flex flex-wrap items-center gap-2 border-t border-slate-100">
                            @if($activity->flyer_path)
                                <a href="{{ asset($activity->flyer_path) }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-700 border border-amber-200 font-bold text-[10px] inline-flex items-center gap-1.5 hover:bg-amber-100 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Flyer / Foto Terlampir ✓</span>
                                </a>
                            @else
                                <span class="px-2 py-0.5 rounded text-slate-400 text-[10px]">Tanpa Flyer</span>
                            @endif

                            @if($activity->pdf_path)
                                <a href="{{ asset($activity->pdf_path) }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-rose-50 text-rose-700 border border-rose-200 font-bold text-[10px] inline-flex items-center gap-1.5 hover:bg-rose-100 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    <span>Dokumen PDF Terlampir ✓</span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                        <button @click="openEditModal({{ json_encode($activity) }})" 
                                class="text-xs font-bold text-[#3E5CE7] hover:underline inline-flex items-center gap-1">
                            <span>✏️ Edit &amp; Lampiran</span>
                        </button>

                        <form action="{{ route('admin.cv.activity.destroy', $activity->id) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini dari CV?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-bold text-rose-500 hover:text-rose-700 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-slate-400 text-xs">
                    Belum ada data kegiatan narasumber. Klik tombol "+ Tambah Kegiatan Speaker Baru" untuk menambahkan.
                </div>
            @endforelse
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- TAB 3: PORTOFOLIO PROYEK & SOFTWARE ENGINEERING -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="activeTab === 'projects'" x-cloak class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-extrabold text-[#071330] flex items-center gap-2">
                    <span>💻</span>
                    <span>Portofolio Proyek &amp; Software Engineering</span>
                </h2>
                <p class="text-xs text-slate-400">Rekam jejak sistem skala global, kesehatan, edtech, portal institusi, dan produk SaaS SmartVerse.</p>
            </div>
            <button @click="openCreateModal('project')" 
                    class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all inline-flex items-center gap-2 self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah Proyek Baru</span>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($projectActivities as $project)
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between gap-2">
                            <span class="px-2.5 py-0.5 rounded-full bg-cyan-50 text-cyan-800 font-extrabold text-[10px] uppercase">
                                {{ $project->category ?? 'Software Project' }}
                            </span>
                            <div class="flex items-center gap-1.5 font-mono text-xs font-bold text-slate-500">
                                <span>{{ $project->year }}</span>
                                @if($project->show_in_print)
                                    <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-600 text-[9px] font-bold" title="Tercetak di PDF">PDF ✓</span>
                                @endif
                            </div>
                        </div>

                        <h3 class="text-sm font-extrabold text-[#071330] leading-snug">
                            {{ $project->title }}
                        </h3>

                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-slate-500 font-medium">
                            @if($project->organizer)
                                <span>🏢 {{ $project->organizer }}</span>
                            @endif
                            @if($project->location)
                                <span>📍 {{ $project->location }}</span>
                            @endif
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank" class="text-blue-600 hover:underline font-mono text-[10px]">
                                    🔗 {{ preg_replace('#^https?://#', '', $project->url) }}
                                </a>
                            @endif
                        </div>

                        <p class="text-xs text-slate-600 leading-relaxed">
                            {{ $project->description }}
                        </p>

                        <!-- Attached Thumbnail / PDF Indicators -->
                        <div class="pt-2 flex flex-wrap items-center gap-2 border-t border-slate-100">
                            @if($project->flyer_path)
                                <a href="{{ asset($project->flyer_path) }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-700 border border-amber-200 font-bold text-[10px] inline-flex items-center gap-1.5 hover:bg-amber-100 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>Gambar / Mockup Terlampir ✓</span>
                                </a>
                            @endif

                            @if($project->pdf_path)
                                <a href="{{ asset($project->pdf_path) }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-rose-50 text-rose-700 border border-rose-200 font-bold text-[10px] inline-flex items-center gap-1.5 hover:bg-rose-100 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    <span>Dokumen Spek PDF Terlampir ✓</span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                        <button @click="openEditModal({{ json_encode($project) }})" 
                                class="text-xs font-bold text-[#3E5CE7] hover:underline inline-flex items-center gap-1">
                            <span>✏️ Edit &amp; Lampiran</span>
                        </button>

                        <form action="{{ route('admin.cv.activity.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Hapus proyek ini dari CV?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-bold text-rose-500 hover:text-rose-700 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-slate-400 text-xs">
                    Belum ada data portofolio proyek. Klik tombol "+ Tambah Proyek Baru" untuk menambahkan.
                </div>
            @endforelse
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- TAB 4: AFILIASI & SERTIFIKASI PROFESIONAL -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="activeTab === 'affiliations'" x-cloak class="space-y-6">
        <form action="{{ route('admin.cv.profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Preserve basic profile fields -->
            <input type="hidden" name="full_name" value="{{ $profile->full_name }}" />
            <input type="hidden" name="title" value="{{ $profile->title }}" />
            <input type="hidden" name="email" value="{{ $profile->email }}" />
            <input type="hidden" name="phone" value="{{ $profile->phone }}" />

            <!-- AFILIASI KEPEMIMPINAN -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                            <span>🏛️</span>
                            <span>Professional Affiliation &amp; Leadership</span>
                        </h2>
                        <p class="text-xs text-slate-400">Posisi kepemimpinan perusahaan, organisasi profesi, dan yayasan.</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 font-bold text-[10px]">Leadership</span>
                </div>

                <div class="space-y-4">
                    @foreach($profile->affiliations ?? [] as $idx => $aff)
                        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Peran / Jabatan</label>
                                    <input type="text" name="affiliations[{{ $idx }}][role]" value="{{ $aff['role'] ?? '' }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-bold text-[#071330] bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Organisasi / Institusi</label>
                                    <input type="text" name="affiliations[{{ $idx }}][organization]" value="{{ $aff['organization'] ?? '' }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-bold text-[#071330] bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Periode</label>
                                    <input type="text" name="affiliations[{{ $idx }}][period]" value="{{ $aff['period'] ?? '' }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Uraian Tanggung Jawab &amp; Dampak</label>
                                <textarea name="affiliations[{{ $idx }}][description]" rows="2" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7] leading-relaxed">{{ $aff['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- SERTIFIKASI PROFESIONAL -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                            <span>📜</span>
                            <span>Professional Certifications &amp; Core Competencies</span>
                        </h2>
                        <p class="text-xs text-slate-400">Lisensi sertifikasi global (Microsoft, Google Cloud, Red Hat, AWS, Flutter, Cybersecurity).</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">Global Credentials</span>
                </div>

                <div class="space-y-4">
                    @foreach($profile->certifications ?? [] as $cIdx => $cert)
                        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3">
                                <div class="sm:col-span-6">
                                    <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Nama Sertifikasi *</label>
                                    <input type="text" name="certifications[{{ $cIdx }}][name]" value="{{ $cert['name'] ?? '' }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-bold text-[#071330] bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                                </div>
                                <div class="sm:col-span-4">
                                    <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Lembaga Penerbit (Issuer)</label>
                                    <input type="text" name="certifications[{{ $cIdx }}][issuer]" value="{{ $cert['issuer'] ?? '' }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Tahun</label>
                                    <input type="text" name="certifications[{{ $cIdx }}][year]" value="{{ $cert['year'] ?? '' }}" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7]" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-[#071330] uppercase mb-1">Deskripsi Kompetensi</label>
                                <textarea name="certifications[{{ $cIdx }}][description]" rows="2" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-[#3E5CE7] leading-relaxed">{{ $cert['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-xl transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Perubahan Afiliasi &amp; Sertifikasi</span>
                </button>
            </div>
        </form>
    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- TAB 5: GALERI FLYER & LAMPIRAN BUKTI OTOMATIS -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="activeTab === 'flyers'" x-cloak class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-extrabold text-[#071330] flex items-center gap-2">
                    <span>📎</span>
                    <span>Galeri Flyer, Sertifikat &amp; Bukti Kegiatan Otomatis</span>
                </h2>
                <p class="text-xs text-slate-400">Seluruh dokumen bukti atau flyer yang diupload di kegiatan otomatis terorganisir di sini dan siap dilampirkan ke cetak PDF.</p>
            </div>
            <a href="{{ route('cv.print') }}" target="_blank" 
               class="px-5 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-[#071330] font-bold text-xs uppercase shadow-md transition-all inline-flex items-center gap-2 self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                <span>Pratinjau Lembar Lampiran Cetak (PDF)</span>
            </a>
        </div>

        @php
            $attachedActivities = $speakerActivities->merge($projectActivities)->filter(fn($a) => !empty($a->flyer_path) || !empty($a->pdf_path));
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($attachedActivities as $item)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm flex flex-col justify-between group">
                    <div class="aspect-4/3 overflow-hidden relative bg-slate-100 border-b border-slate-100 flex items-center justify-center">
                        @if($item->flyer_path)
                            <img src="{{ asset($item->flyer_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        @else
                            <div class="text-center p-4">
                                <svg class="w-12 h-12 text-rose-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span class="text-[10px] font-bold text-slate-500 uppercase mt-2 block">Dokumen PDF Terlampir</span>
                            </div>
                        @endif

                        <div class="absolute top-2 left-2">
                            <span class="px-2 py-0.5 rounded-full bg-[#071330]/85 text-white text-[9px] font-bold backdrop-blur-xs">
                                {{ $item->type === 'speaker' ? '🎙️ Keynote' : '💻 Proyek' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-4 space-y-1.5">
                        <div class="text-[10px] text-slate-400 font-bold uppercase">{{ $item->organizer ?? 'Kegiatan' }} &bull; {{ $item->year }}</div>
                        <h4 class="font-extrabold text-xs text-[#071330] line-clamp-2 leading-snug">{{ $item->title }}</h4>
                    </div>

                    <div class="p-4 pt-0 flex items-center justify-between border-t border-slate-100 text-xs gap-2">
                        @if($item->flyer_path)
                            <a href="{{ asset($item->flyer_path) }}" target="_blank" class="text-blue-600 font-bold text-[11px] hover:underline">
                                Buka Flyer ↗
                            </a>
                        @endif
                        @if($item->pdf_path)
                            <a href="{{ asset($item->pdf_path) }}" target="_blank" class="text-rose-600 font-bold text-[11px] hover:underline">
                                Unduh PDF ↗
                            </a>
                        @endif
                        <button @click="openEditModal({{ json_encode($item) }})" class="text-slate-500 hover:text-slate-800 text-[11px] font-bold ml-auto">
                            Ganti File
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200">
                    <div class="text-3xl mb-2">📎</div>
                    <h3 class="text-sm font-bold text-slate-700">Belum ada flyer atau dokumen PDF yang diupload</h3>
                    <p class="text-xs text-slate-400 mt-1 max-w-md mx-auto">
                        Saat Anda menambahkan atau mengedit kegiatan di tab "Narasumber &amp; Pelatihan" atau "Portofolio Proyek", Anda bisa mengunggah file gambar flyer, foto kegiatan, atau dokumen PDF lampiran.
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════════════ -->
    <!-- MODAL FORM: TAMBAH & EDIT KEGIATAN / PROYEK / FLYER -->
    <!-- ══════════════════════════════════════════════════════════════ -->
    <div x-show="activityModalOpen" 
         x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto"
         role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs transition-opacity" 
             @click="activityModalOpen = false"></div>

        <!-- Modal Dialog -->
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full p-6 sm:p-8 space-y-6 z-10 max-h-[90vh] overflow-y-auto border border-slate-100">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-blue-50 text-[#3E5CE7] flex items-center justify-center font-bold text-lg">
                        <span x-text="activityData.type === 'speaker' ? '🎙️' : '💻'"></span>
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-[#071330]" 
                            x-text="activityModalMode === 'create' ? 'Tambah Data Kegiatan / Proyek CV' : 'Edit Data Kegiatan & Lampiran Flyer'"></h3>
                        <p class="text-xs text-slate-400">Unggah flyer gambar atau PDF agar otomatis terlampir di lembar CV.</p>
                    </div>
                </div>
                <button @click="activityModalOpen = false" class="p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Form -->
            <form :action="activityFormAction" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" :value="activityModalMode === 'edit' ? 'PUT' : 'POST'">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Tipe Kegiatan -->
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-[#071330]">Jenis Item *</label>
                        <select name="type" x-model="activityData.type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-[#071330] focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                            <option value="speaker">Keynote Speaker &amp; Pelatihan (Trainer)</option>
                            <option value="project">Portofolio Proyek (Software Engineering)</option>
                        </select>
                    </div>

                    <!-- Kategori -->
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-[#071330]">Kategori Bidang</label>
                        <input type="text" name="category" x-model="activityData.category" placeholder="Contoh: Workshop Jurnalistik AI, EdTech, Global" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <!-- Judul Kegiatan / Proyek -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-[#071330]">Judul Kegiatan / Nama Proyek *</label>
                    <input type="text" name="title" x-model="activityData.title" required placeholder="Contoh: Trainer Workshop Insight Talk bersama Kementerian Komdigi" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-[#071330] focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Penyelenggara / Klien -->
                    <div class="sm:col-span-2 space-y-1">
                        <label class="block text-xs font-bold text-[#071330]">Penyelenggara / Klien</label>
                        <input type="text" name="organizer" x-model="activityData.organizer" placeholder="Contoh: Bank Indonesia &amp; Media Indonesia" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <!-- Tahun -->
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-[#071330]">Tahun *</label>
                        <input type="text" name="year" x-model="activityData.year" required placeholder="Contoh: 2026 atau 2024 - 2026" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Lokasi -->
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-[#071330]">Lokasi Pelaksanaan</label>
                        <input type="text" name="location" x-model="activityData.location" placeholder="Contoh: Aveta Hotel Malioboro, Yogyakarta" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <!-- URL / Link Live -->
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-[#071330]">Link / URL Website (Opsional)</label>
                        <input type="text" name="url" x-model="activityData.url" placeholder="https://..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <!-- Deskripsi Lengkap -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-[#071330]">Uraian Materi / Deskripsi Proyek *</label>
                    <textarea name="description" x-model="activityData.description" rows="3" placeholder="Jelaskan peran Anda, topik materi yang dibawakan, jumlah peserta, atau fitur software yang dikembangkan..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed"></textarea>
                </div>

                <!-- FILE ATTACHMENT SECTION (FLYER GAMBAR & PDF) -->
                <div class="p-4 rounded-2xl bg-blue-50/50 border border-blue-100 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="text-sm">📎</span>
                        <h4 class="text-xs font-extrabold text-[#071330] uppercase">Lampiran Flyer &amp; Dokumen Bukti Kegiatan</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Flyer Gambar -->
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold text-[#071330]">Upload Flyer / Foto Dokumentasi (Gambar)</label>
                            <input type="file" name="flyer_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#3E5CE7] file:text-white hover:file:bg-blue-700 cursor-pointer" />
                            <span class="text-[10px] text-slate-400 block">Format: JPG, PNG, WebP (Maks 10MB).</span>
                            <template x-if="activityData.flyer_path">
                                <div class="mt-2 flex items-center justify-between p-2 rounded-xl bg-white border border-slate-200 text-xs">
                                    <span class="text-slate-600 truncate text-[11px] font-medium" x-text="'Saat ini: ' + activityData.flyer_path.split('/').pop()"></span>
                                    <label class="text-rose-600 hover:text-rose-700 text-[11px] font-bold cursor-pointer">
                                        <input type="checkbox" name="remove_flyer" value="1" class="rounded mr-1" /> Hapus
                                    </label>
                                </div>
                            </template>
                        </div>

                        <!-- Dokumen PDF -->
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold text-[#071330]">Upload Sertifikat / Surat Tugas (PDF)</label>
                            <input type="file" name="pdf_file" accept="application/pdf" class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#071330] file:text-white hover:file:bg-slate-800 cursor-pointer" />
                            <span class="text-[10px] text-slate-400 block">Format: Dokumen PDF (Maks 25MB).</span>
                            <template x-if="activityData.pdf_path">
                                <div class="mt-2 flex items-center justify-between p-2 rounded-xl bg-white border border-slate-200 text-xs">
                                    <span class="text-slate-600 truncate text-[11px] font-medium" x-text="'Saat ini: ' + activityData.pdf_path.split('/').pop()"></span>
                                    <label class="text-rose-600 hover:text-rose-700 text-[11px] font-bold cursor-pointer">
                                        <input type="checkbox" name="remove_pdf" value="1" class="rounded mr-1" /> Hapus
                                    </label>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Toggles & Order -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" x-model="activityData.is_featured" class="rounded text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <span class="text-xs font-bold text-[#071330]">Tampilkan di CV Web</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="show_in_print" value="1" x-model="activityData.show_in_print" class="rounded text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <span class="text-xs font-bold text-[#071330]">Sertakan di Cetak PDF</span>
                    </label>

                    <div class="flex items-center gap-2">
                        <label class="text-xs font-bold text-[#071330]">Urutan:</label>
                        <input type="number" name="order" x-model="activityData.order" class="w-20 px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-mono font-bold" />
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" @click="activityModalOpen = false" class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase shadow-md transition-all">
                        <span x-text="activityModalMode === 'create' ? 'Simpan Kegiatan' : 'Simpan Pembaruan'"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
