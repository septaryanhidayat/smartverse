<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - SmartVerse (smartverse.id)</title>
    
    @php
        $siteFavicon = \App\Models\Setting::where('key', 'site_favicon')->value('value') ?? 'images/smartverse/logo-smartverse.jpg';
    @endphp
    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/smartverse/logo-smartverse.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('images/smartverse/logo-smartverse.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/smartverse/logo-smartverse.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DI5lHB4f.css') }}">
    <link rel="stylesheet" href="/build/assets/app-DI5lHB4f.css">
    <script src="https://cdn.tailwindcss.com"></script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(base_path('public/build/manifest.json')) || file_exists(base_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body, button, input, select, textarea {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
        .mono {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-variant-numeric: tabular-nums;
            font-feature-settings: "tnum" 1, "zero" 0;
            letter-spacing: 0.1px;
        }

        /* ═══ ROCK-SOLID HIGH-CONTRAST SIDEBAR ACTIVE & HOVER STATES ═══ */
        .side-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.65rem 0.875rem;
            border-radius: 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #cbd5e1;
            transition: all 0.15s ease-in-out;
            border-left: 3px solid transparent;
            text-decoration: none;
        }
        .side-nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            border-left-color: rgba(255, 255, 255, 0.4);
        }
        .side-nav-link.active-blue {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important;
            background-color: #2563eb !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-left: 4px solid #facc15 !important; /* Vivid Yellow Active Accent */
            box-shadow: 0 4px 14px -2px rgba(37, 99, 235, 0.5) !important;
        }
        .side-nav-link.active-orange {
            background: linear-gradient(135deg, #fe6000 0%, #d44f00 100%) !important;
            background-color: #fe6000 !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-left: 4px solid #ffffff !important;
            box-shadow: 0 4px 14px -2px rgba(254, 96, 0, 0.5) !important;
        }
        .side-nav-link.active-emerald {
            background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
            background-color: #059669 !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-left: 4px solid #facc15 !important;
            box-shadow: 0 4px 14px -2px rgba(5, 150, 105, 0.5) !important;
        }
        .side-nav-link.active-blue svg, 
        .side-nav-link.active-orange svg, 
        .side-nav-link.active-emerald svg {
            color: #ffffff !important;
        }

        /* Custom scrollbars */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0b1739;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
</head>
<body class="bg-[#f1f5f9] text-slate-800 min-h-screen flex selection:bg-[#3E5CE7] selection:text-white antialiased" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false" 
         class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 lg:hidden"
         x-transition.opacity></div>

    <!-- Sidebar Navigation -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
           class="fixed inset-y-0 left-0 z-50 w-72 bg-[#0a1330] text-white flex flex-col justify-between transition-transform duration-300 ease-in-out border-r border-white/5 shadow-2xl">
        
        <div class="p-6 space-y-7 overflow-y-auto">
            
            <!-- Logo Brand -->
            <div class="flex items-center justify-between border-b border-white/10 pb-5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/smartverse/logo-smartverse.jpg') }}" alt="SmartVerse" class="h-10 w-10 rounded-xl object-cover transition-transform group-hover:scale-105" />
                    <span class="font-black text-lg text-white">Smart<span class="text-cyan-400">Verse</span></span>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Server Status Chip -->
            <div class="flex items-center justify-between px-3.5 py-2 rounded-xl bg-white/[0.04] border border-white/[0.08] text-[11px]">
                <div class="flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="text-slate-300 font-semibold">Engine Active</span>
                </div>
                <span class="text-[10px] text-slate-500 mono font-bold">v2.4 Live</span>
            </div>

            <!-- Menu Navigation Links (Reorganized 4 Groups) -->
            <div class="space-y-6">
                @php
                    $isDashActive = request()->routeIs('admin.dashboard') || request()->is('admin') || request()->is('admin/dashboard');
                    $isAnalyticsActive = request()->routeIs('admin.analytics.*') || request()->is('admin/analytics*');
                    $isFinancesActive = request()->routeIs('admin.finances.*') || request()->is('admin/finances*');
                    $isInvoicesActive = request()->routeIs('admin.invoices.*') || request()->is('admin/invoices*');
                    $isOrderGuideActive = request()->routeIs('admin.order-guide.*') || request()->is('admin/panduan-pemesanan*') || request()->is('admin/order-guide*');
                    $isDomainsActive = request()->routeIs('admin.domain-renewals.*') || request()->is('admin/domain-renewals*');
                    $isInquiriesActive = request()->routeIs('admin.inquiries.*') || request()->is('admin/inquiries*');
                    $isProjectsActive = request()->routeIs('admin.projects.*') || request()->is('admin/projects*');
                    $isProductsActive = request()->routeIs('admin.products.*') || request()->is('admin/products*');
                    $isTrainingsActive = request()->routeIs('admin.trainings.*') || request()->is('admin/trainings*');
                    $isGalleriesActive = request()->routeIs('admin.galleries.*') || request()->is('admin/galleries*');
                    $isPostsActive = request()->routeIs('admin.posts.*') || request()->is('admin/posts*');
                    $isCategoriesActive = request()->routeIs('admin.categories.*') || request()->is('admin/categories*');
                    $isSettingsActive = request()->routeIs('admin.settings.*') || request()->is('admin/settings*');
                    $isProfileActive = request()->routeIs('admin.profile.*') || request()->is('admin/profile*');
                    $isUsersActive = request()->routeIs('admin.users.*') || request()->is('admin/users*');
                @endphp

                <!-- Group 1: Ringkasan & Analitik Bisnis -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1 flex items-center justify-between">
                        <span>Ikhtisar & Analitik</span>
                        <span class="text-[9px] text-blue-400 font-mono font-bold">LIVE</span>
                    </div>

                    <!-- Dashboard Utama -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="side-nav-link {{ $isDashActive ? 'active-blue' : '' }}"
                       style="{{ $isDashActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isDashActive ? 'text-white' : 'text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            <span class="{{ $isDashActive ? 'font-bold text-white' : '' }}">Dashboard Utama</span>
                        </div>
                        @if($isDashActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Analitik Pengunjung -->
                    <a href="{{ route('admin.analytics.index') }}" 
                       class="side-nav-link {{ $isAnalyticsActive ? 'active-orange' : '' }}"
                       style="{{ $isAnalyticsActive ? 'background-color: #fe6000 !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isAnalyticsActive ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            <span class="{{ $isAnalyticsActive ? 'font-bold text-white' : '' }}">Analitik Pengunjung</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] font-extrabold {{ $isAnalyticsActive ? 'bg-white/25 text-white' : 'bg-orange-500/20 text-orange-300 border border-orange-500/30' }} flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full {{ $isAnalyticsActive ? 'bg-white' : 'bg-orange-400' }} animate-ping"></span> Live
                        </span>
                    </a>

                    <!-- Analisa Keuangan SmartVerse -->
                    <a href="{{ route('admin.finances.index') }}" 
                       class="side-nav-link {{ $isFinancesActive ? 'active-emerald' : '' }}"
                       style="{{ $isFinancesActive ? 'background-color: #059669 !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isFinancesActive ? 'text-white' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="{{ $isFinancesActive ? 'font-bold text-white' : '' }}">Analisa Keuangan SmartVerse</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] font-extrabold {{ $isFinancesActive ? 'bg-white/25 text-white' : 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' }}">
                            Kas
                        </span>
                    </a>
                </div>

                <!-- Group 2: Penagihan & Interaksi Klien -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Transaksi & Klien
                    </div>
                    <!-- Faktur & Invoice Klien -->
                    <a href="{{ route('admin.invoices.index') }}" 
                       class="side-nav-link {{ $isInvoicesActive ? 'active-blue' : '' }}"
                       style="{{ $isInvoicesActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isInvoicesActive ? 'text-white' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span class="{{ $isInvoicesActive ? 'font-bold text-white' : '' }}">Faktur & Invoice Klien</span>
                        </div>
                        @if($isInvoicesActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Dokumen Panduan & SOP Order Klien -->
                    <a href="{{ route('admin.order-guide.index') }}" 
                       class="side-nav-link {{ $isOrderGuideActive ? 'active-blue' : '' }}"
                       style="{{ $isOrderGuideActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isOrderGuideActive ? 'text-white' : 'text-teal-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <span class="{{ $isOrderGuideActive ? 'font-bold text-white' : '' }}">SOP & Panduan Order</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded-full text-[9px] font-extrabold {{ $isOrderGuideActive ? 'bg-white/25 text-white' : 'bg-teal-500/20 text-teal-300 border border-teal-500/30' }}">
                            Klien
                        </span>
                    </a>

                    <!-- Aset Domain & Hosting (Multi-Provider Tracker) -->
                    <a href="{{ route('admin.domain-renewals.index') }}" 
                       class="side-nav-link {{ $isDomainsActive ? 'active-blue' : '' }}"
                       style="{{ $isDomainsActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isDomainsActive ? 'text-white' : 'text-cyan-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            <span class="{{ $isDomainsActive ? 'font-bold text-white' : '' }}">Aset Domain & Hosting</span>
                        </div>
                        @php
                            $critExpCount = \Illuminate\Support\Facades\Schema::hasTable('domain_renewals')
                                ? \App\Models\DomainRenewal::where('expiry_date', '<=', \Carbon\Carbon::today()->addDays(7)->format('Y-m-d'))->count()
                                : 0;
                        @endphp
                        @if($critExpCount > 0)
                            <span class="px-2 py-0.5 rounded-full bg-rose-600 text-white text-[10px] font-black shadow-xs animate-pulse">
                                {{ $critExpCount }}
                            </span>
                        @elseif($isDomainsActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Pesan Masuk Klien -->
                    <a href="{{ route('admin.inquiries.index') }}" 
                       class="side-nav-link {{ $isInquiriesActive ? 'active-blue' : '' }}"
                       style="{{ $isInquiriesActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isInquiriesActive ? 'text-white' : 'text-rose-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="{{ $isInquiriesActive ? 'font-bold text-white' : '' }}">Pesan Masuk Klien</span>
                        </div>
                        @php $unread = \App\Models\Inquiry::where('is_read', false)->count(); @endphp
                        @if($unread > 0)
                            <span class="px-2 py-0.5 rounded-full bg-[#fe6000] text-white text-[10px] font-black shadow-xs">
                                {{ $unread }}
                            </span>
                        @elseif($isInquiriesActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>
                </div>

                <!-- Group 3: Karya, Produk & Edukasi -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Karya & Layanan
                    </div>

                    <!-- Portofolio Proyek -->
                    <a href="{{ route('admin.projects.index') }}" 
                       class="side-nav-link {{ $isProjectsActive ? 'active-blue' : '' }}"
                       style="{{ $isProjectsActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isProjectsActive ? 'text-white' : 'text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            <span class="{{ $isProjectsActive ? 'font-bold text-white' : '' }}">Portofolio Proyek</span>
                        </div>
                        @if($isProjectsActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Produk Digital & Store -->
                    <a href="{{ route('admin.products.index') }}" 
                       class="side-nav-link {{ $isProductsActive ? 'active-blue' : '' }}"
                       style="{{ $isProductsActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isProductsActive ? 'text-white' : 'text-amber-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <span class="{{ $isProductsActive ? 'font-bold text-white' : '' }}">5 Produk Digital & Store</span>
                        </div>
                        @if($isProductsActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Modul Pelatihan IT -->
                    <a href="{{ route('admin.trainings.index') }}" 
                       class="side-nav-link {{ $isTrainingsActive ? 'active-blue' : '' }}"
                       style="{{ $isTrainingsActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isTrainingsActive ? 'text-white' : 'text-purple-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            <span class="{{ $isTrainingsActive ? 'font-bold text-white' : '' }}">Modul Pelatihan IT</span>
                        </div>
                        @if($isTrainingsActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Galeri Dokumentasi -->
                    <a href="{{ route('admin.galleries.index') }}" 
                       class="side-nav-link {{ $isGalleriesActive ? 'active-blue' : '' }}"
                       style="{{ $isGalleriesActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isGalleriesActive ? 'text-white' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="{{ $isGalleriesActive ? 'font-bold text-white' : '' }}">Galeri Dokumentasi</span>
                        </div>
                        @if($isGalleriesActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Artikel & Berita -->
                    <a href="{{ route('admin.posts.index') }}" 
                       class="side-nav-link {{ $isPostsActive ? 'active-blue' : '' }}"
                       style="{{ $isPostsActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isPostsActive ? 'text-white' : 'text-cyan-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            <span class="{{ $isPostsActive ? 'font-bold text-white' : '' }}">Artikel & Berita</span>
                        </div>
                        @if($isPostsActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Kategori Konten -->
                    <a href="{{ route('admin.categories.index') }}" 
                       class="side-nav-link {{ $isCategoriesActive ? 'active-blue' : '' }}"
                       style="{{ $isCategoriesActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isCategoriesActive ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            <span class="{{ $isCategoriesActive ? 'font-bold text-white' : '' }}">Kategori Konten</span>
                        </div>
                        @if($isCategoriesActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>
                </div>

                <!-- Group 4: Pengaturan & Akun -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Sistem & Akun
                    </div>

                    <!-- Tema & Pengaturan Web -->
                    <a href="{{ route('admin.settings.index') }}" 
                       class="side-nav-link {{ $isSettingsActive ? 'active-blue' : '' }}"
                       style="{{ $isSettingsActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isSettingsActive ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                            <span class="{{ $isSettingsActive ? 'font-bold text-white' : '' }}">Tema & Pengaturan Web</span>
                        </div>
                        @if($isSettingsActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Profil Akun Saya -->
                    <a href="{{ route('admin.profile.index') }}" 
                       class="side-nav-link {{ $isProfileActive ? 'active-blue' : '' }}"
                       style="{{ $isProfileActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isProfileActive ? 'text-white' : 'text-cyan-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span class="{{ $isProfileActive ? 'font-bold text-white' : '' }}">Profil Akun Saya</span>
                        </div>
                        @if($isProfileActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>

                    <!-- Manajemen Semua User -->
                    <a href="{{ route('admin.users.index') }}" 
                       class="side-nav-link {{ $isUsersActive ? 'active-blue' : '' }}"
                       style="{{ $isUsersActive ? 'background-color: #2563eb !important; color: #ffffff !important;' : '' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ $isUsersActive ? 'text-white' : 'text-blue-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <span class="{{ $isUsersActive ? 'font-bold text-white' : '' }}">Manajemen Semua User</span>
                        </div>
                        @if($isUsersActive)
                            <span class="w-2 h-2 rounded-full bg-white shadow-xs"></span>
                        @endif
                    </a>
                </div>
            </div>

        </div>

        <!-- Sidebar Bottom: User Profile & Quick Actions -->
        <div class="p-5 border-t border-white/10 bg-black/20 space-y-3">
            <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3 p-1.5 -m-1.5 rounded-2xl hover:bg-white/10 transition-colors group" title="Buka Pengaturan Akun">
                <div class="w-10 h-10 rounded-xl overflow-hidden bg-gradient-to-br from-[#3E5CE7] to-[#fe6000] text-white flex items-center justify-center font-black text-sm shadow-md shrink-0 group-hover:scale-105 transition-transform border border-white/20">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover" />
                    @else
                        <span>{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                    @endif
                </div>
                <div class="overflow-hidden flex-1">
                    <div class="text-xs font-bold text-white group-hover:text-blue-300 transition-colors truncate">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="text-[10px] text-slate-400 truncate mono">{{ Auth::user()->email ?? 'admin@smartverse.id' }}</div>
                </div>
                <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-white transition-colors shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <div class="flex items-center gap-2 pt-1">
                <a href="{{ route('home') }}" target="_blank" class="flex-1 py-2 px-3 rounded-xl bg-white/10 hover:bg-white/20 text-center text-[11px] font-bold text-slate-200 transition-all flex items-center justify-center gap-1.5">
                    <span>Lihat Web</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" title="Keluar dari Admin" class="p-2 rounded-xl bg-rose-500/20 hover:bg-rose-500/30 text-rose-300 hover:text-white text-xs font-bold transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 lg:pl-72 flex flex-col min-h-screen">
        
        <!-- Top Header Navigation -->
        <header class="h-16 bg-white border-b border-slate-200/80 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs backdrop-blur-md bg-white/90">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                    <span>Portal Admin</span>
                    <span class="text-slate-300">/</span>
                    <span class="font-bold text-[#07153f]">SmartVerse (smartverse.id)</span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.settings.index') }}" class="px-3.5 py-1.5 rounded-xl bg-orange-50 hover:bg-orange-100 text-[#fe6000] text-xs font-bold transition-all flex items-center gap-2 border border-orange-200/60 shadow-2xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                    <span class="hidden sm:inline">Tema & Branding</span>
                </a>
                <a href="{{ route('home') }}" target="_blank" class="px-3.5 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] text-xs font-bold transition-all flex items-center gap-2 border border-blue-200/60 shadow-2xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span class="hidden sm:inline">Kunjungi Website</span>
                </a>
            </div>
        </header>

        <!-- Main Body Wrapper -->
        <main class="flex-1 p-4 sm:p-8 space-y-6 max-w-7xl w-full mx-auto">
            
            <!-- Toast Notification Alerts -->
            @if (session('success'))
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2.5">
                        <span class="p-1 rounded-lg bg-emerald-100 text-emerald-700">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" @click="$el.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900 font-extrabold text-sm">✕</button>
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-900 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2.5">
                        <span class="p-1 rounded-lg bg-rose-100 text-rose-700">!</span>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button type="button" @click="$el.parentElement.remove()" class="text-rose-700 hover:text-rose-900 font-extrabold text-sm">✕</button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Admin Footer -->
        <footer class="py-4 px-8 border-t border-slate-200 text-center text-xs text-slate-400 bg-white flex flex-col sm:flex-row items-center justify-between gap-2">
            <span>&copy; {{ date('Y') }} <strong>SmartVerse (smartverse.id)</strong> &bull; All rights reserved.</span>
            <span class="text-[11px] mono text-slate-400">Laravel v12 &bull; PHP v8.3+</span>
        </footer>

    </div>

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Notifikasi SweetAlert2 saat berhasil simpan/ubah/hapus data CRUD
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: {!! json_encode(session('success')) !!},
                    timer: 4500,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonColor: '#269DB9',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl border border-slate-100',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold text-xs uppercase tracking-wider'
                    }
                });
            @endif

            // 2. Notifikasi SweetAlert2 saat terjadi error / kendala
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Pemberitahuan Sistem',
                    text: {!! json_encode(session('error')) !!},
                    confirmButtonColor: '#e11d48',
                    confirmButtonText: 'Tutup',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl border border-slate-100',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold text-xs uppercase tracking-wider'
                    }
                });
            @endif

            // 3. Notifikasi SweetAlert2 saat validasi input form gagal
            @if ($errors->any())
                Swal.fire({
                    icon: 'warning',
                    title: 'Validasi Input Belum Lengkap',
                    html: '<div style="text-align: left; font-size: 13px; line-height: 1.6;">{!! implode("<br>", array_map("e", $errors->all())) !!}</div>',
                    confirmButtonColor: '#f59e0b',
                    confirmButtonText: 'Periksa Formulir',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl border border-slate-100',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold text-xs uppercase tracking-wider'
                    }
                });
            @endif

            // 4. Intercept konfirmasi hapus data CRUD dengan modal SweetAlert2 interaktif
            document.addEventListener('submit', function(e) {
                const form = e.target;
                if (!form || !form.tagName || form.tagName.toLowerCase() !== 'form') return;

                const isDelete = form.querySelector('input[name="_method"][value="DELETE"]') !== null;
                if (isDelete && !form.dataset.confirmed) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    Swal.fire({
                        title: 'Konfirmasi Hapus Data',
                        text: 'Apakah Anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dipulihkan kembali.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e11d48',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Ya, Hapus Sekarang!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            popup: 'rounded-3xl shadow-2xl border border-slate-100',
                            confirmButton: 'rounded-xl px-5 py-2.5 font-bold text-xs',
                            cancelButton: 'rounded-xl px-5 py-2.5 font-semibold text-xs'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.dataset.confirmed = 'true';
                            form.submit();
                        }
                    });
                }
            }, true);
        });
    </script>
</html>
