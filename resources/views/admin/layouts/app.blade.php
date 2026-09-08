<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - CV. Beranda Teknologi Digital</title>
    
    @php
        $siteFavicon = \App\Models\Setting::where('key', 'site_favicon')->value('value') ?? 'favicon.png';
    @endphp
    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/png" href="{{ asset($siteFavicon) }}">
    <link rel="shortcut icon" href="{{ asset($siteFavicon) }}">
    <link rel="apple-touch-icon" href="{{ asset($siteFavicon) }}">
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
                    <img src="{{ asset('images/Logo-BTD-white.png') }}" alt="CV. Beranda Teknologi Digital" class="h-11 w-auto object-contain transition-transform group-hover:scale-105" />
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

            <!-- Menu Navigation Links -->
            <div class="space-y-6">
                <!-- Group 1: Master Overview -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Ikhtisar Sistem
                    </div>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg shadow-blue-900/30' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        <span>Dashboard Utama</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-[#fe6000] to-[#d44f00] text-white shadow-lg shadow-orange-950/30' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-orange-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                        <span>Tema & Pengaturan Web</span>
                    </a>
                </div>

                <!-- Group 2: Content Management -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Manajemen Konten
                    </div>
                    <a href="{{ route('admin.projects.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.projects.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.projects.*') ? 'text-white' : 'text-blue-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span>Portofolio Proyek</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-amber-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        <span>Produk Digital & Store</span>
                    </a>
                    <a href="{{ route('admin.trainings.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.trainings.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.trainings.*') ? 'text-white' : 'text-purple-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        <span>Modul Pelatihan IT</span>
                    </a>
                    <a href="{{ route('admin.galleries.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.galleries.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.galleries.*') ? 'text-white' : 'text-emerald-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Galeri Dokumentasi</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.posts.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.posts.*') ? 'text-white' : 'text-cyan-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <span>Artikel & Berita</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.categories.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <span>Kategori Konten</span>
                    </a>
                </div>

                <!-- Group 3: Interaksi & Penagihan -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Pesan & Penagihan
                    </div>
                    <a href="{{ route('admin.inquiries.index') }}" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.inquiries.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <span class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('admin.inquiries.*') ? 'text-white' : 'text-rose-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>Pesan Masuk</span>
                        </span>
                        @php $unread = \App\Models\Inquiry::where('is_read', false)->count(); @endphp
                        @if($unread > 0)
                            <span class="px-2 py-0.5 rounded-full bg-[#fe6000] text-white text-[10px] font-black shadow-xs">
                                {{ $unread }}
                            </span>
                        @endif
                    </a>
                    <a href="{{ route('admin.invoices.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.invoices.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.invoices.*') ? 'text-white' : 'text-emerald-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Faktur & Invoice Klien</span>
                    </a>
                </div>

                <!-- Group 4: Pengaturan Akun & Akses -->
                <div class="space-y-1">
                    <div class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 px-3 pb-1">
                        Akun & Akses
                    </div>
                    <a href="{{ route('admin.profile.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.profile.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.profile.*') ? 'text-white' : 'text-cyan-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span>Profil Akun Saya</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all group {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-[#3E5CE7] to-[#2B44BA] text-white shadow-lg' : 'text-slate-300 hover:bg-white/[0.06] hover:text-white' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-blue-400 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Manajemen Semua User</span>
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
                    <div class="text-[10px] text-slate-400 truncate mono">{{ Auth::user()->email ?? 'admin@berandadigital.net' }}</div>
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
                    <span class="font-bold text-[#07153f]">CV. Beranda Teknologi Digital</span>
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
            <span>&copy; {{ date('Y') }} <strong>CV. Beranda Teknologi Digital</strong> &bull; All rights reserved.</span>
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
