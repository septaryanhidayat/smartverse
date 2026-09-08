@extends('layouts.app')

@section('title', 'Tentang Kami & Trainer IT - CV. Beranda Teknologi Digital')

@section('content')
<!-- SECTION 1: ABOUT US & TRAINER HERO (FlyMotion About Layout with Illustration & Watermark) -->
<section class="py-14 sm:py-20 bg-flymotion-hero transition-colors duration-300 relative overflow-hidden">
    
    <!-- Watermark "About" -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-100/70 pointer-events-none select-none tracking-wider -z-0">
        About us
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left: Bio & Company Vision -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="flex items-center justify-center lg:justify-start gap-3">
                    <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                    <span class="text-xs sm:text-sm font-bold tracking-wider uppercase text-[#3E5CE7]">About us</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white leading-tight">
                    We develop digital strategies products and services.
                </h1>

                <p class="text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    <strong class="text-[#07153f] dark:text-white font-bold">CV. Beranda Teknologi Digital</strong> didukung oleh tim software engineer, UI/UX designer, dan AI specialist yang berpengalaman bertahun-tahun dalam perancangan arsitektur software enterprise, aplikasi mobile Flutter, implementasi Artificial Intelligence, serta narasumber workshop IT untuk Kementerian Komdigi RI, Politeknik Akamigas, dan berbagai instansi di Indonesia.
                </p>

                <!-- Stats Badges -->
                <div class="pt-2 grid grid-cols-3 gap-4 max-w-lg mx-auto lg:mx-0">
                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-center shadow-xs">
                        <div class="text-2xl font-black text-[#fe6000] mono">{{ $statsYears }}</div>
                        <div class="text-xs text-slate-600 dark:text-slate-300 font-bold">Pengalaman</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-center shadow-xs">
                        <div class="text-2xl font-black text-[#3E5CE7] dark:text-blue-400 mono">{{ $statsEvents }}</div>
                        <div class="text-xs text-slate-600 dark:text-slate-300 font-bold">Event & Workshop</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-center shadow-xs">
                        <div class="text-2xl font-black text-emerald-600 dark:text-emerald-400 mono">{{ $statsAlumni }}</div>
                        <div class="text-xs text-slate-600 dark:text-slate-300 font-bold">Alumni Peserta</div>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('projects.index') }}" 
                       style="background-color: #3E5CE7 !important; color: #ffffff !important;"
                       class="px-7 py-3.5 rounded-xl font-bold text-xs uppercase shadow-md inline-flex items-center gap-2 transition-all">
                        <span style="color: #ffffff !important;">Lihat Portofolio</span> &rarr;
                    </a>
                </div>
            </div>

            <!-- Right: Trainer Profile Photo with Mac Frame -->
            <div class="lg:col-span-5 flex justify-center relative">
                <div class="relative w-full max-w-md">
                    <div class="bg-white dark:bg-slate-800 p-5 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-2xl relative anim-logo-top">
                        <div class="aspect-square rounded-2xl overflow-hidden bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 relative flex items-center justify-center p-3">
                            <img src="/images/hero-person-old.png" alt="Tim Trainer Beranda Digital" class="w-full h-full object-contain" />
                            <div class="absolute bottom-3 left-3 right-3 p-3 rounded-xl bg-[#07153f]/90 backdrop-blur-md text-white text-xs text-center font-bold shadow-md">
                                ★ Tim Trainer & Konsultan IT Beranda Digital
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECTION 2: SILABUS & MODUL WORKSHOP IT -->
<section class="py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-left space-y-2">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#fe6000]">Program & Silabus</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#07153f] dark:text-white">Modul Pelatihan Corporate & Bootcamp IT</h2>
            <p class="text-sm text-slate-600 dark:text-slate-300 font-medium">Pilihan silabus materi pelatihan yang dirancang khusus untuk meningkatkan keahlian tim IT instansi Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($trainings as $training)
                <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950 text-[#3E5CE7] dark:text-blue-400 text-xs font-bold">
                                {{ $training->level }}
                            </span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-mono font-bold">{{ $training->duration }}</span>
                        </div>

                        <h3 class="text-xl font-bold text-[#07153f] dark:text-white">
                            {{ $training->title }}
                        </h3>

                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $training->summary }}
                        </p>

                        @if($training->syllabus)
                            <div class="space-y-2 pt-2">
                                <span class="text-xs font-bold text-[#07153f] dark:text-white uppercase tracking-wider block">Materi Pokok:</span>
                                <ul class="space-y-1.5 text-xs text-slate-600 dark:text-slate-300 font-medium">
                                    @foreach($training->syllabus as $item)
                                         <li class="flex items-start gap-2">
                                            <span class="text-[#fe6000] font-bold">▶</span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                        <a href="https://wa.me/6289695249089?text=Halo%20CV.%20Beranda%20Teknologi%20Digital,%20saya%20tertarik%20mengundang%20trainer%20untuk%20materi%20{{ urlencode($training->title) }}" 
                           target="_blank" 
                           style="background-color: #fe6000 !important; color: #ffffff !important;"
                           class="block w-full text-center py-3.5 rounded-xl font-bold text-xs uppercase shadow-md transition-all">
                            <span style="color: #ffffff !important;">Undang Trainer / In-House Workshop &rarr;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- SECTION 3: GALERI EVENT PELATIHAN REAL -->
<section class="py-20 bg-[#f8faff] dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-left space-y-2">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#3E5CE7]">Dokumentasi Event</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#07153f] dark:text-white">Galeri Pelatihan & Workshop IT</h2>
            <p class="text-sm text-slate-600 dark:text-slate-300 font-medium">Dokumentasi kegiatan seminar, workshop Komdigi RI, Politeknik Akamigas, dan institusi pendidikan.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleries as $gal)
                <div class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-4/3 overflow-hidden relative bg-slate-100 dark:bg-slate-800">
                        <img src="{{ $gal->image_path }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07153f]/90 via-transparent to-transparent"></div>
                        
                        <div class="absolute bottom-3 left-3 right-3 text-white space-y-1">
                            <span class="px-2.5 py-0.5 rounded-full bg-[#fe6000] text-white text-[10px] font-bold">
                                {{ $gal->category }}
                            </span>
                            <h4 class="text-xs font-bold text-white line-clamp-1">{{ $gal->title }}</h4>
                            <p class="text-[10px] text-slate-200 line-clamp-1 font-medium">📍 {{ $gal->location }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- SECTION 4: LET'S WORK TOGETHER BANNER (FlyMotion Style) -->
<section class="py-16 bg-white dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="background-color: #2A45C8 !important; color: #ffffff !important;" 
             class="rounded-3xl p-10 sm:p-16 text-center text-white space-y-6 shadow-2xl relative overflow-hidden">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white" style="color: #ffffff !important;">
                Let's Work Together
            </h2>
            <p class="text-blue-100 text-xs sm:text-base leading-relaxed max-w-2xl mx-auto font-medium" style="color: #dbeafe !important;">
                Revolusi Teknologi mengubah aspek kehidupan kita, dan struktur masyarakat itu sendiri. Konsultasikan rencana pembuatan website, sistem informasi, atau pelatihan IT bersama kami.
            </p>
            <div class="pt-4">
                <a href="https://wa.me/6289695249089" target="_blank" 
                   class="px-8 py-4 rounded-xl font-bold text-sm shadow-xl inline-flex items-center gap-2 transition-all hover:scale-105"
                   style="background: #ffffff !important; color: #3E5CE7 !important;">
                    <span style="color: #3E5CE7 !important;" class="font-extrabold">Hubungi Kami (WhatsApp)</span> &rarr;
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
