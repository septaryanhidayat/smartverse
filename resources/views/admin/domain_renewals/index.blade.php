@extends('admin.layouts.app')

@section('title', 'Pelacak & Pengingat Domain & Hosting')

@section('content')
<div class="space-y-6 pb-12" x-data="domainManager()">

    <!-- Header & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1.5">
                <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-[#2563eb] border border-blue-200/80 text-[10px] font-extrabold uppercase tracking-wider">
                    Infrastructure & Assets
                </span>
                <span class="text-slate-300 text-xs">•</span>
                <span class="text-slate-500 text-xs font-semibold">Multi-Registrar Management</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#071330] tracking-tight">
                Pelacak & Pengingat Domain & Hosting
            </h1>
            <p class="text-xs sm:text-sm text-slate-600 font-medium mt-0.5 max-w-3xl">
                Pantau masa aktif domain, hosting, dan server lintas registrar (Rumahweb, Spaceship, Porkbun, IDwebhost, Webnesia, GoDaddy, dll) agar tidak terlambat perpanjangan.
            </p>
        </div>

        <div class="flex items-center gap-2.5 shrink-0">
            <button @click="openCreateModal()" 
                    style="background-color: #2563eb !important; color: #ffffff !important;"
                    class="px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-sm hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span style="color: #ffffff !important; font-weight: 800;">+ Tambah Domain / Hosting</span>
            </button>
        </div>
    </div>

    <!-- Calm & Dignified Critical Expiry Alert Banner -->
    @if($criticalCount > 0)
        <div class="p-4 sm:p-5 rounded-2xl bg-white border-l-4 border-rose-600 border-y border-r border-slate-200/80 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-start sm:items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 flex items-center justify-center text-xl shrink-0">
                    🚨
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 text-[10px] font-extrabold uppercase tracking-wider">
                            Tindakan Mendesak
                        </span>
                        <h2 class="text-sm sm:text-base font-extrabold text-slate-900">
                            Ada {{ $criticalCount }} Layanan Akan Kedaluwarsa Dalam &lt; 7 Hari
                        </h2>
                    </div>
                    <p class="text-xs text-slate-600 font-medium mt-0.5">
                        Segera hubungi klien terkait atau buka konsol provider untuk memperpanjang sebelum domain masuk masa tenggang (*Grace Period*).
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.domain-renewals.index', ['tab' => 'critical']) }}" 
               class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold shrink-0 text-center transition-all shadow-xs">
                Lihat Daftar Kritis &rarr;
            </a>
        </div>
    @endif

    <!-- Harmonious KPI Bento Grid (Clean White, Calm Borders, No Eye-Strain) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Total Aset -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-slate-300 transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Total Layanan Dipantau</span>
                <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[10px] font-bold border border-slate-200">
                    Semua
                </span>
            </div>
            <div>
                <div class="text-3xl font-black text-[#071330] mono leading-none">{{ $totalCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-2">Domain, Hosting & VPS Aktif</div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Status Aman (&gt;30 Hari):</span>
                <span class="font-bold text-emerald-600">{{ $safeCount }} Layanan</span>
            </div>
        </div>

        <!-- Kritis < 7 Hari -->
        <div class="bg-white p-5 rounded-2xl border {{ $criticalCount > 0 ? 'border-rose-300 bg-rose-50/20' : 'border-slate-200' }} shadow-xs hover:border-rose-400 transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-extrabold text-rose-700 uppercase tracking-wider">🚨 Kritis (&lt; 7 Hari)</span>
                <span class="px-2 py-0.5 rounded-md {{ $criticalCount > 0 ? 'bg-rose-100 text-rose-800 border border-rose-200 font-extrabold' : 'bg-slate-100 text-slate-600 border border-slate-200' }} text-[10px]">
                    {{ $criticalCount > 0 ? 'Segera' : 'Nol' }}
                </span>
            </div>
            <div>
                <div class="text-3xl font-black {{ $criticalCount > 0 ? 'text-rose-600' : 'text-[#071330]' }} mono leading-none">{{ $criticalCount }}</div>
                <div class="text-xs font-semibold {{ $criticalCount > 0 ? 'text-rose-600 font-bold' : 'text-slate-500' }} mt-2">
                    {{ $criticalCount > 0 ? 'Perlu perpanjangan cepat' : 'Tidak ada yang darurat' }}
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Batas Waktu:</span>
                <span class="font-bold {{ $criticalCount > 0 ? 'text-rose-600' : 'text-slate-600' }}">Maksimal 7 hari</span>
            </div>
        </div>

        <!-- Waspada < 30 Hari -->
        <div class="bg-white p-5 rounded-2xl border {{ $warningCount > 0 ? 'border-amber-300 bg-amber-50/20' : 'border-slate-200' }} shadow-xs hover:border-amber-400 transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-extrabold text-amber-800 uppercase tracking-wider">⚠️ Waspada (&lt; 30 Hari)</span>
                <span class="px-2 py-0.5 rounded-md {{ $warningCount > 0 ? 'bg-amber-100 text-amber-800 border border-amber-200 font-extrabold' : 'bg-slate-100 text-slate-600 border border-slate-200' }} text-[10px]">
                    1 Bulan
                </span>
            </div>
            <div>
                <div class="text-3xl font-black {{ $warningCount > 0 ? 'text-amber-700' : 'text-[#071330]' }} mono leading-none">{{ $warningCount }}</div>
                <div class="text-xs font-semibold text-slate-500 mt-2">Jatuh tempo bulan ini</div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Sudah Kedaluwarsa:</span>
                <span class="font-bold {{ $expiredCount > 0 ? 'text-rose-600' : 'text-slate-600' }}">{{ $expiredCount }} Layanan</span>
            </div>
        </div>

        <!-- Estimasi Biaya Perpanjangan -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-slate-300 transition-all flex flex-col justify-between">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Estimasi Biaya / Thn</span>
                <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200">
                    Budget
                </span>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-[#071330] mono leading-none">
                    Rp {{ number_format($totalCostIDR, 0, ',', '.') }}
                </div>
                <div class="text-xs font-semibold text-slate-500 mt-2">Biaya operasional domain & server</div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                <span>Valuta Asing (USD):</span>
                <span class="font-bold text-slate-700 mono">$ {{ number_format($totalCostUSD, 2) }}</span>
            </div>
        </div>

    </div>

    <!-- Provider Filter Pills (Clean & Tasteful) -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs space-y-2.5">
        <div class="flex items-center justify-between text-xs">
            <span class="text-slate-500 font-bold uppercase tracking-wider text-[10px]">Pilih Provider / Registrar:</span>
            @if(request('provider') || request('tab') || request('search'))
                <a href="{{ route('admin.domain-renewals.index') }}" class="text-[11px] font-bold text-[#2563eb] hover:underline">
                    Reset Filter &times;
                </a>
            @endif
        </div>
        <div class="flex flex-wrap items-center gap-1.5">
            <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('provider', 'page'), ['provider' => 'all'])) }}"
               class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ (!request('provider') || request('provider') === 'all') ? 'bg-[#071330] text-white shadow-xs' : 'bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200' }}">
                Semua Provider
            </a>
            @foreach($providers as $p)
                <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('provider', 'page'), ['provider' => $p])) }}"
                   class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ request('provider') === $p ? 'bg-[#2563eb] text-white shadow-xs' : 'bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200' }}">
                    {{ $p }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Filter Status Tabs & Search Bar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        
        <!-- Tabs -->
        <div class="flex items-center gap-1 p-1 rounded-xl bg-slate-100 border border-slate-200 overflow-x-auto text-xs font-semibold">
            <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('tab', 'page'), ['tab' => 'all'])) }}"
               class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap {{ ($tab === 'all') ? 'bg-white text-slate-900 shadow-xs font-bold border border-slate-200' : 'text-slate-600 hover:text-slate-900' }}">
                Semua ({{ $totalCount }})
            </a>
            <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('tab', 'page'), ['tab' => 'critical'])) }}"
               class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap flex items-center gap-1.5 {{ ($tab === 'critical') ? 'bg-white text-rose-700 shadow-xs font-bold border border-rose-200' : 'text-slate-600 hover:text-rose-700' }}">
                <span>🚨 Kritis &lt; 7 Hari</span>
                @if($criticalCount > 0)
                    <span class="px-1.5 py-0.2 rounded-full bg-rose-600 text-white text-[10px] font-bold">{{ $criticalCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('tab', 'page'), ['tab' => 'warning'])) }}"
               class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap flex items-center gap-1.5 {{ ($tab === 'warning') ? 'bg-white text-amber-800 shadow-xs font-bold border border-amber-200' : 'text-slate-600 hover:text-amber-800' }}">
                <span>⚠️ Segera Expired</span>
                @if($warningCount > 0)
                    <span class="px-1.5 py-0.2 rounded-full bg-amber-500 text-white text-[10px] font-bold">{{ $warningCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('tab', 'page'), ['tab' => 'expired'])) }}"
               class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap {{ ($tab === 'expired') ? 'bg-white text-slate-900 shadow-xs font-bold border border-slate-200' : 'text-slate-600 hover:text-slate-900' }}">
                ⛔ Kedaluwarsa ({{ $expiredCount }})
            </a>
            <a href="{{ route('admin.domain-renewals.index', array_merge(request()->except('tab', 'page'), ['tab' => 'hosting'])) }}"
               class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap {{ ($tab === 'hosting') ? 'bg-white text-blue-700 shadow-xs font-bold border border-blue-200' : 'text-slate-600 hover:text-blue-700' }}">
                ⚡ Hosting & Server
            </a>
        </div>

        <!-- Search Input -->
        <form method="GET" action="{{ route('admin.domain-renewals.index') }}" class="relative w-full md:w-80">
            @if(request('tab')) <input type="hidden" name="tab" value="{{ request('tab') }}"> @endif
            @if(request('provider')) <input type="hidden" name="provider" value="{{ request('provider') }}"> @endif
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Cari domain, klien, atau catatan..." 
                   class="w-full pl-9 pr-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-medium text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#2563eb] shadow-xs" />
            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
    </div>

    <!-- Domains Table Card (Generous Padding, Clear Widths, Zero Truncation) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-extrabold uppercase tracking-wider text-[10px]">
                        <th class="py-3.5 px-5 min-w-[260px]">Domain & Layanan</th>
                        <th class="py-3.5 px-5 min-w-[160px]">Provider / Registrar</th>
                        <th class="py-3.5 px-5 min-w-[180px]">Masa Aktif & Status</th>
                        <th class="py-3.5 px-5 min-w-[200px]">Klien & Kontak</th>
                        <th class="py-3.5 px-5 min-w-[150px]">Biaya Perpanjangan</th>
                        <th class="py-3.5 px-5 text-right min-w-[130px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($domains as $item)
                        @php
                            $days = $item->days_remaining;
                            $urgency = $item->urgency_level;
                        @endphp
                        <tr class="hover:bg-slate-50/70 transition-colors {{ $urgency === 'critical' ? 'bg-rose-50/20' : ($urgency === 'warning' ? 'bg-amber-50/10' : '') }}">
                            
                            <!-- Domain Name & Service Type (No Text Truncation) -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-2">
                                    <a href="https://{{ $item->domain_name }}" target="_blank" class="font-extrabold text-sm text-[#071330] hover:text-[#2563eb] transition-colors flex items-center gap-1 group">
                                        <span>{{ $item->domain_name }}</span>
                                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                </div>
                                
                                <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                        {{ $item->service_type_label }}
                                    </span>
                                    @if($item->auto_renew)
                                        <span class="text-[10px] font-bold text-emerald-700 flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Auto-Renew ON
                                        </span>
                                    @endif
                                </div>

                                <!-- Full Notes Display (No Truncation) -->
                                @if($item->notes)
                                    <div class="text-[11px] text-slate-600 mt-2 leading-relaxed bg-slate-50 p-2.5 rounded-xl border border-slate-200/60">
                                        {{ $item->notes }}
                                    </div>
                                @endif
                            </td>

                            <!-- Provider / Registrar & Portal Button -->
                            <td class="py-4 px-5">
                                <div class="font-bold text-xs text-slate-900 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                    <span>{{ $item->provider }}</span>
                                </div>
                                <div class="mt-1.5">
                                    <a href="{{ $item->portal_url }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#2563eb] hover:underline">
                                        <span>Buka Konsol {{ $item->provider }}</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </td>

                            <!-- Expiry Date & Urgency Countdown (Crisp Tabular Typography) -->
                            <td class="py-4 px-5">
                                <div class="mono text-xs font-bold text-slate-900">
                                    {{ \Carbon\Carbon::parse($item->expiry_date)->translatedFormat('d F Y') }}
                                </div>
                                <div class="mt-1.5">
                                    @if($urgency === 'expired')
                                        <span class="px-2.5 py-1 rounded-md bg-rose-100 text-rose-800 border border-rose-200 font-bold text-[10px] inline-flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span> Kedaluwarsa ({{ abs($days) }} Hari Lalu)
                                        </span>
                                    @elseif($urgency === 'critical')
                                        <span class="px-2.5 py-1 rounded-md bg-rose-50 text-rose-700 border border-rose-300 font-extrabold text-[10px] inline-flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-600 animate-ping"></span> {{ $days === 0 ? 'Hari Ini Expired!' : $days . ' Hari Lagi!' }}
                                        </span>
                                    @elseif($urgency === 'warning')
                                        <span class="px-2.5 py-1 rounded-md bg-amber-50 text-amber-800 border border-amber-200 font-bold text-[10px] inline-flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{ $days }} Hari Lagi
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold text-[10px] inline-flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> {{ $days }} Hari Lagi
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <!-- Client Info & WhatsApp Reminder (Calm Dignified Emerald Button) -->
                            <td class="py-4 px-5">
                                <div class="font-extrabold text-xs text-slate-900">
                                    {{ $item->client_name ?: 'Internal BTD' }}
                                </div>
                                @if($item->client_whatsapp)
                                    <div class="text-[11px] mono text-slate-600 mt-0.5">
                                        {{ $item->client_whatsapp }}
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ $item->whatsapp_url }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 font-bold text-[11px] transition-all">
                                            <span>💬</span>
                                            <span>Kirim WA Tagihan</span>
                                        </a>
                                    </div>
                                @else
                                    <span class="text-[11px] text-slate-400 italic block mt-0.5">Tidak ada kontak</span>
                                @endif
                            </td>

                            <!-- Renewal Price -->
                            <td class="py-4 px-5">
                                <div class="font-bold text-xs text-slate-900 mono">
                                    {{ $item->formatted_price }}
                                </div>
                                <div class="text-[10px] text-slate-500 capitalize mt-0.5">
                                    per {{ str_replace('_', ' ', $item->billing_cycle) }}
                                </div>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5 whitespace-nowrap">
                                    
                                    <!-- 1-Click Renew +1 Year -->
                                    <form action="{{ route('admin.domain-renewals.renew-one-year', $item->id) }}" method="POST" onsubmit="return confirm('Perpanjang masa aktif {{ $item->domain_name }} selama 1 tahun ke depan?');" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                title="Perpanjang Cepat +1 Tahun"
                                                class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200/70 font-bold text-xs shadow-2xs transition-all">
                                            <span>⚡ +1 Thn</span>
                                        </button>
                                    </form>

                                    <!-- Edit Button -->
                                    <button type="button"
                                            @click="openEditModal({{ json_encode($item) }})"
                                            title="Edit Data"
                                            class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] border border-blue-200/70 font-bold text-xs shadow-2xs transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <span>Edit</span>
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.domain-renewals.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus aset {{ $item->domain_name }} dari sistem pelacak?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Hapus Aset"
                                                class="whitespace-nowrap inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/70 font-bold text-xs shadow-2xs transition-all">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="text-3xl mb-2">🌐</div>
                                <div class="font-bold text-slate-600">Tidak ada data domain atau hosting pada filter ini.</div>
                                <p class="text-xs text-slate-400 mt-1">Klik tombol "+ Tambah Domain / Hosting" untuk menambahkan aset baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($domains->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $domains->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Form (Tambah / Edit Domain) with Alpine.js -->
    <div x-show="modalOpen" 
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs"
         x-transition.opacity>
        
        <div @click.away="modalOpen = false" 
             class="bg-white rounded-2xl max-w-2xl w-full p-6 sm:p-8 shadow-xl border border-slate-200 max-h-[90vh] overflow-y-auto space-y-5"
             x-transition.scale>
            
            <div class="flex items-center justify-between border-b border-slate-100 pb-3.5">
                <div>
                    <h3 class="text-lg font-extrabold text-[#071330]" x-text="isEdit ? 'Edit Aset Domain & Hosting' : 'Tambah Domain & Hosting Baru'"></h3>
                    <p class="text-xs text-slate-500 mt-0.5">Catat informasi masa aktif, nama registrar, dan biaya perpanjangan.</p>
                </div>
                <button @click="modalOpen = false" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form :action="formAction" method="POST" class="space-y-4">
                @csrf
                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    
                    <!-- Domain Name -->
                    <div class="space-y-1 sm:col-span-2">
                        <label class="text-xs font-bold text-slate-800">Nama Domain / Hostname *</label>
                        <input type="text" 
                               name="domain_name" 
                               x-model="form.domain_name" 
                               required 
                               placeholder="contoh: smartverse.id / domainklien.com" 
                               class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 font-semibold focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                    </div>

                    <!-- Provider / Registrar -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-800">Provider / Registrar *</label>
                        <input list="provider-suggestions" 
                               name="provider" 
                               x-model="form.provider" 
                               required 
                               placeholder="Ketik atau pilih provider" 
                               class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 font-semibold focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                        <datalist id="provider-suggestions">
                            <option value="Spaceship">
                            <option value="Rumahweb">
                            <option value="IDwebhost">
                            <option value="Porkbun">
                            <option value="GoDaddy">
                            <option value="Webnesia">
                            <option value="Domainesia">
                            <option value="Niagahoster">
                            <option value="Cloudflare">
                            <option value="Hostinger">
                            <option value="Dewabiz">
                            <option value="Jagoweb">
                        </datalist>
                    </div>

                    <!-- Service Type -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-800">Jenis Layanan *</label>
                        <select name="service_type" x-model="form.service_type" required class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 font-semibold focus:ring-2 focus:ring-[#2563eb] focus:outline-none">
                            <option value="domain">Domain Saja (TLD)</option>
                            <option value="hosting">Cloud / cPanel Hosting</option>
                            <option value="vps">Cloud VPS / Dedicated Server</option>
                            <option value="combo">Paket Domain + Hosting</option>
                            <option value="ssl">SSL Certificate Khusus</option>
                        </select>
                    </div>

                    <!-- Registration Date -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-600">Tanggal Registrasi</label>
                        <input type="date" name="registration_date" x-model="form.registration_date" class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 font-semibold focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                    </div>

                    <!-- Expiry Date -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-rose-700">Tanggal Kedaluwarsa (Expired) *</label>
                        <input type="date" name="expiry_date" x-model="form.expiry_date" required class="w-full px-3.5 py-2 rounded-xl border border-rose-300 bg-rose-50/20 text-xs text-rose-900 font-bold focus:ring-2 focus:ring-rose-500 focus:outline-none" />
                    </div>

                    <!-- Renewal Price -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-800">Biaya Perpanjangan *</label>
                        <div class="flex items-center gap-2">
                            <select name="currency" x-model="form.currency" class="w-24 px-3 py-2 rounded-xl border border-slate-200 text-xs font-bold text-slate-800 focus:outline-none">
                                <option value="IDR">IDR (Rp)</option>
                                <option value="USD">USD ($)</option>
                            </select>
                            <input type="number" step="any" min="0" name="renewal_price" x-model="form.renewal_price" required placeholder="150000" class="flex-1 px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 mono font-bold focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                        </div>
                    </div>

                    <!-- Billing Cycle -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-800">Siklus Tagihan *</label>
                        <select name="billing_cycle" x-model="form.billing_cycle" required class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 font-semibold focus:ring-2 focus:ring-[#2563eb] focus:outline-none">
                            <option value="yearly">1 Tahun (Tahunan)</option>
                            <option value="2_years">2 Tahun</option>
                            <option value="3_years">3 Tahun</option>
                            <option value="monthly">Bulanan</option>
                        </select>
                    </div>

                    <!-- Client Association -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-800">Nama Klien / Lembaga / Proyek</label>
                        <input type="text" name="client_name" x-model="form.client_name" placeholder="contoh: Dinas Kominfo / PB Samudra" class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 font-semibold focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                    </div>

                    <!-- Client WhatsApp -->
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-emerald-800">Nomor WA Klien (Pengingat Tagihan)</label>
                        <input type="text" name="client_whatsapp" x-model="form.client_whatsapp" placeholder="08xxxxxxxxxx" class="w-full px-3.5 py-2 rounded-xl border border-emerald-300 bg-emerald-50/20 text-xs text-emerald-900 mono font-bold focus:ring-2 focus:ring-emerald-500 focus:outline-none" />
                    </div>

                    <!-- Direct Login URL -->
                    <div class="space-y-1 sm:col-span-2">
                        <label class="text-xs font-bold text-slate-600">Link Login Konsol Provider (Opsional)</label>
                        <input type="url" name="login_url" x-model="form.login_url" placeholder="https://clientzone.rumahweb.com / https://spaceship.com" class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-900 mono focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                    </div>

                    <!-- Nameservers -->
                    <div class="space-y-1 sm:col-span-2">
                        <label class="text-xs font-bold text-slate-600">Nameservers / DNS</label>
                        <input type="text" name="nameservers" x-model="form.nameservers" placeholder="contoh: ns1.rumahweb.com, ns2.rumahweb.com" class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-800 mono focus:ring-2 focus:ring-[#2563eb] focus:outline-none" />
                    </div>

                    <!-- Notes -->
                    <div class="space-y-1 sm:col-span-2">
                        <label class="text-xs font-bold text-slate-600">Catatan Khusus (Akun Pembelian / Invoice Ref)</label>
                        <textarea name="notes" x-model="form.notes" rows="2" placeholder="Catatan email akun registrar atau nomor invoice..." class="w-full px-3.5 py-2 rounded-xl border border-slate-200 text-xs text-slate-800 focus:ring-2 focus:ring-[#2563eb] focus:outline-none"></textarea>
                    </div>

                    <!-- Auto-Renew Checkbox -->
                    <div class="sm:col-span-2">
                        <label class="flex items-center gap-2.5 p-3 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer">
                            <input type="checkbox" name="auto_renew" value="1" x-model="form.auto_renew" class="rounded text-[#2563eb] focus:ring-[#2563eb] w-4 h-4">
                            <div class="text-xs font-bold text-slate-800">
                                Aktifkan Status Auto-Renew (Perpanjangan Otomatis via Saldo / Kartu)
                            </div>
                        </label>
                    </div>

                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-2.5">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">
                        Batal
                    </button>
                    <button type="submit" 
                            style="background-color: #2563eb !important; color: #ffffff !important;"
                            class="px-5 py-2 rounded-xl font-bold text-xs uppercase tracking-wider shadow-xs hover:brightness-110 transition-all">
                        <span style="color: #ffffff !important;" x-text="isEdit ? 'Simpan Perubahan' : 'Tambahkan Aset'"></span>
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

<script>
function domainManager() {
    return {
        modalOpen: false,
        isEdit: false,
        formAction: '{{ route("admin.domain-renewals.store") }}',
        form: {
            id: null,
            domain_name: '',
            provider: 'Spaceship',
            service_type: 'domain',
            registration_date: '',
            expiry_date: '',
            renewal_price: 150000,
            currency: 'IDR',
            billing_cycle: 'yearly',
            auto_renew: false,
            nameservers: '',
            client_name: '',
            client_whatsapp: '',
            login_url: '',
            notes: ''
        },
        openCreateModal() {
            this.isEdit = false;
            this.formAction = '{{ route("admin.domain-renewals.store") }}';
            this.form = {
                id: null,
                domain_name: '',
                provider: 'Spaceship',
                service_type: 'domain',
                registration_date: '',
                expiry_date: '',
                renewal_price: 150000,
                currency: 'IDR',
                billing_cycle: 'yearly',
                auto_renew: false,
                nameservers: '',
                client_name: '',
                client_whatsapp: '',
                login_url: '',
                notes: ''
            };
            this.modalOpen = true;
        },
        openEditModal(item) {
            this.isEdit = true;
            this.formAction = '/admin/domain-renewals/' + item.id;
            this.form = {
                id: item.id,
                domain_name: item.domain_name || '',
                provider: item.provider || 'Spaceship',
                service_type: item.service_type || 'domain',
                registration_date: item.registration_date ? item.registration_date.substring(0, 10) : '',
                expiry_date: item.expiry_date ? item.expiry_date.substring(0, 10) : '',
                renewal_price: item.renewal_price || 0,
                currency: item.currency || 'IDR',
                billing_cycle: item.billing_cycle || 'yearly',
                auto_renew: !!item.auto_renew,
                nameservers: item.nameservers || '',
                client_name: item.client_name || '',
                client_whatsapp: item.client_whatsapp || '',
                login_url: item.login_url || '',
                notes: item.notes || ''
            };
            this.modalOpen = true;
        }
    };
}
</script>
@endsection
