@extends('admin.layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<div class="space-y-6">
    
    <!-- Executive Command Center Hero Banner -->
    <div class="rounded-3xl bg-gradient-to-br from-[#071330] via-[#0d1e47] to-[#0a1738] p-6 sm:p-8 text-white shadow-2xl border-2 border-blue-500/25 relative overflow-hidden">
        <!-- Ambient Decorative Glows -->
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center">
            
            <!-- Left Column: Executive Overview & Action Toolbar (7 cols) -->
            <div class="lg:col-span-7 space-y-4">
                <!-- Meta Pill Bar: Date & System Status -->
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="px-3 py-1.5 rounded-full bg-white/10 text-white text-xs font-bold border border-white/20 backdrop-blur-md flex items-center gap-2 shadow-xs">
                        <svg class="w-3.5 h-3.5 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                    </span>
                    
                    @if(isset($unreadInquiryCount) && $unreadInquiryCount > 0)
                        <span class="px-3.5 py-1.5 rounded-full bg-[#fe6000] text-white text-xs font-black border border-white/30 flex items-center gap-2 shadow-md shadow-orange-500/40">
                            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                            <span>{{ $unreadInquiryCount }} Pesan Baru Menunggu Respon</span>
                        </span>
                    @else
                        <span class="px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 flex items-center gap-1.5 backdrop-blur-sm">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>Sistem Operasional Normal</span>
                        </span>
                    @endif
                </div>
                
                <!-- Greeting & Subtitle -->
                <div>
                    <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight drop-shadow-sm">
                        Selamat Datang, {{ Auth::user()->name ?? 'Admin SmartVerse' }}!
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-100 font-medium leading-relaxed mt-1.5 max-w-xl">
                        Pusat Komando Operasional <strong class="text-cyan-300 font-bold">SmartVerse (smartverse.id)</strong>. Pantau kinerja bisnis, arus kas, status domain & hosting klien, serta terbitkan invoice resmi dalam satu platform terintegrasi.
                    </p>
                </div>

                <!-- Quick Action Buttons Toolbar -->
                <div class="pt-2 flex flex-wrap items-center gap-2.5">
                    <a href="{{ route('admin.invoices.create') }}" 
                       class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 active:scale-95 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-blue-600/40 transition-all flex items-center gap-2 border border-blue-400/40">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>+ Buat Invoice</span>
                    </a>
                    <a href="{{ route('admin.projects.create') }}" 
                       class="px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 text-white font-bold text-xs uppercase tracking-wider border border-white/20 backdrop-blur-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                        <span>+ Proyek</span>
                    </a>
                    <a href="{{ route('admin.finances.index') }}" 
                       class="px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 text-white font-bold text-xs uppercase tracking-wider border border-white/20 backdrop-blur-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <span>Kas & Finansial</span>
                    </a>
                    <a href="{{ route('admin.domain-renewals.index') }}" 
                       class="px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 text-white font-bold text-xs uppercase tracking-wider border border-white/20 backdrop-blur-sm transition-all flex items-center gap-2 relative">
                        <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        <span>Domain & Hosting</span>
                        @if(isset($domainCriticalCount) && $domainCriticalCount > 0)
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500 absolute -top-1 -right-1 ring-2 ring-[#071330] animate-ping"></span>
                        @endif
                    </a>
                    <a href="{{ route('admin.settings.index') }}" 
                       class="px-3.5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 text-white font-bold text-xs uppercase tracking-wider border border-white/20 backdrop-blur-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Pengaturan</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Executive Live Pulse Card (5 cols) -->
            <div class="lg:col-span-5">
                <div class="rounded-2xl bg-white/[0.08] backdrop-blur-md border border-white/20 p-4 sm:p-5 shadow-xl space-y-3">
                    
                    <!-- Header Pulse -->
                    <div class="flex items-center justify-between pb-2 border-b border-white/15">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse shadow-sm shadow-emerald-400"></span>
                            <span class="text-[11px] font-extrabold uppercase tracking-wider text-white">Ringkasan Eksekutif SmartVerse</span>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full bg-cyan-500/20 text-cyan-200 text-[10px] font-black border border-cyan-400/40">Real-Time</span>
                    </div>

                    <!-- Micro Metric 1: Kas Bersih / Omset -->
                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl bg-white/[0.06] border border-white/10 hover:bg-white/[0.12] transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-emerald-500/25 text-emerald-300 border border-emerald-400/40 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-200 font-semibold">Kas & Omset Lembaga</div>
                                <div class="text-sm font-black text-white mono">
                                    Rp {{ number_format($financeNetProfit ?? $totalInvoicePaid ?? 0, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.finances.index') }}" class="text-[11px] font-black text-cyan-300 hover:text-white hover:underline transition-colors">
                            Kas &rarr;
                        </a>
                    </div>

                    <!-- Micro Metric 2: Status Domain & Hosting -->
                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl bg-white/[0.06] border border-white/10 hover:bg-white/[0.12] transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-indigo-500/25 text-indigo-300 border border-indigo-400/40 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-200 font-semibold">Aset Domain & Hosting</div>
                                <div class="text-xs font-bold">
                                    @if(isset($domainCriticalCount) && $domainCriticalCount > 0)
                                        <span class="text-rose-300 font-extrabold">{{ $domainCriticalCount }} Butuh Perpanjangan Segera</span>
                                    @elseif(isset($domainWarningCount) && $domainWarningCount > 0)
                                        <span class="text-amber-300 font-bold">{{ $domainWarningCount }} Expired &lt; 30 Hari</span>
                                    @else
                                        <span class="text-emerald-300 font-bold">{{ $domainCount ?? 0 }} Layanan Aktif & Aman</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.domain-renewals.index') }}" class="text-[11px] font-black text-cyan-300 hover:text-white hover:underline transition-colors">
                            Cek &rarr;
                        </a>
                    </div>

                    <!-- Micro Metric 3: Pengunjung & Trafik -->
                    <div class="flex items-center justify-between gap-3 p-2.5 rounded-xl bg-white/[0.06] border border-white/10 hover:bg-white/[0.12] transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/25 text-blue-300 border border-blue-400/40 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-200 font-semibold">Trafik Web Publik</div>
                                <div class="text-xs font-bold text-white flex items-center gap-1.5 mono">
                                    <span>{{ number_format($totalVisitors ?? 153563, 0, ',', '.') }} Kunjungan</span>
                                    <span class="text-[10px] text-emerald-300 font-bold">({{ $onlineVisitors ?? 1 }} Online)</span>
                                </div>
                            </div>
                        </div>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-sm shadow-emerald-400"></span>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Calm & Dignified Alert Banner: Expiring Domains & Hosting (< 7 Days) -->
    @if(isset($domainCriticalCount) && $domainCriticalCount > 0)
        <div class="p-4 sm:p-5 rounded-2xl bg-white border-l-4 border-rose-600 border-y border-r border-slate-200 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 flex items-center justify-center text-xl shrink-0">
                    🚨
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 text-[10px] font-extrabold uppercase tracking-wider">Perhatian Khusus</span>
                        <h2 class="text-sm sm:text-base font-extrabold text-slate-900">
                            Ada {{ $domainCriticalCount }} Layanan Domain / Hosting Akan Kedaluwarsa Dalam &lt; 7 Hari
                        </h2>
                    </div>
                    <p class="text-xs text-slate-600 font-medium mt-0.5">Segera hubungi klien terkait atau buka konsol provider sebelum masa aktif layanan berakhir.</p>
                </div>
            </div>
            <a href="{{ route('admin.domain-renewals.index', ['tab' => 'critical']) }}" class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs shrink-0 text-center transition-all shadow-xs">
                Kelola Domain Kritis &rarr;
            </a>
        </div>
    @endif

    <!-- Stats Bento Cards: 9 Symmetrical Core Pillars (Clean 3x3 Grid, Crisp Tabular Numbers, Zero Orphans) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-4">
        
        <!-- 1. Projects -->
        <a href="{{ route('admin.projects.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-[#3E5CE7] hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-blue-50 border border-blue-200/80 text-blue-600 flex items-center justify-center text-base">
                    📁
                </div>
                <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10px] font-bold border border-blue-200/60 uppercase">Portofolio</span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $projectCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Portofolio Selesai</div>
            </div>
        </a>

        <!-- 2. Products -->
        <a href="{{ route('admin.products.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-[#fe6000] hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-orange-50 border border-orange-200/80 text-[#fe6000] flex items-center justify-center text-base">
                    📦
                </div>
                <span class="px-2 py-0.5 rounded-md bg-orange-50 text-orange-700 text-[10px] font-bold border border-orange-200/60 uppercase">Store</span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $productCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Produk Digital & SaaS</div>
            </div>
        </a>

        <!-- 3. Pelatihan IT -->
        <a href="{{ route('admin.trainings.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-purple-600 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-purple-50 border border-purple-200/80 text-purple-600 flex items-center justify-center text-base">
                    🎓
                </div>
                <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-bold border border-purple-200/60 uppercase">Silabus</span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $trainingCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Modul Pelatihan IT</div>
            </div>
        </a>

        <!-- 4. Dokumentasi -->
        <a href="{{ route('admin.galleries.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-indigo-600 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-indigo-50 border border-indigo-200/80 text-indigo-600 flex items-center justify-center text-base">
                    📸
                </div>
                <span class="px-2 py-0.5 rounded-md bg-indigo-50 text-indigo-700 text-[10px] font-bold border border-indigo-200/60 uppercase">Galeri</span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $galleryCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Dokumentasi & Event</div>
            </div>
        </a>

        <!-- 5. Artikel Blog -->
        <a href="{{ route('admin.posts.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-cyan-600 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-cyan-50 border border-cyan-200/80 text-cyan-600 flex items-center justify-center text-base">
                    📰
                </div>
                <span class="px-2 py-0.5 rounded-md bg-cyan-50 text-cyan-700 text-[10px] font-bold border border-cyan-200/60 uppercase">Terbit</span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $postCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Artikel & Wawasan</div>
            </div>
        </a>

        <!-- 6. Pengunjung Web (Live) -->
        <a href="{{ route('admin.analytics.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-orange-500 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-orange-50 border border-orange-200/80 text-orange-600 flex items-center justify-center text-base">
                    📊
                </div>
                <span class="px-2 py-0.5 rounded-md bg-orange-50 text-orange-800 text-[10px] font-bold border border-orange-200/60 flex items-center gap-1 uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500 animate-ping"></span> {{ $onlineVisitors }} Online
                </span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ number_format($totalVisitors, 0, ',', '.') }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Total Pembaca Web</div>
            </div>
        </a>

        <!-- 7. Invoices Dicetak -->
        <a href="{{ route('admin.invoices.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-emerald-600 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200/80 text-emerald-600 flex items-center justify-center text-base">
                    🧾
                </div>
                <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-800 text-[10px] font-bold border border-emerald-200/60 uppercase">{{ $paidInvoiceCount }} Lunas</span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $invoiceCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Faktur Tagihan Klien</div>
            </div>
        </a>

        <!-- 8. Inquiries / Pesan Masuk -->
        <a href="{{ route('admin.inquiries.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-rose-600 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-rose-50 border border-rose-200/80 text-rose-600 flex items-center justify-center text-base">
                    ✉️
                </div>
                <span class="px-2 py-0.5 rounded-md {{ $unreadInquiryCount > 0 ? 'bg-rose-100 text-rose-800 border border-rose-200 font-extrabold' : 'bg-slate-100 text-slate-600 border border-slate-200 font-bold' }} text-[10px] uppercase">
                    {{ $unreadInquiryCount > 0 ? $unreadInquiryCount . ' Baru' : 'Inbox' }}
                </span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $inquiryCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Pesan Konsultasi Klien</div>
            </div>
        </a>

        <!-- 9. Aset Domain & Hosting (Multi-Registrar) -->
        <a href="{{ route('admin.domain-renewals.index') }}" class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-600 hover:shadow-sm transition-all group flex flex-col justify-between">
            <div class="flex items-center justify-between w-full mb-3">
                <div class="w-9 h-9 rounded-xl bg-cyan-50 border border-cyan-200/80 text-[#2563eb] flex items-center justify-center text-base">
                    🌐
                </div>
                @if(isset($domainCriticalCount) && $domainCriticalCount > 0)
                    <span class="px-2 py-0.5 rounded-md bg-rose-100 text-rose-800 text-[10px] font-extrabold uppercase tracking-wider border border-rose-200">
                        {{ $domainCriticalCount }} Kritis
                    </span>
                @else
                    <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider border border-emerald-200">
                        Semua Aktif
                    </span>
                @endif
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight leading-none">{{ $domainCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-1.5">Domain & Server Terdaftar</div>
            </div>
        </a>

    </div>

    <!-- SNAPSHOT ANALISA FINANSIAL LEMBAGA & ARUS KAS BTD (Clean & Executive) -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-xs space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-100 pb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 flex items-center justify-center text-xl shrink-0">
                    💰
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <h3 class="text-base font-extrabold text-slate-900">
                            Ikhtisar Finansial Lembaga & Pertimbangan Kebijakan
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 text-[10px] font-extrabold border border-emerald-200 uppercase tracking-wider">
                            Cash Intelligence
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Realisasi kas masuk invoice, beban operasional kas, dan saldo laba bersih lembaga</p>
                </div>
            </div>

            <a href="{{ route('admin.finances.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-[#2563eb] hover:text-white text-slate-800 font-bold text-xs uppercase tracking-wider border border-slate-200 transition-all flex items-center gap-1.5 self-start sm:self-auto shrink-0">
                <span>Buka Analisa Lengkap</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Inflow Box -->
            <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200 space-y-1">
                <span class="text-[11px] font-extrabold text-emerald-900 uppercase tracking-wider block">Total Kas Masuk Riil</span>
                <div class="text-xl sm:text-2xl font-black text-emerald-700 mono">Rp {{ number_format($financeTotalInflow, 0, ',', '.') }}</div>
                <span class="text-[11px] text-emerald-900/80 font-medium block">Invoice paid & kas jasa</span>
            </div>

            <!-- Outflow Box -->
            <div class="p-4 rounded-xl bg-rose-50/70 border border-rose-200 space-y-1">
                <span class="text-[11px] font-extrabold text-rose-900 uppercase tracking-wider block">Total Beban Operasional</span>
                <div class="text-xl sm:text-2xl font-black text-rose-700 mono">Rp {{ number_format($financeTotalExpenses, 0, ',', '.') }}</div>
                <span class="text-[11px] text-rose-900/80 font-medium block">Server, lisensi AI & tim</span>
            </div>

            <!-- Net Profit Box -->
            <div class="p-4 rounded-xl bg-blue-50/70 border border-blue-200 space-y-1">
                <span class="text-[11px] font-extrabold text-blue-900 uppercase tracking-wider block">Laba Bersih Kas (Surplus)</span>
                <div class="text-xl sm:text-2xl font-black text-blue-700 mono">Rp {{ number_format($financeNetProfit, 0, ',', '.') }}</div>
                <span class="text-[11px] text-blue-900/80 font-medium block">Cadangan kas lembaga</span>
            </div>

            <!-- Outstanding Receivables -->
            <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200 space-y-1">
                <span class="text-[11px] font-extrabold text-amber-900 uppercase tracking-wider block">Sisa Piutang Klien</span>
                <div class="text-xl sm:text-2xl font-black text-amber-800 mono">Rp {{ number_format($totalInvoiceRemaining, 0, ',', '.') }}</div>
                <span class="text-[11px] text-amber-900/80 font-medium block">Invoice belum terlunasi</span>
            </div>
        </div>
    </div>

    <!-- FIRST-CLASS SECTION: PELACAK & PENGINGAT MASA AKTIF DOMAIN & HOSTING (Combined on Main Dashboard) -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-xs space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-100 pb-3.5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-200 text-[#2563eb] flex items-center justify-center text-xl shrink-0">
                    🌐
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <h2 class="text-base font-extrabold text-slate-900">
                            Pelacak & Pengingat Masa Aktif Domain & Hosting
                        </h2>
                        @if(isset($domainCriticalCount) && $domainCriticalCount > 0)
                            <span class="px-2 py-0.5 rounded-full bg-rose-100 text-rose-800 text-[10px] font-extrabold border border-rose-200">
                                {{ $domainCriticalCount }} Kritis (&lt;7 Hari)
                            </span>
                        @else
                            <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 text-[10px] font-bold border border-emerald-200">
                                Status Terkendali
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">
                        Monitoring batas waktu jatuh tempo, status registrar (Rumahweb, Spaceship, IDwebhost, Porkbun, dll), dan notifikasi tagihan klien.
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('admin.domain-renewals.index') }}" class="px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-[#2563eb] hover:text-white text-slate-800 font-bold text-xs uppercase tracking-wider border border-slate-200 transition-all flex items-center gap-1.5">
                    <span>Buka Modul Lengkap ({{ $domainCount }})</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Domain Tracking Table (Generous Spacing, Zero Truncation, Tabular Typography) -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-extrabold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4 min-w-[240px]">Domain & Layanan</th>
                        <th class="py-3 px-4 min-w-[150px]">Provider / Registrar</th>
                        <th class="py-3 px-4 min-w-[170px]">Masa Aktif & Status</th>
                        <th class="py-3 px-4 min-w-[190px]">Klien & Kontak</th>
                        <th class="py-3 px-4 min-w-[140px]">Biaya Perpanjang</th>
                        <th class="py-3 px-4 text-right min-w-[130px]">Aksi Cepat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($domainExpiringSoonList as $d)
                        @php
                            $days = $d->days_remaining;
                            $urg = $d->urgency_level;
                        @endphp
                        <tr class="hover:bg-slate-50/70 transition-colors {{ $urg === 'critical' ? 'bg-rose-50/25' : ($urg === 'warning' ? 'bg-amber-50/15' : '') }}">
                            
                            <!-- Domain Name & Type -->
                            <td class="py-3 px-4">
                                <a href="https://{{ $d->domain_name }}" target="_blank" class="font-extrabold text-xs text-[#071330] hover:text-[#2563eb] transition-colors inline-flex items-center gap-1">
                                    <span>{{ $d->domain_name }}</span>
                                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                        {{ $d->service_type_label }}
                                    </span>
                                    @if($d->auto_renew)
                                        <span class="text-[9px] font-bold text-emerald-700 flex items-center gap-0.5">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Auto-Renew
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Provider / Registrar -->
                            <td class="py-3 px-4">
                                <div class="font-bold text-xs text-slate-900 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                    <span>{{ $d->provider }}</span>
                                </div>
                                <div class="mt-1">
                                    <a href="{{ $d->portal_url }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#2563eb] hover:underline">
                                        <span>Buka Konsol ↗</span>
                                    </a>
                                </div>
                            </td>

                            <!-- Expiry Date & Countdown -->
                            <td class="py-3 px-4">
                                <div class="mono text-xs font-bold text-slate-900">
                                    {{ \Carbon\Carbon::parse($d->expiry_date)->translatedFormat('d F Y') }}
                                </div>
                                <div class="mt-1">
                                    @if($urg === 'expired')
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-rose-100 text-rose-800 border border-rose-200 inline-flex items-center gap-1">
                                            <span>⛔</span> Lewat ({{ abs($days) }} Hari)
                                        </span>
                                    @elseif($urg === 'critical')
                                        <span class="px-2 py-0.5 rounded text-[10px] font-extrabold bg-rose-50 text-rose-700 border border-rose-300 inline-flex items-center gap-1">
                                            <span>🚨</span> {{ $days === 0 ? 'Hari Ini Expired!' : $days . ' Hari Lagi!' }}
                                        </span>
                                    @elseif($urg === 'warning')
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-800 border border-amber-200 inline-flex items-center gap-1">
                                            <span>⚠️</span> {{ $days }} Hari Lagi
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 inline-flex items-center gap-1">
                                            <span>✅</span> {{ $days }} Hari Lagi
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Client Info & WhatsApp Button (No Text Truncation) -->
                            <td class="py-3 px-4">
                                <div class="font-extrabold text-xs text-slate-900">
                                    {{ $d->client_name ?: 'Internal BTD' }}
                                </div>
                                @if($d->client_whatsapp)
                                    <div class="mt-1">
                                        <a href="{{ $d->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 font-bold text-[10px] transition-colors">
                                            <span>💬</span>
                                            <span>Kirim WA Tagihan</span>
                                        </a>
                                    </div>
                                @else
                                    <span class="text-[10px] text-slate-400 italic block mt-0.5">Internal / Tanpa kontak</span>
                                @endif
                            </td>

                            <!-- Renewal Price -->
                            <td class="py-3 px-4">
                                <div class="font-bold text-xs text-slate-900 mono">
                                    {{ $d->formatted_price }}
                                </div>
                                <div class="text-[10px] text-slate-500 capitalize">
                                    per {{ str_replace('_', ' ', $d->billing_cycle) }}
                                </div>
                            </td>

                            <!-- Quick Action -->
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5 whitespace-nowrap">
                                    <form action="{{ route('admin.domain-renewals.renew-one-year', $d->id) }}" method="POST" onsubmit="return confirm('Perpanjang masa aktif {{ $d->domain_name }} selama 1 tahun ke depan?');" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                title="Perpanjang Cepat +1 Tahun"
                                                class="whitespace-nowrap inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200/70 font-bold text-xs shadow-2xs transition-all">
                                            <span>⚡ +1 Thn</span>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.domain-renewals.index') }}" class="whitespace-nowrap inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] border border-blue-200/70 font-bold text-xs shadow-2xs transition-all" title="Buka Detail">
                                        <span>Detail &rarr;</span>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 text-center text-xs text-slate-500">
                                Belum ada domain terdaftar. <a href="{{ route('admin.domain-renewals.index') }}" class="text-[#2563eb] font-bold hover:underline">Tambah domain pertama &rarr;</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Two Columns: Recent Invoices & Recent Inquiries (ZERO TEXT TRUNCATION) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6 items-start">
        
        <!-- Left: Recent Invoices Table (7 cols) -->
        <div class="lg:col-span-7 bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h2 class="text-sm font-extrabold text-[#071330] flex items-center gap-1.5">
                        <span>🧾</span>
                        <span>Faktur & Invoice Klien Terakhir</span>
                    </h2>
                    <p class="text-[11px] text-slate-500 font-medium mt-0.5">Total tagihan terbit: <strong class="text-slate-800 mono">Rp {{ number_format($totalInvoiceAmount, 0, ',', '.') }}</strong></p>
                </div>
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('admin.invoices.create') }}" class="px-2.5 py-1 rounded-lg bg-[#2563eb] text-white font-bold text-xs hover:brightness-110 transition-all flex items-center gap-1">
                        <span>+ Buat</span>
                    </a>
                    <a href="{{ route('admin.invoices.index') }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#2563eb] hover:text-white text-xs font-bold text-slate-700 transition-all">
                        Semua &rarr;
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[9px] tracking-wider border-b border-slate-200">
                            <th class="py-2 px-2.5 text-center min-w-[90px]">No. Invoice</th>
                            <th class="py-2 px-2.5 min-w-[180px]">Klien & Lembaga</th>
                            <th class="py-2 px-2.5 text-center min-w-[70px]">Status</th>
                            <th class="py-2 px-2.5 text-right min-w-[100px]">Total (Rp)</th>
                            <th class="py-2 px-2.5 text-center min-w-[110px]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium text-xs">
                        @forelse($recentInvoices as $inv)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-2.5 px-2.5 text-center whitespace-nowrap">
                                    <span class="font-extrabold text-[#071330] mono">#{{ $inv->invoice_number }}</span>
                                    <div class="text-[9px] text-slate-400 mono">{{ $inv->invoice_date ? $inv->invoice_date->format('d/m/Y') : '-' }}</div>
                                </td>

                                <!-- NO TEXT TRUNCATION ON CLIENT NAMES -->
                                <td class="py-2.5 px-2.5">
                                    <div class="font-extrabold text-slate-900 leading-snug">{{ $inv->client_name }}</div>
                                    @if($inv->client_attn)
                                        <div class="text-[10px] text-slate-500 font-semibold leading-tight mt-0.5">{{ $inv->client_attn }}</div>
                                    @endif
                                </td>

                                <td class="py-2.5 px-2.5 text-center whitespace-nowrap">
                                    @if($inv->status === 'PAID')
                                        <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[9px] border border-emerald-200">PAID</span>
                                    @elseif($inv->status === 'PARTIAL')
                                        <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-bold text-[9px] border border-amber-200">DP</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full bg-rose-50 text-rose-700 font-bold text-[9px] border border-rose-200">UNPAID</span>
                                    @endif
                                </td>
                                <td class="py-2.5 px-2.5 text-right font-extrabold text-slate-900 mono whitespace-nowrap">
                                    Rp {{ number_format($inv->total_amount, 0, ',', '.') }}
                                </td>
                                <td class="py-2.5 px-2.5 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5 whitespace-nowrap">
                                        <a href="{{ route('admin.invoices.print', $inv->id) }}" target="_blank" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs border border-emerald-200/70 shadow-2xs transition-all" title="Cetak Faktur PDF">
                                            <span>🖨️ Cetak</span>
                                        </a>
                                        <a href="{{ route('admin.invoices.edit', $inv->id) }}" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold text-xs border border-blue-200/70 shadow-2xs transition-all" title="Edit Faktur">
                                            <span>Edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-xs text-slate-500">
                                    Belum ada invoice. <a href="{{ route('admin.invoices.create') }}" class="text-[#2563eb] font-bold hover:underline">Buat invoice sekarang &rarr;</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Recent Inquiries (5 cols) -->
        <div class="lg:col-span-5 bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h2 class="text-sm font-extrabold text-[#071330] flex items-center gap-1.5">
                        <span>✉️</span>
                        <span>Pesan Masuk Terbaru</span>
                    </h2>
                    <p class="text-[11px] text-slate-500 font-medium">Formulir penawaran dari website</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#2563eb] hover:text-white text-xs font-bold text-slate-700 transition-all">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="space-y-2.5">
                @forelse($recentInquiries as $inq)
                    <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="p-3 rounded-xl border {{ !$inq->is_read ? 'border-orange-300 bg-orange-50/30' : 'border-slate-200 bg-white' }} hover:border-[#2563eb] transition-all flex items-start justify-between gap-2.5 block group">
                        <div class="space-y-0.5 flex-1 min-w-0">
                            <div class="flex items-center gap-1.5">
                                <span class="font-extrabold text-xs text-[#071330] group-hover:text-[#2563eb] transition-colors">{{ $inq->name }}</span>
                                @if(!$inq->is_read)
                                    <span class="px-1.5 py-0.2 rounded-full bg-[#fe6000] text-white font-extrabold text-[8px] shrink-0">BARU</span>
                                @endif
                            </div>
                            <div class="text-[10px] text-slate-500 font-medium">
                                {{ $inq->email }} &bull; {{ $inq->phone ?? '-' }}
                            </div>
                        </div>
                        <span class="text-[9px] text-slate-400 mono font-bold shrink-0">{{ $inq->created_at->diffForHumans() }}</span>
                    </a>
                @empty
                    <div class="text-center py-6 text-xs text-slate-500 space-y-1">
                        <div class="text-xl">📬</div>
                        <p class="font-medium">Belum ada pesan penawaran masuk.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- PUSAT PEMANTAUAN KEAMANAN & DETEKSI ANCAMAN SIBER -->
    <div style="background-color: #071330 !important; color: #ffffff !important;" class="bg-[#071330] rounded-2xl p-4 sm:p-5 text-white border border-slate-700 shadow-md space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-700/80 pb-3">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 border border-emerald-500/40 text-emerald-400 flex items-center justify-center text-sm shrink-0">
                    🛡️
                </div>
                <div>
                    <h3 class="text-xs sm:text-sm font-extrabold text-white flex items-center gap-2">
                        <span>Pusat Pemantauan Keamanan & Deteksi Ancaman Siber</span>
                        <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[9px] font-bold border border-emerald-500/40">
                            ● SISTEM TERLINDUNGI
                        </span>
                    </h3>
                    <p class="text-[11px] text-slate-400 font-normal">Audit berlapis: WAF rate-limiting, uploads .htaccess RCE shield, honeypot anti-spam, dan HSTS SSL preload</p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-[11px] mono shrink-0">
                <span class="px-2.5 py-0.5 rounded-md bg-slate-800 border border-slate-700 text-slate-300">
                    PHP {{ $securityStatus['php_version'] }}
                </span>
                <span class="px-2.5 py-0.5 rounded-md bg-slate-800 border border-slate-700 text-slate-300">
                    Laravel {{ $securityStatus['laravel_version'] }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2.5 sm:gap-3">
            <div class="p-3 rounded-xl bg-slate-800/60 border border-slate-700/80 space-y-0.5">
                <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Proteksi Firewall & WAF</div>
                <div class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Rate Limiter & Anti-Traversal</span>
                </div>
                <div class="text-[10px] text-slate-400">60 req/mnt & blokade null-byte</div>
            </div>

            <div class="p-3 rounded-xl bg-slate-800/60 border border-slate-700/80 space-y-0.5">
                <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Upload Shield & RCE Shield</div>
                <div class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                    <span>🛡️</span>
                    <span>Uploads .htaccess Active</span>
                </div>
                <div class="text-[10px] text-slate-400">Eksekusi script PHP/CGI dilarang</div>
            </div>

            <div class="p-3 rounded-xl bg-slate-800/60 border border-slate-700/80 space-y-0.5">
                <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Anti-Bot & Form Trap</div>
                <div class="text-xs font-bold text-cyan-300 flex items-center gap-1">
                    <span>⚡</span>
                    <span>Honeypot Filter Aktif</span>
                </div>
                <div class="text-[10px] text-slate-400">Spam bot kontak dibuang hening</div>
            </div>

            <div class="p-3 rounded-xl bg-slate-800/60 border border-slate-700/80 space-y-0.5">
                <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400">Brute-Force & HSTS SSL</div>
                <div class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                    <span>✓</span>
                    <span>Maks 5 Login + HSTS Preload</span>
                </div>
                <div class="text-[10px] text-slate-400">Enkripsi ketat 1 tahun penuh</div>
            </div>
        </div>
    </div>

    <!-- BOTTOM ROW: SYSTEM LOGS & ERROR AUDIT TRAIL -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-xs space-y-3">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-100 pb-2.5">
            <div class="flex items-center gap-2">
                <span class="text-base">📜</span>
                <div>
                    <h3 class="text-xs sm:text-sm font-bold text-[#071330]">Catatan Aktivitas & Log Sistem (Audit Trail)</h3>
                    <p class="text-[11px] text-slate-400">Pantauan error runtime, aktivitas background, dan verifikasi integritas sistem</p>
                </div>
            </div>

            <div>
                @if($errorCount === 0)
                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-bold border border-emerald-200 flex items-center gap-1">
                        <span>✓</span>
                        <span>Semua Sistem Normal (0 Error Kritis)</span>
                    </span>
                @else
                    <span class="px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 text-[11px] font-bold border border-amber-200 flex items-center gap-1">
                        <span>⚠️</span>
                        <span>{{ $errorCount }} Catatan Perhatian Terdeteksi</span>
                    </span>
                @endif
            </div>
        </div>

        <div class="space-y-1.5 mono text-[11px]">
            @forelse($systemLogs as $log)
                <div class="p-2.5 rounded-xl border {{ $log['level'] === 'ERROR' ? 'border-rose-200 bg-rose-50/50 text-rose-900' : ($log['level'] === 'WARNING' ? 'border-amber-200 bg-amber-50/50 text-amber-900' : 'border-slate-200 bg-slate-50 text-slate-700') }} flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div class="flex items-center gap-2 overflow-hidden">
                        <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold shrink-0 {{ $log['level'] === 'ERROR' ? 'bg-rose-600 text-white' : ($log['level'] === 'WARNING' ? 'bg-amber-600 text-white' : 'bg-slate-700 text-white') }}">
                            {{ $log['level'] }}
                        </span>
                        <span class="truncate font-sans font-medium text-xs">{{ $log['message'] }}</span>
                    </div>
                    <span class="text-slate-400 shrink-0 text-[10px]">{{ $log['timestamp'] }}</span>
                </div>
            @empty
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs flex items-center justify-between">
                    <div class="flex items-center gap-2 font-sans font-medium">
                        <span class="text-emerald-500 font-bold">✓</span>
                        <span>Log sistem bersih dan stabil. Tidak ada uncaught exception atau insiden keamanan tercatat.</span>
                    </div>
                    <span class="text-slate-400 text-[10px] mono">Status: Healthy</span>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
