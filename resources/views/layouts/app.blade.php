<!DOCTYPE html>
<html lang="id" class="scroll-smooth theme-light light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', ($settings['site_title'] ?? 'SmartVerse (smartverse.id) - Solusi Digital Enterprise & 5 Produk Unggulan'))</title>
    <meta name="description" content="@yield('meta_description', $settings['hero_description'] ?? 'SmartVerse (smartverse.id) adalah mitra teknologi dan ekosistem digital Indonesia yang menghadirkan solusi software enterprise, cloud computing, serta 5 inovasi produk unggulan: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth.')">
    <meta name="keywords" content="smartverse, smartverse.id, smartnews, smartedu, smartsdm, smartfeed, smartsynth, lab forensik ai, portal berita dewan pers, erp sekolah islam terpadu, presensi wajah gps, studio visual ai">
    <meta name="author" content="SmartVerse (smartverse.id)">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="theme-color" content="#00B5B8">
    <meta name="color-scheme" content="light dark">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="SmartVerse">

    <!-- Preload Critical LCP Hero Image -->
    <link rel="preload" as="image" href="{{ asset('images/smartverse/ryan-trainer-hero.webp') }}" type="image/webp" fetchpriority="high">

    <!-- Favicon & App Icons (Dynamic from Settings) -->
    <link rel="icon" type="image/webp" href="{{ asset($settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset($settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}">
    <link rel="shortcut icon" href="{{ asset($settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}">

    <!-- OpenGraph (OG) Meta Tags for WhatsApp, Facebook, LinkedIn, Telegram -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', ($settings['site_title'] ?? 'SmartVerse (smartverse.id)') . ' - Solusi Digital Enterprise')">
    <meta property="og:description" content="@yield('meta_description', $settings['hero_description'] ?? 'SmartVerse (smartverse.id) menghadirkan inovasi digital enterprise: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth.')">
    <meta property="og:image" content="{{ asset($settings['og_image'] ?? $settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}">
    <meta property="og:image:secure_url" content="{{ asset($settings['og_image'] ?? $settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $settings['site_title'] ?? 'SmartVerse' }}">
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? 'SmartVerse' }}">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', ($settings['site_title'] ?? 'SmartVerse (smartverse.id)') . ' - Solusi Digital Enterprise')">
    <meta name="twitter:description" content="@yield('meta_description', $settings['site_description'] ?? 'SmartVerse (smartverse.id) menghadirkan 5 ekosistem produk digital unggulan: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth.')">
    <meta name="twitter:image" content="{{ asset($settings['og_image'] ?? $settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}">

    <!-- Schema.org JSON-LD Structured Data for Google Rich Snippets -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "SmartVerse",
      "image": "{{ asset($settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}",
      "@@id": "https://smartverse.id",
      "url": "https://smartverse.id",
      "telephone": "+6289695249089",
      "email": "info@smartverse.id",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Jl. Sarjana Blok A No. 25 Timbangan",
        "addressLocality": "Ogan Ilir",
        "addressRegion": "Sumatera Selatan",
        "postalCode": "30862",
        "addressCountry": "ID"
      },
      "sameAs": [
        "https://www.facebook.com/profile.php?id=61593862816388",
        "https://instagram.com/smartverse.id"
      ]
    }
    </script>

    <!-- Preload Critical Heading Fonts for Zero-CLS Paint -->
    <link rel="preload" href="https://fonts.gstatic.com/s/poppins/v24/pxiByp8kv8JHgFVrLDD4Z1xlFQ.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/poppins/v24/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @php
        try {
            $sitePrimaryColor = \App\Models\Setting::where('key', 'theme_primary_color')->value('value') ?? '#3E5CE7';
            $siteAccentColor = \App\Models\Setting::where('key', 'theme_accent_color')->value('value') ?? '#fe6000';
        } catch (\Throwable $e) {
            $sitePrimaryColor = '#3E5CE7';
            $siteAccentColor = '#fe6000';
        }
    @endphp

    <style>
        @font-face {
            font-family: 'Poppins-Fallback';
            src: local('Segoe UI'), local('Arial'), local('Helvetica');
            ascent-override: 105%;
            descent-override: 35%;
            line-gap-override: 10%;
            size-adjust: 108%;
        }
        :root {
            --e-global-color-primary: {{ $sitePrimaryColor }};
            --e-global-color-accent: {{ $siteAccentColor }};
            --accent: {{ $siteAccentColor }};
        }
        body, button, input, select, textarea {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .font-heading, .font-black, .font-extrabold {
            font-family: 'Poppins', 'Poppins-Fallback', 'Inter', system-ui, sans-serif !important;
        }
        .bg-flymotion-hero {
            background: radial-gradient(ellipse at 85% 20%, #e0e9ff 0%, #fff1eb 30%, #f0f4ff 60%, #ffffff 100%) !important;
        }
        .bg-flymotion-soft {
            background: #f4f7fe !important;
        }

        /* ═══════════════════════ COMPLETE HIGH-CONTRAST DARK THEME ═══════════════════════ */
        html.dark, html.theme-dark {
            color-scheme: dark;
            background-color: #060B17 !important;
        }
        html.dark body, html.theme-dark body {
            background-color: #060B17 !important;
            color: #F8FAFC !important;
        }
        html.dark .bg-flymotion-hero, html.theme-dark .bg-flymotion-hero {
            background: radial-gradient(ellipse at 85% 20%, #0d1e48 0%, #070e24 45%, #040817 100%) !important;
        }
        html.dark .bg-flymotion-soft, html.theme-dark .bg-flymotion-soft {
            background: #080f24 !important;
        }
        html.dark .bg-white, html.theme-dark .bg-white {
            background-color: #0f172a !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
        html.dark .bg-[#f8faff], html.theme-dark .bg-[#f8faff] {
            background-color: #080f24 !important;
        }
        html.dark .text-[#07153f], html.theme-dark .text-[#07153f] {
            color: #f8fafc !important;
        }
        html.dark .text-[#4a4a4a], html.theme-dark .text-[#4a4a4a] {
            color: #cbd5e1 !important;
        }
        html.dark .text-[#64748b], html.theme-dark .text-[#64748b] {
            color: #94a3b8 !important;
        }
        html.dark .border-slate-100, html.dark .border-slate-200,
        html.theme-dark .border-slate-100, html.theme-dark .border-slate-200 {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        /* ═══════════════════════ THEME LOGO SWITCHER ═══════════════════════ */
        html.dark .logo-dark-mode, html.theme-dark .logo-dark-mode {
            display: block !important;
        }
        html.dark .logo-light-mode, html.theme-dark .logo-light-mode {
            display: none !important;
        }
        html:not(.dark):not(.theme-dark) .logo-dark-mode {
            display: none !important;
        }
        html:not(.dark):not(.theme-dark) .logo-light-mode {
            display: block !important;
        }

        /* Brand Logo Responsive Sizing with Perfect Aspect-Ratio */
        .logo-light-mode, .logo-dark-mode {
            height: 40px !important;
            max-height: 44px !important;
            width: auto !important;
            max-width: 190px !important;
            aspect-ratio: 393 / 164 !important;
            object-fit: contain !important;
        }
        @media (min-width: 640px) {
            .logo-light-mode, .logo-dark-mode {
                height: 44px !important;
                max-height: 48px !important;
                max-width: 220px !important;
                aspect-ratio: 393 / 164 !important;
            }
        }

        /* ═══════════════════════ SCROLL ENTRANCE ANIMATIONS ═══════════════════════ */
        .reveal-on-scroll, .fade-up, .fade-up-target {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-on-scroll.is-visible, .fade-up.is-visible, .fade-up-target.is-visible,
        .reveal-on-scroll.in-view, .fade-up.in-view, .fade-up-target.in-view {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        .delay-75  { transition-delay: 0.075s; }
        .delay-100 { transition-delay: 0.1s; }
        .delay-150 { transition-delay: 0.15s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-250 { transition-delay: 0.25s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-350 { transition-delay: 0.35s; }
        .delay-400 { transition-delay: 0.4s; }
        .delay-500 { transition-delay: 0.5s; }

        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll, .fade-up, .fade-up-target {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        /* ═══════════════════════ FLOATING MICRO-ANIMATIONS ═══════════════════════ */
        @keyframes logo-object {
            0%, 100% { transform: translateY(-8px); }
            50% { transform: translateY(8px); }
        }
        @keyframes logo-object-top {
            0%, 100% { transform: translateY(-6px) translateX(-4px); }
            50% { transform: translateY(6px) translateX(4px); }
        }
        @keyframes logo-object-bottom {
            0%, 100% { transform: translateY(6px) translateX(-4px) rotate(-2deg); }
            50% { transform: translateY(-6px) translateX(4px) rotate(2deg); }
        }
        @keyframes shape-rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .anim-logo-object {
            animation: logo-object 4s ease-in-out infinite !important;
            will-change: transform;
        }
        .anim-logo-top {
            animation: logo-object-top 5s ease-in-out infinite !important;
            will-change: transform;
        }
        .anim-logo-bottom {
            animation: logo-object-bottom 6s ease-in-out infinite !important;
            will-change: transform;
        }
        .anim-shape-rotate {
            animation: shape-rotate 25s linear infinite !important;
            will-change: transform;
        }
    </style>

    <!-- Production Compiled Stylesheet & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // High-Contrast Theme Script with persistence - LIGHT MODE IS DEFAULT
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark', 'theme-dark');
                document.documentElement.classList.remove('light', 'theme-light');
            } else {
                document.documentElement.classList.remove('dark', 'theme-dark');
                document.documentElement.classList.add('light', 'theme-light');
                if (!savedTheme) {
                    localStorage.setItem('theme', 'light');
                }
            }
        })();
    </script>
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-blue-600 selection:text-white transition-colors duration-300 relative">

    <!-- Top Announcement Live Bar (Slim & Sleek on Mobile) -->
    <div class="bg-slate-950 text-white text-[11px] sm:text-xs py-1.5 px-3 sm:px-4 border-b border-slate-800/80 flex items-center justify-between z-50">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between">
            <div class="flex items-center gap-2 sm:gap-3">
                <span class="chip chip-attention text-[10px] py-0.5 px-2 font-bold tracking-wider" style="background: linear-gradient(135deg, #00B5B8 0%, #0A1C3C 100%); color: #ffffff;">
                    SMARTVERSE.ID
                </span>
                <span class="hidden sm:inline text-slate-300 font-medium text-xs">Ekosistem 5 Produk Digital: SmartNews &bull; SmartEdu &bull; SmartFeed &bull; SmartSDM &bull; SmartSynth</span>
                <span class="inline sm:hidden text-slate-300 font-medium text-[11px] truncate">5 Produk Digital Utama</span>
            </div>
            <div class="flex items-center gap-3 text-[11px] sm:text-xs font-bold shrink-0">
                <a href="https://wa.me/6289695249089" target="_blank" class="text-cyan-300 hover:text-cyan-200 flex items-center gap-1.5 mono font-bold">
                    <span>💬 <span class="hidden xs:inline">WhatsApp:</span> 0896 9524 9089</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Floating Glassmorphic Header Navigation Bar -->
    <header x-data="{ open: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="scrolled ? 'backdrop-blur-xl shadow-lg border-b' : 'backdrop-blur-md border-b'"
            class="sticky top-0 inset-x-0 z-50 py-2.5 sm:py-3 transition-colors duration-300"
            style="background-color: var(--bg-panel); border-color: var(--border); opacity: 0.98;">
        <div class="max-w-7xl mx-auto px-3.5 sm:px-6 lg:px-8 flex items-center justify-between">
            
            <!-- Official SmartVerse Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 py-0.5 group focus:outline-none shrink-0" aria-label="SmartVerse.id Home">
                <img src="{{ asset($settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}" alt="SmartVerse Logo" width="120" height="120" fetchpriority="high" class="h-10 sm:h-11 w-10 sm:w-11 rounded-xl shadow-xs object-cover hover:scale-105 transition-transform" />
                <div class="flex flex-col text-left">
                    <span class="text-base sm:text-lg font-black tracking-tight leading-tight text-[#0A1C3C] dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors">
                        Smart<span class="text-cyan-600 dark:text-cyan-400">Verse</span>
                    </span>
                    <span class="text-[9px] font-extrabold uppercase tracking-widest text-slate-500 dark:text-slate-400 mono -mt-0.5">smartverse.id</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-1 surface rounded-full px-3 py-1.5 shadow-xs">
                <a href="{{ route('home') }}" class="px-3.5 py-1.5 rounded-full text-xs font-extrabold transition-all {{ request()->routeIs('home') ? 'btn-primary text-white shadow-md' : 'hover:text-cyan-600' }}" style="color: {{ request()->routeIs('home') ? '#fff' : 'var(--text-muted)' }};">Beranda</a>
                <a href="{{ route('products.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-extrabold transition-all {{ request()->routeIs('products.*') ? 'btn-primary text-white shadow-md' : 'hover:text-cyan-600' }}" style="color: {{ request()->routeIs('products.*') ? '#fff' : 'var(--text-muted)' }};">5 Produk Utama</a>
                <a href="{{ route('services') }}" class="px-3.5 py-1.5 rounded-full text-xs font-extrabold transition-all {{ request()->routeIs('services') ? 'btn-primary text-white shadow-md' : 'hover:text-cyan-600' }}" style="color: {{ request()->routeIs('services') ? '#fff' : 'var(--text-muted)' }};">Layanan IT</a>
                <a href="{{ route('projects.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-extrabold transition-all {{ request()->routeIs('projects.*') ? 'btn-primary text-white shadow-md' : 'hover:text-cyan-600' }}" style="color: {{ request()->routeIs('projects.*') ? '#fff' : 'var(--text-muted)' }};">Portofolio</a>
                <a href="{{ route('trainer.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-extrabold transition-all {{ request()->routeIs('trainer.index') ? 'btn-primary text-white shadow-md' : 'hover:text-cyan-600' }}" style="color: {{ request()->routeIs('trainer.index') ? '#fff' : 'var(--text-muted)' }};">Trainer & Event</a>
                <a href="{{ route('blog.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-extrabold transition-all {{ request()->routeIs('blog.*') ? 'btn-primary text-white shadow-md' : 'hover:text-cyan-600' }}" style="color: {{ request()->routeIs('blog.*') ? '#fff' : 'var(--text-muted)' }};">Wawasan</a>
            </nav>

            <!-- Right Controls: Theme Switcher & Contact Button -->
            <div class="hidden md:flex items-center gap-3">
                <button onclick="toggleTheme()" 
                        type="button" 
                        title="Beralih Mode Tampilan"
                        aria-label="Beralih Mode Tampilan"
                        class="w-10 h-10 rounded-full surface flex items-center justify-center hover:scale-105 transition-all shadow-xs"
                        style="color: var(--text);">
                    <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg class="w-5 h-5 block dark:hidden text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <a href="{{ route('contact') }}" class="px-5 py-2.5 rounded-md bg-[#fe6000] hover:bg-[#e05400] text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 transition-all flex items-center gap-2">
                    <span>Mulai Proyek</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Mobile Controls (Well-spaced, No Button Clashes) -->
            <div class="flex items-center gap-1.5 sm:gap-2 md:hidden">
                <button onclick="toggleTheme()" 
                        type="button" 
                        aria-label="Mode Tema"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl surface flex items-center justify-center hover:scale-105 active:scale-95 transition-all shadow-xs shrink-0" 
                        style="color: var(--text);">
                    <svg class="w-4 h-4 hidden dark:block text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg class="w-4 h-4 block dark:hidden text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                <button @click="open = !open" 
                        type="button" 
                        aria-label="Navigasi Menu"
                        class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl surface flex items-center justify-center hover:scale-105 active:scale-95 transition-all shadow-xs shrink-0" 
                        style="color: var(--text);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden border-b py-3 px-4 sm:px-6 space-y-2 shadow-2xl backdrop-blur-2xl" 
             style="background: var(--bg-panel); border-color: var(--border);">
            <div class="grid grid-cols-1 gap-1">
                <a href="{{ route('home') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400' : 'hover:bg-slate-100 dark:hover:bg-slate-800/60' }}" style="color: {{ request()->routeIs('home') ? '' : 'var(--text)' }};">
                    <span class="flex items-center gap-2.5">
                        <span>🏠</span>
                        <span>Beranda</span>
                    </span>
                    @if(request()->routeIs('home'))
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                    @endif
                </a>
                <a href="{{ route('services') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('services') ? 'bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400' : 'hover:bg-slate-100 dark:hover:bg-slate-800/60' }}" style="color: {{ request()->routeIs('services') ? '' : 'var(--text)' }};">
                    <span class="flex items-center gap-2.5">
                        <span>⚙️</span>
                        <span>Layanan</span>
                    </span>
                    @if(request()->routeIs('services'))
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                    @endif
                </a>
                <a href="{{ route('projects.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('projects.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400' : 'hover:bg-slate-100 dark:hover:bg-slate-800/60' }}" style="color: {{ request()->routeIs('projects.*') ? '' : 'var(--text)' }};">
                    <span class="flex items-center gap-2.5">
                        <span>💼</span>
                        <span>Portofolio</span>
                    </span>
                    @if(request()->routeIs('projects.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                    @endif
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('products.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400' : 'hover:bg-slate-100 dark:hover:bg-slate-800/60' }}" style="color: {{ request()->routeIs('products.*') ? '' : 'var(--text)' }};">
                    <span class="flex items-center gap-2.5">
                        <span>🛍️</span>
                        <span>Produk Digital</span>
                    </span>
                    @if(request()->routeIs('products.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                    @endif
                </a>
                <a href="{{ route('trainer.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('trainer.index') ? 'bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400' : 'hover:bg-slate-100 dark:hover:bg-slate-800/60' }}" style="color: {{ request()->routeIs('trainer.index') ? '' : 'var(--text)' }};">
                    <span class="flex items-center gap-2.5">
                        <span>🎓</span>
                        <span>Trainer & Galeri</span>
                    </span>
                    @if(request()->routeIs('trainer.index'))
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                    @endif
                </a>
                <a href="{{ route('blog.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('blog.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400' : 'hover:bg-slate-100 dark:hover:bg-slate-800/60' }}" style="color: {{ request()->routeIs('blog.*') ? '' : 'var(--text)' }};">
                    <span class="flex items-center gap-2.5">
                        <span>📰</span>
                        <span>Informasi</span>
                    </span>
                    @if(request()->routeIs('blog.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                    @endif
                </a>
            </div>
            <div class="pt-2 border-t" style="border-color: var(--border);">
                <a href="{{ route('contact') }}" class="flex items-center justify-center gap-2 w-full text-center px-4 py-3 rounded-xl bg-gradient-to-r from-[#fe6000] to-[#ff7a29] text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-orange-500/25 active:scale-98 transition-all">
                    <span>🚀 Konsultasi & Estimasi Biaya</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="p-4 rounded-2xl flex items-center justify-between shadow-sm surface" style="background-color: var(--accent-soft); border-color: var(--accent);">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xs font-extrabold" style="color: var(--text);">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" aria-label="Tutup notifikasi" class="font-extrabold" style="color: var(--text);">✕</button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Clean Minimalist Enterprise Footer -->
    <footer class="border-t pt-12 pb-8 transition-colors duration-300 relative overflow-hidden text-white" 
            style="background: linear-gradient(165deg, #07153f 0%, #0A1C3C 45%, #0f2b5c 100%); border-color: rgba(255, 255, 255, 0.12);">
        
        <!-- Subtle Ambient Glow -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-48 bg-cyan-500/10 pointer-events-none rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-10">
            
            <!-- 4 Clean Symmetrical Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 items-start text-left">
                
                <!-- Kolom 1: Brand & Profil -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3 py-1 group" aria-label="SmartVerse.id">
                        <img src="{{ asset($settings['site_logo'] ?? 'images/smartverse/logo-smartverse.webp') }}" 
                             alt="SmartVerse" 
                             width="120" 
                             height="120" 
                             loading="lazy" 
                             decoding="async" 
                             class="h-10 w-10 rounded-xl shadow-xs object-cover hover:scale-105 transition-transform" />
                        <div class="text-left">
                            <span class="text-lg font-black tracking-tight text-white">Smart<span class="text-cyan-400">Verse</span></span>
                            <span class="block text-[10px] uppercase tracking-widest text-cyan-200 mono font-extrabold">smartverse.id</span>
                        </div>
                    </a>
                    <p class="text-xs leading-relaxed text-white/80">
                        Ekosistem solusi teknologi dan rekayasa perangkat lunak enterprise dengan 5 produk unggulan berstandar industri dan integrasi Artificial Intelligence mutakhir.
                    </p>
                    
                    <!-- Social Icons -->
                    <div class="flex items-center gap-2.5 pt-1">
                        <a href="https://www.facebook.com/profile.php?id=61593862816388" target="_blank" rel="noopener noreferrer" 
                           aria-label="Facebook SmartVerse" title="Facebook"
                           class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#1877F2] text-white border border-white/20 flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://instagram.com/smartverse.id" target="_blank" rel="noopener noreferrer" 
                           aria-label="Instagram SmartVerse" title="Instagram"
                           class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#E4405F] text-white border border-white/20 flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="https://wa.me/6289695249089" target="_blank" rel="noopener noreferrer" 
                           aria-label="WhatsApp SmartVerse" title="WhatsApp"
                           class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#25D366] text-white border border-white/20 flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2zm5.79 14.07c-.24.68-1.2 1.25-1.65 1.33-.45.08-1.03.11-3.32-.84-2.75-1.14-4.52-3.95-4.66-4.14-.14-.19-1.12-1.49-1.12-2.84 0-1.35.7-2.02.95-2.29.25-.27.55-.34.73-.34.18 0 .37 0 .53.01.17.01.4.06.61.57.24.58.82 2 .89 2.15.07.15.12.33.02.53-.1.2-.15.32-.3.49-.15.17-.32.38-.45.51-.15.15-.31.31-.13.62.18.31.8 1.32 1.72 2.14 1.18 1.05 2.17 1.37 2.48 1.52.31.15.49.13.67-.08.18-.21.78-.91.99-1.22.21-.31.42-.26.7-.16.28.1 1.77.83 2.07.98.3.15.5.22.58.35.07.13.07.76-.17 1.44z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi Cepat -->
                <div class="space-y-3">
                    <h4 class="font-extrabold text-sm tracking-wide text-white flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                        Navigasi Cepat
                    </h4>
                    <ul class="space-y-2 text-xs font-semibold text-white/80">
                        <li><a href="{{ route('services') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>›</span> Layanan IT</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>›</span> Portofolio Proyek</a></li>
                        <li><a href="{{ route('trainer.index') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>›</span> Narasumber &amp; Galeri</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>›</span> Wawasan &amp; Blog</a></li>
                        <li><a href="{{ route('order-guide.show') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5 text-cyan-200"><span>📄</span> Panduan Pemesanan</a></li>
                        <li><a href="{{ route('cv.show') }}" class="hover:text-amber-300 transition-colors inline-flex items-center gap-1.5 text-amber-200"><span>👤</span> Resume Founder</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: 5 Produk Unggulan -->
                <div class="space-y-3">
                    <h4 class="font-extrabold text-sm tracking-wide text-white flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                        5 Produk Unggulan
                    </h4>
                    <ul class="space-y-2 text-xs font-semibold text-white/80">
                        <li><a href="{{ route('products.show', 'smartnews-cms-portal-berita') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>📰</span> SmartNews CMS Media</a></li>
                        <li><a href="{{ route('products.show', 'smartedu-ekosistem-sekolah-terpadu') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>🎓</span> SmartEdu SIT ERP</a></li>
                        <li><a href="{{ route('products.show', 'smartfeed-ai-visual-studio') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>⚡</span> SmartFeed AI Studio</a></li>
                        <li><a href="{{ route('products.show', 'smartsdm-mobile-hris-presensi') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>📱</span> SmartSDM Mobile HRIS</a></li>
                        <li><a href="{{ route('products.show', 'smartsynth-lab-forensik-ai') }}" class="hover:text-cyan-300 transition-colors inline-flex items-center gap-1.5"><span>🔬</span> SmartSynth Lab Forensik</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Kontak Resmi -->
                <div class="space-y-3">
                    <h4 class="font-extrabold text-sm tracking-wide text-white flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                        Kontak Resmi
                    </h4>
                    <div class="space-y-2 text-xs text-white/80 leading-relaxed font-medium">
                        <p class="line-clamp-2">
                            {{ $siteSettings['contact_address'] ?? 'Jl. Sarjana Blok A No. 25 Timbangan, Ogan Ilir, Sumatera Selatan 30862' }}
                        </p>
                        <div class="pt-1 space-y-1.5">
                            <div class="flex items-center gap-2">
                                <span class="text-white/60">✉️</span>
                                <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@smartverse.id' }}" class="text-white hover:text-cyan-300 transition-colors">
                                    {{ $siteSettings['contact_email'] ?? 'info@smartverse.id' }}
                                </a>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-white/60">💬</span>
                                <a href="https://wa.me/6289695249089" target="_blank" class="text-white hover:text-cyan-300 transition-colors mono">
                                    0896 9524 9089
                                </a>
                            </div>
                            <div class="flex items-center gap-2 text-white/60 text-[11px]">
                                <span>🕒</span>
                                <span>Senin - Jumat: 08:00 - 17:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright Bar -->
            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs font-medium text-white/70">
                <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}" class="font-bold text-white hover:underline transition-colors">SmartVerse (smartverse.id)</a>. All Rights Reserved.</p>
                <div class="flex items-center gap-2 text-[10px] font-bold">
                    <span class="px-2.5 py-1 rounded-md bg-white/10 text-white">🇮🇩 INDONESIA</span>
                    <span class="px-2.5 py-1 rounded-md bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">🔒 SSL SECURED</span>
                </div>
            </div>

        </div>
    </footer>
    
    <!-- Fixed Floating Action Group (Scroll to Top + WA Direct Chat) -->
    <div x-data="{ showTop: false }" 
         @scroll.window="showTop = (window.pageYOffset > 300)" 
         class="fixed bottom-5 right-4 sm:bottom-6 sm:right-6 z-50 flex flex-col items-center gap-2.5">
        
        <!-- Back to Top Button -->
        <button x-show="showTop" 
                x-transition 
                @click="window.scrollTo({ top: 0, behavior: 'smooth' })" 
                type="button" 
                aria-label="Kembali ke atas"
                class="w-10 h-10 sm:w-11 sm:h-11 rounded-full surface flex items-center justify-center hover:scale-110 active:scale-95 transition-all shadow-xl"
                style="color: var(--text);">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

        <!-- Floating WhatsApp Launcher Button (Icon Only Circle) -->
        <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20ingin%20konsultasi%20kebutuhan%20solusi%20digital" 
           target="_blank" 
           aria-label="Chat WhatsApp Resmi"
           title="Chat WhatsApp: 0896 9524 9089"
           class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-[#25D366] hover:bg-[#20bd5a] text-white flex items-center justify-center shadow-2xl shadow-emerald-500/50 hover:scale-110 active:scale-95 transition-all">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>
        </a>
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark') || html.classList.contains('theme-dark');
            if (isDark) {
                html.classList.remove('dark', 'theme-dark');
                html.classList.add('light', 'theme-light');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.remove('light', 'theme-light');
                html.classList.add('dark', 'theme-dark');
                localStorage.setItem('theme', 'dark');
            }
        }
        window.toggleTheme = toggleTheme;

        // Smooth Intersection Observer for Scroll Entrance Animations
        document.addEventListener('DOMContentLoaded', () => {
            const targets = document.querySelectorAll('.reveal-on-scroll, .fade-up, .fade-up-target');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible', 'in-view');
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    threshold: 0.08,
                    rootMargin: '0px 0px -30px 0px'
                });

                targets.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    // If element is already in the viewport on load, show immediately
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        el.classList.add('is-visible', 'in-view');
                    } else {
                        observer.observe(el);
                    }
                });
            } else {
                targets.forEach(el => el.classList.add('is-visible', 'in-view'));
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Pesan Terkirim!',
                    text: {!! json_encode(session('success')) !!},
                    timer: 5000,
                    timerProgressBar: true,
                    confirmButtonColor: '#3E5CE7',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl border border-slate-100',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold text-xs uppercase tracking-wider'
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Pemberitahuan',
                    text: {!! json_encode(session('error')) !!},
                    confirmButtonColor: '#e11d48',
                    confirmButtonText: 'Tutup',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl border border-slate-100',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold text-xs uppercase tracking-wider'
                    }
                });
            @endif
        });
    </script>
    @stack('scripts')
</body>
</html>
