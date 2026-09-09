@extends('admin.layouts.app')

@section('title', 'Analitik Pengunjung & Tren Pembaca')

@section('content')
<div class="space-y-6">

    <!-- Executive Header & Period Filter Controls (Solid Navy #071330, Ultra-High Contrast) -->
    <div style="background: #071330 !important; border: 2px solid #334155 !important; border-radius: 24px; padding: 24px; color: #ffffff !important;" 
         class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 shadow-xl relative overflow-hidden">
        
        <div class="relative z-10 space-y-1.5">
            <div class="flex items-center gap-2.5">
                <span style="background: rgba(254, 96, 0, 0.2) !important; border: 1.5px solid #fe6000 !important; color: #ffedd5 !important; padding: 3px 12px; border-radius: 9999px;" 
                      class="text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#fe6000] animate-ping"></span> Live Tracking
                </span>
                <span style="color: #94a3b8 !important;" class="text-xs font-semibold">Pembaruan Real-Time</span>
            </div>
            <h1 style="color: #ffffff !important;" class="text-2xl lg:text-3xl font-black tracking-tight flex items-center gap-2">
                Analitik Pengunjung & Tren Pembaca
            </h1>
            <p style="color: #cbd5e1 !important;" class="text-xs lg:text-sm font-medium">
                Statistik terperinci lalu lintas pengunjung website & interaksi pembaca artikel SmartVerse (smartverse.id)
            </p>
        </div>

        <!-- Period Filter Tabs -->
        <div style="background: rgba(255, 255, 255, 0.08) !important; border: 1px solid rgba(255, 255, 255, 0.15) !important; border-radius: 18px; padding: 6px;" 
             class="relative z-10 flex items-center self-start md:self-auto gap-1">
            <a href="{{ route('admin.analytics.index', ['period' => 'today']) }}" 
               style="{{ $period === 'today' ? 'background: #fe6000 !important; color: #ffffff !important; box-shadow: 0 4px 12px rgba(254,96,0,0.4) !important;' : 'color: #cbd5e1 !important;' }}"
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all hover:text-white">
                Hari Ini
            </a>
            <a href="{{ route('admin.analytics.index', ['period' => '7_days']) }}" 
               style="{{ $period === '7_days' ? 'background: #fe6000 !important; color: #ffffff !important; box-shadow: 0 4px 12px rgba(254,96,0,0.4) !important;' : 'color: #cbd5e1 !important;' }}"
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all hover:text-white">
                7 Hari
            </a>
            <a href="{{ route('admin.analytics.index', ['period' => '30_days']) }}" 
               style="{{ $period === '30_days' ? 'background: #fe6000 !important; color: #ffffff !important; box-shadow: 0 4px 12px rgba(254,96,0,0.4) !important;' : 'color: #cbd5e1 !important;' }}"
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all hover:text-white">
                30 Hari
            </a>
            <a href="{{ route('admin.analytics.index', ['period' => 'all']) }}" 
               style="{{ $period === 'all' ? 'background: #fe6000 !important; color: #ffffff !important; box-shadow: 0 4px 12px rgba(254,96,0,0.4) !important;' : 'color: #cbd5e1 !important;' }}"
               class="px-4 py-2 rounded-xl text-xs font-bold transition-all hover:text-white">
                Semua
            </a>
        </div>
    </div>

    <!-- Alert Success Notification -->
    @if(session('success'))
    <div style="background: #ecfdf5 !important; border: 1.5px solid #a7f3d0 !important; color: #065f46 !important; border-radius: 16px; padding: 14px 18px;" 
         class="text-xs font-bold flex items-center gap-3 shadow-xs">
        <svg class="w-5 h-5 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- 4 High-Impact KPI Metric Cards (Solid Vibrant Gradients, 100% High Contrast) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Card 1: Total Kunjungan Halaman (Orange Gradient, Crisp White Text) -->
        <div style="background: linear-gradient(135deg, #fe6000 0%, #c2410c 100%) !important; color: #ffffff !important; border: 1px solid rgba(255,255,255,0.2) !important; border-radius: 22px; padding: 22px; box-shadow: 0 10px 25px -5px rgba(254, 96, 0, 0.35) !important;"
             class="flex flex-col justify-between space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span style="color: #ffedd5 !important;" class="text-[11px] font-black uppercase tracking-wider">
                    Total Kunjungan Halaman
                </span>
                <span style="background: rgba(0,0,0,0.2) !important;" class="p-2 rounded-xl">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </span>
            </div>
            <div style="color: #ffffff !important; font-size: 34px; font-weight: 900; line-height: 1; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;" 
                 class="tracking-tight drop-shadow-sm">
                {{ number_format($totalDisplayCount, 0, ',', '.') }}
            </div>
            <div class="flex items-center gap-2 text-xs font-semibold">
                <span style="background: rgba(0,0,0,0.25) !important; color: #ffffff !important; padding: 2px 8px; border-radius: 6px; font-weight: 800;">
                    +{{ number_format($periodHits, 0, ',', '.') }}
                </span>
                <span style="color: #ffedd5 !important;">hits tercatat periode ini</span>
            </div>
        </div>

        <!-- Card 2: Pengunjung Unik (Blue Gradient, Crisp White Text) -->
        <div style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%) !important; color: #ffffff !important; border: 1px solid rgba(255,255,255,0.2) !important; border-radius: 22px; padding: 22px; box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.35) !important;"
             class="flex flex-col justify-between space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span style="color: #dbeafe !important;" class="text-[11px] font-black uppercase tracking-wider">
                    Pengunjung Unik
                </span>
                <span style="background: rgba(0,0,0,0.2) !important;" class="p-2 rounded-xl">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </span>
            </div>
            <div style="color: #ffffff !important; font-size: 34px; font-weight: 900; line-height: 1; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;" 
                 class="tracking-tight drop-shadow-sm">
                {{ number_format($uniqueVisitors, 0, ',', '.') }}
            </div>
            <div style="color: #dbeafe !important;" class="text-xs font-semibold">
                Berdasarkan alamat IP & perangkat unik
            </div>
        </div>

        <!-- Card 3: Pengunjung Aktif Live (Purple Gradient, Crisp White Text) -->
        <div style="background: linear-gradient(135deg, #7c3aed 0%, #5b21b6 100%) !important; color: #ffffff !important; border: 1px solid rgba(255,255,255,0.2) !important; border-radius: 22px; padding: 22px; box-shadow: 0 10px 25px -5px rgba(124, 58, 237, 0.35) !important;"
             class="flex flex-col justify-between space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span style="color: #ede9fe !important;" class="text-[11px] font-black uppercase tracking-wider">
                    Pengunjung Aktif (Live)
                </span>
                <span style="background: rgba(0,0,0,0.2) !important;" class="p-2 rounded-xl flex items-center justify-center">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                </span>
            </div>
            <div class="flex items-center gap-3">
                <div style="color: #ffffff !important; font-size: 34px; font-weight: 900; line-height: 1; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;" 
                     class="tracking-tight drop-shadow-sm">
                    {{ $activeOnline }}
                </div>
                <span style="background: #10b981 !important; color: #ffffff !important; padding: 2px 10px; border-radius: 9999px; font-size: 11px; font-weight: 800; text-transform: uppercase;">
                    Online
                </span>
            </div>
            <div style="color: #ede9fe !important;" class="text-xs font-semibold">
                Sedang membuka web saat ini (Real 5 Menit)
            </div>
        </div>

        <!-- Card 4: Pembaca Mobile (Emerald Gradient, Crisp White Text) -->
        <div style="background: linear-gradient(135deg, #059669 0%, #047857 100%) !important; color: #ffffff !important; border: 1px solid rgba(255,255,255,0.2) !important; border-radius: 22px; padding: 22px; box-shadow: 0 10px 25px -5px rgba(5, 150, 105, 0.35) !important;"
             class="flex flex-col justify-between space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span style="color: #d1fae5 !important;" class="text-[11px] font-black uppercase tracking-wider">
                    Pembaca Mobile (Top)
                </span>
                <span style="background: rgba(0,0,0,0.2) !important;" class="p-2 rounded-xl">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <div style="color: #ffffff !important; font-size: 34px; font-weight: 900; line-height: 1; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;" 
                 class="tracking-tight drop-shadow-sm">
                {{ $mobilePercentage }}%
            </div>
            <div style="color: #d1fae5 !important;" class="text-xs font-semibold">
                {{ number_format($mobileCount, 0, ',', '.') }} smartphone dari total {{ number_format($totalDevices, 0, ',', '.') }} kunjungan
            </div>
        </div>

    </div>

    <!-- Dual-Line Trend Chart (Crisp White Card, High-Contrast Typography) -->
    <div style="background: #ffffff !important; border: 2px solid #e2e8f0 !important; border-radius: 22px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;" 
         class="space-y-4">
        <div style="border-bottom: 2px solid #f1f5f9 !important; padding-bottom: 16px;" 
             class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h3 style="color: #0f172a !important; font-size: 17px; font-weight: 800;" class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#fe6000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
                    Grafik Tren Kunjungan & Pembaca
                </h3>
                <p style="color: #64748b !important; font-size: 12px; font-weight: 500; margin-top: 2px;">
                    Perbandingan jumlah kunjungan tayangan halaman (pageviews) vs pengunjung unik
                </p>
            </div>
            <!-- Custom Legend Indicator -->
            <div class="flex items-center gap-5 text-xs font-extrabold">
                <div class="flex items-center gap-2">
                    <span style="background-color: #fe6000 !important; width: 12px; height: 12px; border-radius: 9999px;"></span>
                    <span style="color: #0f172a !important;">Kunjungan Halaman</span>
                </div>
                <div class="flex items-center gap-2">
                    <span style="background-color: #2563eb !important; width: 12px; height: 12px; border-radius: 9999px;"></span>
                    <span style="color: #0f172a !important;">Pengunjung Unik</span>
                </div>
            </div>
        </div>

        <div class="relative w-full h-[320px]">
            <canvas id="visitorTrendChart"></canvas>
        </div>
    </div>

    <!-- Row 2: Top 10 Halaman & Sumber Trafik (2 Crisp White Cards) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Top 10 Halaman & Artikel Populer -->
        <div style="background: #ffffff !important; border: 2px solid #e2e8f0 !important; border-radius: 22px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;" 
             class="flex flex-col justify-between space-y-4">
            <div>
                <div style="border-bottom: 2px solid #f1f5f9 !important; padding-bottom: 14px;" 
                     class="flex items-center justify-between">
                    <div>
                        <h3 style="color: #0f172a !important; font-size: 16px; font-weight: 800;" class="flex items-center gap-2">
                            <span class="text-amber-500 font-extrabold text-lg">★</span>
                            Top 10 Halaman & Artikel Terpopuler
                        </h3>
                        <p style="color: #64748b !important; font-size: 12px; font-weight: 500;">Konten dengan tayangan tertinggi pada periode ini</p>
                    </div>
                    <span style="color: #64748b !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em;">Tayangan</span>
                </div>

                <div class="divide-y divide-slate-100 mt-2">
                    @forelse($topPages as $index => $page)
                    <div class="py-3 flex items-center justify-between gap-3 group">
                        <div class="flex items-center gap-3 min-w-0">
                            <!-- Rank Badge -->
                            <span class="w-6 h-6 rounded-lg text-xs font-black flex items-center justify-center shrink-0 
                                {{ $index === 0 ? 'bg-amber-400 text-amber-950 shadow-xs' : ($index === 1 ? 'bg-slate-300 text-slate-800' : ($index === 2 ? 'bg-amber-700 text-amber-100' : 'bg-slate-100 text-slate-600')) }}">
                                {{ $index + 1 }}
                            </span>
                            <div class="min-w-0">
                                <div style="color: #0f172a !important;" class="text-xs font-bold truncate group-hover:text-[#fe6000] transition-colors">
                                    {{ $page->page_title }}
                                </div>
                                <div style="color: #64748b !important;" class="text-[10px] font-mono truncate">
                                    {{ $page->url }}
                                </div>
                            </div>
                        </div>
                        <span style="background-color: #fff7ed !important; color: #c2410c !important; border: 1.5px solid #ffedd5 !important; font-size: 12px; font-weight: 900; font-family: monospace; border-radius: 10px; padding: 4px 10px;" 
                              class="shrink-0">
                            {{ number_format($page->views, 0, ',', '.') }} <span style="font-size: 10px; font-weight: 600; color: #9a3412;">views</span>
                        </span>
                    </div>
                    @empty
                    <div class="py-8 text-center text-xs text-slate-400">
                        Belum ada data kunjungan pada periode ini.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sumber Asal Kunjungan (Traffic Sources) -->
        <div style="background: #ffffff !important; border: 2px solid #e2e8f0 !important; border-radius: 22px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;" 
             class="space-y-4">
            <div style="border-bottom: 2px solid #f1f5f9 !important; padding-bottom: 14px;">
                <h3 style="color: #0f172a !important; font-size: 16px; font-weight: 800;" class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    Sumber Asal Kunjungan (Traffic Sources)
                </h3>
                <p style="color: #64748b !important; font-size: 12px; font-weight: 500;">Dari mana pengunjung menemukan dan mengakses website Anda</p>
            </div>

            <div class="space-y-4 mt-2">
                @forelse($trafficSources as $source)
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between text-xs">
                        <div style="color: #0f172a !important;" class="flex items-center gap-2 font-bold">
                            @if(str_contains(strtolower($source->traffic_source), 'langsung') || str_contains(strtolower($source->traffic_source), 'direct'))
                                <span class="w-2.5 h-2.5 rounded-full bg-[#fe6000]"></span>
                            @elseif(str_contains(strtolower($source->traffic_source), 'google'))
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                            @elseif(str_contains(strtolower($source->traffic_source), 'whatsapp'))
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                            @elseif(str_contains(strtolower($source->traffic_source), 'facebook') || str_contains(strtolower($source->traffic_source), 'instagram'))
                                <span class="w-2.5 h-2.5 rounded-full bg-pink-600"></span>
                            @else
                                <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span>
                            @endif
                            <span>{{ $source->traffic_source }}</span>
                        </div>
                        <div class="flex items-center gap-2 font-mono text-xs">
                            <span style="color: #0f172a !important; font-weight: 800;">{{ number_format($source->count, 0, ',', '.') }}</span>
                            <span style="color: #64748b !important; font-weight: 600;">({{ $source->percentage }}%)</span>
                        </div>
                    </div>
                    <div style="background-color: #f1f5f9 !important; height: 8px; border-radius: 9999px; overflow: hidden;">
                        <div style="background: linear-gradient(90deg, #fe6000, #f59e0b) !important; height: 8px; border-radius: 9999px; width: {{ $source->percentage }}%;" 
                             class="transition-all duration-500"></div>
                    </div>
                </div>
                @empty
                <div class="py-8 text-center text-xs text-slate-400">
                    Belum ada data sumber lalu lintas pada periode ini.
                </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Row 3: Wilayah Geografis & Perangkat/Browser (2 Crisp White Cards) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Asal Wilayah Geografis Pengunjung -->
        <div style="background: #ffffff !important; border: 2px solid #e2e8f0 !important; border-radius: 22px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;" 
             class="space-y-4">
            <div style="border-bottom: 2px solid #f1f5f9 !important; padding-bottom: 14px;">
                <h3 style="color: #0f172a !important; font-size: 16px; font-weight: 800;" class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Asal Wilayah Geografis Pengunjung
                </h3>
                <p style="color: #64748b !important; font-size: 12px; font-weight: 500;">Kota dan provinsi asal pengunjung yang mengakses web</p>
            </div>

            <div class="space-y-3 mt-2">
                @forelse($locations as $loc)
                <div class="flex items-center justify-between gap-3 text-xs">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <span style="background: #ecfdf5 !important; border: 1px solid #a7f3d0 !important; border-radius: 8px; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;" class="text-xs shrink-0">
                            📍
                        </span>
                        <div class="min-w-0">
                            <span style="color: #0f172a !important; font-weight: 800;" class="block truncate">{{ $loc->city }}</span>
                            <span style="color: #64748b !important; font-size: 11px;" class="block truncate">{{ $loc->country }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 font-mono shrink-0">
                        <span style="background-color: #f8fafc !important; border: 1px solid #e2e8f0 !important; color: #0f172a !important; font-weight: 800; padding: 2px 8px; border-radius: 6px;" class="text-xs">
                            {{ number_format($loc->count, 0, ',', '.') }}
                        </span>
                        <span style="color: #64748b !important; font-size: 11px; font-weight: 700; width: 42px; text-align: right;">{{ $loc->percentage }}%</span>
                    </div>
                </div>
                @empty
                <div class="py-8 text-center text-xs text-slate-400">
                    Belum ada data wilayah geografis pada periode ini.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Perangkat & Browser Pengunjung -->
        <div style="background: #ffffff !important; border: 2px solid #e2e8f0 !important; border-radius: 22px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;" 
             class="space-y-5">
            <div style="border-bottom: 2px solid #f1f5f9 !important; padding-bottom: 14px;">
                <h3 style="color: #0f172a !important; font-size: 16px; font-weight: 800;" class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Perangkat & Browser Pengunjung
                </h3>
                <p style="color: #64748b !important; font-size: 12px; font-weight: 500;">Karakteristik perangkat keras dan aplikasi penjelajah web</p>
            </div>

            <!-- 3 Device Cards (Crisp Slate BG) -->
            <div class="grid grid-cols-3 gap-3">
                <!-- Mobile Card -->
                <div style="background-color: #f8fafc !important; border: 1.5px solid #e2e8f0 !important; border-radius: 16px; padding: 14px;" 
                     class="text-center space-y-1">
                    <span class="text-xl">📱</span>
                    <div style="color: #64748b !important; font-size: 10px; font-weight: 800; text-transform: uppercase;">Mobile</div>
                    <div style="color: #0f172a !important; font-size: 18px; font-weight: 900; font-family: monospace;">{{ $mobilePercentage }}%</div>
                    <div style="color: #64748b !important; font-size: 11px; font-family: monospace;">{{ number_format($mobileCount, 0, ',', '.') }}</div>
                </div>

                <!-- Desktop Card -->
                <div style="background-color: #f8fafc !important; border: 1.5px solid #e2e8f0 !important; border-radius: 16px; padding: 14px;" 
                     class="text-center space-y-1">
                    <span class="text-xl">💻</span>
                    <div style="color: #64748b !important; font-size: 10px; font-weight: 800; text-transform: uppercase;">Desktop</div>
                    <div style="color: #0f172a !important; font-size: 18px; font-weight: 900; font-family: monospace;">{{ $desktopPercentage }}%</div>
                    <div style="color: #64748b !important; font-size: 11px; font-family: monospace;">{{ number_format($desktopCount, 0, ',', '.') }}</div>
                </div>

                <!-- Tablet Card -->
                <div style="background-color: #f8fafc !important; border: 1.5px solid #e2e8f0 !important; border-radius: 16px; padding: 14px;" 
                     class="text-center space-y-1">
                    <span class="text-xl">📟</span>
                    <div style="color: #64748b !important; font-size: 10px; font-weight: 800; text-transform: uppercase;">Tablet</div>
                    <div style="color: #0f172a !important; font-size: 18px; font-weight: 900; font-family: monospace;">{{ $tabletPercentage }}%</div>
                    <div style="color: #64748b !important; font-size: 11px; font-family: monospace;">{{ number_format($tabletCount, 0, ',', '.') }}</div>
                </div>
            </div>

            <!-- Top Browsers Breakdown -->
            <div class="space-y-2.5 pt-2">
                <div style="color: #64748b !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em;">Distribusi Browser</div>
                @forelse($browsers as $browser)
                <div style="border-bottom: 1px solid #f1f5f9 !important;" class="flex items-center justify-between text-xs py-1.5">
                    <span style="color: #0f172a !important; font-weight: 700;">{{ $browser->browser }}</span>
                    <div class="flex items-center gap-2 font-mono">
                        <span style="color: #0f172a !important; font-weight: 800;">{{ number_format($browser->count, 0, ',', '.') }}</span>
                        <span style="color: #64748b !important; font-size: 11px;">({{ $browser->percentage }}%)</span>
                    </div>
                </div>
                @empty
                <div class="text-xs text-slate-400 py-2">Belum ada data browser.</div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Row 4: Log Kunjungan Pengunjung Terbaru (Crisp White Card, High Contrast Table) -->
    <div style="background: #ffffff !important; border: 2px solid #e2e8f0 !important; border-radius: 22px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;" 
         class="space-y-4">
        <div style="border-bottom: 2px solid #f1f5f9 !important; padding-bottom: 16px;" 
             class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <h3 style="color: #0f172a !important; font-size: 17px; font-weight: 800;">
                        Log Kunjungan Pengunjung Terbaru
                    </h3>
                </div>
                <p style="color: #64748b !important; font-size: 12px; font-weight: 500; margin-top: 2px;">
                    Rekaman aktivitas real-time pengunjung yang mengakses website secara langsung (50 sesi terbaru)
                </p>
            </div>

            <!-- Clean Old Logs Action Button -->
            <form action="{{ route('admin.analytics.clean-logs') }}" method="POST" 
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus log kunjungan yang berusia lebih dari 30 hari? Tindakan ini akan mengoptimalkan ruang penyimpanan database.');">
                @csrf
                <button type="submit" 
                        style="background: #fff1f2 !important; border: 1.5px solid #fecdd3 !important; color: #be123c !important; font-weight: 800; font-size: 12px; padding: 8px 16px; border-radius: 12px;"
                        class="hover:bg-rose-100 transition-all flex items-center gap-1.5 shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span>Bersihkan Log 30 Hari</span>
                </button>
            </form>
        </div>

        <!-- Table Responsive -->
        <div style="border: 1.5px solid #e2e8f0 !important; border-radius: 16px; overflow: hidden;">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr style="background-color: #f8fafc !important; border-bottom: 2px solid #e2e8f0 !important;">
                        <th style="color: #334155 !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; padding: 12px 16px;">Waktu</th>
                        <th style="color: #334155 !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; padding: 12px 16px;">Halaman & Konten</th>
                        <th style="color: #334155 !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; padding: 12px 16px;">Asal & Alamat IP</th>
                        <th style="color: #334155 !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; padding: 12px 16px;">Sumber Asal</th>
                        <th style="color: #334155 !important; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; padding: 12px 16px;">Perangkat & Browser</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentLogs as $log)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <!-- Waktu -->
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <div style="color: #0f172a !important; font-weight: 800;">
                                {{ $log->created_at->diffForHumans() }}
                            </div>
                            <div style="color: #64748b !important;" class="text-[10px] font-mono">
                                {{ $log->created_at->isoFormat('D MMM Y, HH:mm:ss') }}
                            </div>
                        </td>

                        <!-- Halaman & Konten -->
                        <td class="py-3.5 px-4 max-w-xs">
                            <div style="color: #0f172a !important; font-weight: 800;" class="truncate" title="{{ $log->page_title }}">
                                {{ $log->page_title }}
                            </div>
                            <a href="{{ $log->url }}" target="_blank" style="color: #2563eb !important;" class="text-[10px] font-mono hover:underline truncate block">
                                {{ $log->url }}
                            </a>
                        </td>

                        <!-- Asal & IP -->
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <div style="color: #0f172a !important; font-weight: 700;" class="flex items-center gap-1.5">
                                <span>📍</span>
                                <span>{{ $log->city }}, {{ $log->country }}</span>
                            </div>
                            <div style="color: #64748b !important;" class="text-[10px] font-mono mt-0.5">
                                IP: {{ $log->ip_address }}
                            </div>
                        </td>

                        <!-- Sumber Asal -->
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <span style="background: #f8fafc !important; border: 1px solid #e2e8f0 !important; color: #0f172a !important; font-weight: 700; font-size: 11px; padding: 4px 10px; border-radius: 8px;">
                                {{ $log->traffic_source }}
                            </span>
                        </td>

                        <!-- Perangkat & Browser -->
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <div style="color: #0f172a !important; font-weight: 800;" class="flex items-center gap-1.5">
                                <span>{{ $log->device_type === 'Mobile' ? '📱' : ($log->device_type === 'Tablet' ? '📟' : '💻') }}</span>
                                <span>{{ $log->device_type }} &bull; {{ $log->os }}</span>
                            </div>
                            <div style="color: #64748b !important;" class="text-[10px] font-mono mt-0.5">
                                {{ $log->browser }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="color: #94a3b8 !important;" class="py-8 text-center text-xs">
                            Belum ada riwayat rekaman kunjungan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Chart.js CDN for interactive trend visualization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('visitorTrendChart');
    if (!ctx) return;

    const labels = @json($chartData['labels']);
    const pageviews = @json($chartData['pageviews']);
    const uniques = @json($chartData['uniques']);

    // Create gradient fill on clean light canvas
    const canvas = ctx.getContext('2d');
    const orangeGradient = canvas.createLinearGradient(0, 0, 0, 300);
    orangeGradient.addColorStop(0, 'rgba(254, 96, 0, 0.25)');
    orangeGradient.addColorStop(1, 'rgba(254, 96, 0, 0.0)');

    const blueGradient = canvas.createLinearGradient(0, 0, 0, 300);
    blueGradient.addColorStop(0, 'rgba(37, 99, 235, 0.2)');
    blueGradient.addColorStop(1, 'rgba(37, 99, 235, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Kunjungan Halaman',
                    data: pageviews,
                    borderColor: '#fe6000',
                    backgroundColor: orangeGradient,
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#fe6000',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                },
                {
                    label: 'Pengunjung Unik',
                    data: uniques,
                    borderColor: '#2563eb',
                    backgroundColor: blueGradient,
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2.5,
                    borderDash: [4, 4],
                    pointBackgroundColor: '#2563eb',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: false // Using custom legend above chart
                },
                tooltip: {
                    backgroundColor: '#071330',
                    titleColor: '#ffffff',
                    bodyColor: '#e2e8f0',
                    padding: 12,
                    borderRadius: 12,
                    borderColor: '#334155',
                    borderWidth: 1,
                    boxPadding: 6,
                    usePointStyle: true,
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: '#475569',
                        font: {
                            size: 11,
                            weight: '700',
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9',
                    },
                    ticks: {
                        color: '#475569',
                        font: {
                            size: 11,
                            weight: '600',
                        },
                        precision: 0,
                    }
                }
            }
        }
    });
});
</script>
@endsection
