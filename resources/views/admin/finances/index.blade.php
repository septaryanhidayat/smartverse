@extends('admin.layouts.app')

@section('title', 'Analisa Keuangan Lembaga & Kas BTD')

@section('content')
<div class="space-y-6" x-data="{ 
    createModalOpen: false, 
    editModalOpen: false,
    editData: {
        id: '',
        type: 'expense',
        category: 'office_ops',
        title: '',
        amount: '',
        transaction_date: '{{ date('Y-m-d') }}',
        payment_method: 'Transfer Bank Mandiri',
        reference_number: '',
        notes: ''
    }
}">

    <!-- EXECUTIVE HEADER: Solid Navy (#071330), Ultra-High Contrast -->
    <div style="background: #071330 !important; border: 2px solid #334155 !important; border-radius: 24px; padding: 24px; color: #ffffff !important;" 
         class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 shadow-xl relative overflow-hidden">
        
        <div class="relative z-10 space-y-1.5 max-w-3xl">
            <div class="flex flex-wrap items-center gap-2.5">
                <span style="background: rgba(16, 185, 129, 0.2) !important; border: 1.5px solid #10b981 !important; color: #a7f3d0 !important; padding: 3px 12px; border-radius: 9999px;" 
                      class="text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span> Financial Intelligence
                </span>
                <span class="px-3 py-1 rounded-full bg-slate-800 text-slate-300 text-[10px] font-bold border border-slate-700">
                    Periode: {{ $periodLabel }}
                </span>
                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold border {{ $healthBadge }}">
                    {{ $healthIcon }} {{ $healthStatus }}
                </span>
            </div>
            <h1 style="color: #ffffff !important;" class="text-2xl lg:text-3xl font-black tracking-tight flex items-center gap-2">
                Analisa Keuangan Lembaga & Kas BTD
            </h1>
            <p style="color: #cbd5e1 !important;" class="text-xs lg:text-sm font-medium leading-relaxed">
                Pusat data arus kas masuk dari faktur invoice proyek, pencatatan beban operasional lembaga, visualisasi margin laba bersih, serta pertimbangan strategis bagi pengambil kebijakan SmartVerse (smartverse.id).
            </p>
        </div>

        <div class="relative z-10 flex flex-wrap items-center gap-2.5 shrink-0">
            <!-- Period Filter Dropdown / Tabs -->
            <div style="background: rgba(255, 255, 255, 0.08) !important; border: 1px solid rgba(255, 255, 255, 0.15) !important; border-radius: 16px; padding: 4px;" 
                 class="flex items-center gap-1">
                <a href="{{ route('admin.finances.index', ['period' => 'this_month']) }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $period === 'this_month' ? 'bg-[#3E5CE7] text-white shadow-md' : 'text-slate-300 hover:text-white' }}">
                    Bulan Ini
                </a>
                <a href="{{ route('admin.finances.index', ['period' => 'last_month']) }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $period === 'last_month' ? 'bg-[#3E5CE7] text-white shadow-md' : 'text-slate-300 hover:text-white' }}">
                    Bulan Lalu
                </a>
                <a href="{{ route('admin.finances.index', ['period' => 'this_year']) }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $period === 'this_year' ? 'bg-[#3E5CE7] text-white shadow-md' : 'text-slate-300 hover:text-white' }}">
                    Tahun Ini
                </a>
                <a href="{{ route('admin.finances.index', ['period' => 'all']) }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all {{ $period === 'all' ? 'bg-[#3E5CE7] text-white shadow-md' : 'text-slate-300 hover:text-white' }}">
                    Semua
                </a>
            </div>

            <!-- Action Buttons -->
            <button @click="createModalOpen = true" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:shadow-emerald-600/30 transition-all flex items-center gap-1.5">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span>+ Catat Transaksi</span>
            </button>

            <a href="{{ route('admin.finances.print', ['period' => $period]) }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white font-bold text-xs uppercase tracking-wider border border-slate-600 shadow-xs transition-all flex items-center gap-1.5">
                <span>🖨️ Cetak Laporan</span>
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

    <!-- 4 CORE EXECUTIVE FINANCIAL METRIC CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- 1. Total Kas Masuk (Inflow) -->
        <div class="bg-white p-5 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Kas Masuk (Riil)</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg shadow-2xs">
                    💰
                </div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-slate-900 mono tracking-tight">
                    Rp {{ number_format($totalCashInflow, 0, ',', '.') }}
                </div>
                <div class="text-[11px] text-slate-500 font-medium mt-1 flex items-center justify-between">
                    <span>Invoice Lunas: <strong>Rp {{ number_format($invoiceTotalPaid, 0, ',', '.') }}</strong></span>
                    @if($manualIncome > 0)
                        <span>Kas Lain: <strong>Rp {{ number_format($manualIncome, 0, ',', '.') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>

        <!-- 2. Total Beban Pengeluaran (Outflow) -->
        <div class="bg-white p-5 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Beban Pengeluaran</span>
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-lg shadow-2xs">
                    💸
                </div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-rose-600 mono tracking-tight">
                    Rp {{ number_format($totalExpenses, 0, ',', '.') }}
                </div>
                <div class="text-[11px] text-slate-500 font-medium mt-1 flex items-center justify-between">
                    <span>Rasio Beban: <strong class="mono">{{ $expenseRatio }}%</strong> dari omset</span>
                    <span>Server, AI, Tim & Ops</span>
                </div>
            </div>
        </div>

        <!-- 3. Laba Bersih Operasional & Margin -->
        <div class="bg-white p-5 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Laba Bersih Operasional</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg shadow-2xs">
                    📈
                </div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black {{ $netProfit >= 0 ? 'text-blue-700' : 'text-rose-600' }} mono tracking-tight">
                    Rp {{ number_format($netProfit, 0, ',', '.') }}
                </div>
                <div class="text-[11px] text-slate-500 font-medium mt-1 flex items-center justify-between">
                    <span>Margin Bersih: <strong class="text-slate-800 mono font-extrabold">{{ $profitMargin }}%</strong></span>
                    <span class="px-2 py-0.5 rounded-full {{ $netProfit >= 0 ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }} font-bold text-[10px]">
                        {{ $netProfit >= 0 ? 'Surplus Kas' : 'Defisit' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- 4. Piutang Invoice Belum Lunas (Receivables) -->
        <div class="bg-white p-5 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-3 relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Piutang Klien (Unpaid Invoices)</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-lg shadow-2xs">
                    ⏳
                </div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl font-black text-amber-700 mono tracking-tight">
                    Rp {{ number_format($invoiceTotalRemaining, 0, ',', '.') }}
                </div>
                <div class="text-[11px] text-slate-500 font-medium mt-1 flex items-center justify-between">
                    <span>Tagihan Belum Lunas: <strong>{{ $invoiceUnpaidCount + $invoicePartialCount }} invoice</strong></span>
                    <a href="{{ route('admin.invoices.index') }}" class="text-[#3E5CE7] hover:underline font-bold">Faktur &rarr;</a>
                </div>
            </div>
        </div>

    </div>

    <!-- STRATEGIC POLICY MAKER CONSIDERATIONS (Pertimbangan Pengambil Kebijakan Keuangan BTD) -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 border-2 border-slate-300 shadow-sm space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b-2 border-slate-100 pb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 border-2 border-amber-300 text-amber-800 flex items-center justify-center text-xl shrink-0 shadow-xs">
                    💡
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <h3 class="text-base font-black text-slate-900">
                            Pertimbangan & Rekomendasi Pengambil Kebijakan Keuangan BTD
                        </h3>
                        <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-900 text-[10px] font-black border border-amber-300 uppercase tracking-wider">
                            Executive Directive
                        </span>
                    </div>
                    <p class="text-xs text-slate-600 font-semibold mt-0.5">Analisis otomatis berbasis data kas riil untuk mendukung keputusan jajaran direksi & pimpinan</p>
                </div>
            </div>
            <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                <span class="text-xs font-bold text-slate-500">Status Kas:</span>
                <span class="px-2.5 py-1 rounded-lg bg-slate-100 border border-slate-300 text-slate-800 font-extrabold text-xs mono">
                    {{ $healthStatus }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($policyInsights as $index => $insight)
                @php
                    $cardTheme = match($index) {
                        0 => ['bg' => 'bg-amber-50/80', 'border' => 'border-amber-300', 'title' => 'text-amber-950', 'text' => 'text-slate-800'],
                        1 => ['bg' => 'bg-rose-50/80', 'border' => 'border-rose-300', 'title' => 'text-rose-950', 'text' => 'text-slate-800'],
                        default => ['bg' => 'bg-blue-50/80', 'border' => 'border-blue-300', 'title' => 'text-blue-950', 'text' => 'text-slate-800'],
                    };
                @endphp
                <div class="p-4 rounded-xl {{ $cardTheme['bg'] }} border-2 {{ $cardTheme['border'] }} shadow-xs space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">{{ $insight['icon'] }}</span>
                        <span class="font-black text-xs sm:text-sm {{ $cardTheme['title'] }}">{{ $insight['title'] }}</span>
                    </div>
                    <p class="text-xs {{ $cardTheme['text'] }} leading-relaxed font-medium">
                        {{ $insight['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- VISUAL CHARTS ROW: Monthly Cash Flow Trend (8 Cols) & Expense Breakdown (4 Cols) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- Left: Dual-Bar Monthly Cash Flow Chart (8 cols) -->
        <div class="lg:col-span-8 bg-white p-5 sm:p-6 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-100 pb-3.5">
                <div>
                    <h3 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                        <span>📊</span>
                        <span>Tren Arus Kas Bulanan (12 Bulan Terakhir)</span>
                    </h3>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">Perbandingan Pemasukan (Kas + Invoice Paid), Pengeluaran, dan Laba Bersih</p>
                </div>
                <div class="flex items-center gap-4 text-xs font-extrabold">
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        <span class="text-slate-700">Pemasukan</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                        <span class="text-slate-700">Pengeluaran</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-blue-600"></span>
                        <span class="text-slate-700">Laba Bersih</span>
                    </div>
                </div>
            </div>

            <div class="relative w-full h-[320px]">
                <canvas id="cashFlowTrendChart"></canvas>
            </div>
        </div>

        <!-- Right: Expense Distribution Donut Chart (4 cols) -->
        <div class="lg:col-span-4 bg-white p-5 sm:p-6 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-4">
            <div class="border-b border-slate-100 pb-3.5">
                <h3 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                    <span>🎯</span>
                    <span>Alokasi Pos Pengeluaran</span>
                </h3>
                <p class="text-xs text-slate-400 font-medium mt-0.5">Proporsi pembagian biaya pada periode ini</p>
            </div>

            <div class="relative w-full h-[220px] flex items-center justify-center">
                @if(array_sum($expenseBreakdown) > 0)
                    <canvas id="expenseDonutChart"></canvas>
                @else
                    <div class="text-center text-xs text-slate-400 py-10">
                        Belum ada data pengeluaran tercatat pada periode ini.
                    </div>
                @endif
            </div>

            <!-- Categories Legend List -->
            <div class="space-y-2 pt-2 border-t border-slate-100 text-xs font-medium">
                @forelse($expenseBreakdown as $catName => $catVal)
                    <div class="flex items-center justify-between">
                        <span class="text-slate-600 truncate">{{ $catName }}</span>
                        <span class="font-bold text-slate-900 mono">Rp {{ number_format($catVal, 0, ',', '.') }}</span>
                    </div>
                @empty
                    <div class="text-slate-400 text-center text-xs">Kosong</div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- INVOICE REVENUE SUMMARY CARD -->
    <div class="bg-white p-5 sm:p-6 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-100 pb-3">
            <div>
                <h3 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                    <span>🧾</span>
                    <span>Ringkasan Integrasi Penagihan Faktur Invoice</span>
                </h3>
                <p class="text-xs text-slate-400 font-medium">Data transaksi proyek klien yang langsung ditarik dari modul Invoice resmi BTD</p>
            </div>
            <a href="{{ route('admin.invoices.index') }}" class="px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-[#3E5CE7] hover:text-white text-xs font-bold text-slate-700 transition-all flex items-center gap-1.5 self-start sm:self-auto">
                <span>Buka Modul Invoice & Faktur</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-1">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Tagihan Terbit</span>
                <div class="text-xl font-black text-slate-900 mono">Rp {{ number_format($invoiceTotalBilled, 0, ',', '.') }}</div>
                <div class="text-[10px] text-slate-400">{{ $invoices->count() }} invoice keseluruhan</div>
            </div>

            <div class="p-4 rounded-xl bg-emerald-50/60 border border-emerald-200 space-y-1">
                <span class="text-[11px] font-bold text-emerald-800 uppercase tracking-wider">Realisasi Lunas (Kas Masuk)</span>
                <div class="text-xl font-black text-emerald-700 mono">Rp {{ number_format($invoiceTotalPaid, 0, ',', '.') }}</div>
                <div class="text-[10px] text-emerald-600 font-semibold">{{ $invoicePaidCount }} invoice lunas penuh</div>
            </div>

            <div class="p-4 rounded-xl bg-amber-50/60 border border-amber-200 space-y-1">
                <span class="text-[11px] font-bold text-amber-800 uppercase tracking-wider">Sisa Piutang Tertahan</span>
                <div class="text-xl font-black text-amber-700 mono">Rp {{ number_format($invoiceTotalRemaining, 0, ',', '.') }}</div>
                <div class="text-[10px] text-amber-600 font-semibold">{{ $invoiceUnpaidCount + $invoicePartialCount }} invoice menunggu pelunasan</div>
            </div>

            <div class="p-4 rounded-xl bg-blue-50/60 border border-blue-200 space-y-1">
                <span class="text-[11px] font-bold text-blue-800 uppercase tracking-wider">Tingkat Penagihan (Collection Rate)</span>
                <div class="text-xl font-black text-blue-700 mono">
                    {{ $invoiceTotalBilled > 0 ? round(($invoiceTotalPaid / $invoiceTotalBilled) * 100, 1) : 0 }}%
                </div>
                <div class="text-[10px] text-blue-600 font-semibold">Efektivitas realisasi tagihan</div>
            </div>
        </div>
    </div>

    <!-- FINANCIAL LEDGER / BUKU KAS TRANSAKSI TABLE -->
    <div class="bg-white p-5 sm:p-6 rounded-2xl border-2 border-slate-200/90 shadow-2xs space-y-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                    <span>📖</span>
                    <span>Buku Kas & Riwayat Transaksi Lembaga</span>
                </h3>
                <p class="text-xs text-slate-400 font-medium">Daftar lengkap transaksi kas masuk & beban biaya operasional</p>
            </div>

            <!-- Search & Filters Form -->
            <form action="{{ route('admin.finances.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
                <input type="hidden" name="period" value="{{ $period }}" />
                
                <div class="relative">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari transaksi..." class="pl-8 pr-3 py-1.5 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none w-44" />
                    <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <select name="type" onchange="this.form.submit()" class="px-3 py-1.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-700 focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                    <option value="all" {{ $typeFilter === 'all' ? 'selected' : '' }}>Semua Tipe</option>
                    <option value="income" {{ $typeFilter === 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="expense" {{ $typeFilter === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                </select>

                <select name="category" onchange="this.form.submit()" class="px-3 py-1.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-700 focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                    <option value="all" {{ $categoryFilter === 'all' ? 'selected' : '' }}>Semua Kategori</option>
                    <option value="server_hosting" {{ $categoryFilter === 'server_hosting' ? 'selected' : '' }}>Server & Cloud</option>
                    <option value="ai_tools" {{ $categoryFilter === 'ai_tools' ? 'selected' : '' }}>Lisensi AI & Tools</option>
                    <option value="salary_honor" {{ $categoryFilter === 'salary_honor' ? 'selected' : '' }}>Honor Tim & Dev</option>
                    <option value="office_ops" {{ $categoryFilter === 'office_ops' ? 'selected' : '' }}>Operasional Kantor</option>
                    <option value="marketing_ads" {{ $categoryFilter === 'marketing_ads' ? 'selected' : '' }}>Marketing & Iklan</option>
                    <option value="transport_meeting" {{ $categoryFilter === 'transport_meeting' ? 'selected' : '' }}>Transport Klien</option>
                    <option value="project_direct" {{ $categoryFilter === 'project_direct' ? 'selected' : '' }}>Proyek Jasa Langsung</option>
                    <option value="training_workshop" {{ $categoryFilter === 'training_workshop' ? 'selected' : '' }}>Pelatihan & Workshop</option>
                    <option value="maintenance" {{ $categoryFilter === 'maintenance' ? 'selected' : '' }}>Retainer Maintenance</option>
                </select>

                @if($search || $typeFilter !== 'all' || $categoryFilter !== 'all')
                    <a href="{{ route('admin.finances.index', ['period' => $period]) }}" class="px-2.5 py-1.5 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 text-xs font-bold transition-colors">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[9px] tracking-wider border-b border-slate-200">
                        <th class="py-2.5 px-3 text-center">Tanggal</th>
                        <th class="py-2.5 px-3">Tipe & Kategori</th>
                        <th class="py-2.5 px-3">Keterangan / Transaksi</th>
                        <th class="py-2.5 px-3">Metode & Ref</th>
                        <th class="py-2.5 px-3 text-right">Nominal (Rp)</th>
                        <th class="py-2.5 px-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-xs">
                    @forelse($records as $rec)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3 px-3 text-center whitespace-nowrap">
                                <span class="font-bold text-slate-800 mono">{{ $rec->transaction_date->format('d/m/Y') }}</span>
                                <div class="text-[10px] text-slate-400">{{ $rec->transaction_date->diffForHumans() }}</div>
                            </td>
                            <td class="py-3 px-3 whitespace-nowrap">
                                @if($rec->type === 'income')
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px] border border-emerald-200 inline-flex items-center gap-1">
                                        <span>+ Masuk</span>
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full bg-rose-50 text-rose-700 font-extrabold text-[10px] border border-rose-200 inline-flex items-center gap-1">
                                        <span>- Beban</span>
                                    </span>
                                @endif
                                <div class="text-[11px] font-bold text-slate-600 mt-1">
                                    {{ \App\Models\FinancialRecord::getCategoryLabel($rec->category) }}
                                </div>
                            </td>
                            <td class="py-3 px-3 min-w-[200px]">
                                <div class="font-bold text-[#071330]">{{ $rec->title }}</div>
                                @if($rec->notes)
                                    <div class="text-[11px] text-slate-400 font-normal line-clamp-1 mt-0.5">{{ $rec->notes }}</div>
                                @endif
                            </td>
                            <td class="py-3 px-3 whitespace-nowrap text-slate-600">
                                <div class="font-semibold text-slate-700">{{ $rec->payment_method }}</div>
                                @if($rec->reference_number)
                                    <div class="text-[10px] text-slate-400 mono">Ref: {{ $rec->reference_number }}</div>
                                @endif
                            </td>
                            <td class="py-3 px-3 text-right whitespace-nowrap font-black mono text-sm {{ $rec->type === 'income' ? 'text-emerald-700' : 'text-rose-600' }}">
                                {{ $rec->type === 'income' ? '+' : '-' }} Rp {{ number_format($rec->amount, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-3 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center gap-1">
                                    <!-- Edit Button -->
                                    <button @click="
                                        editData = {
                                            id: '{{ $rec->id }}',
                                            type: '{{ $rec->type }}',
                                            category: '{{ $rec->category }}',
                                            title: '{{ addslashes($rec->title) }}',
                                            amount: '{{ $rec->amount }}',
                                            transaction_date: '{{ $rec->transaction_date->format('Y-m-d') }}',
                                            payment_method: '{{ addslashes($rec->payment_method) }}',
                                            reference_number: '{{ addslashes($rec->reference_number ?? '') }}',
                                            notes: '{{ addslashes($rec->notes ?? '') }}'
                                        };
                                        editModalOpen = true;
                                    " class="p-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit Transaksi">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.finances.destroy', $rec->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus catatan transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition-colors" title="Hapus Transaksi">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-xs text-slate-400">
                                Belum ada riwayat transaksi kas pada periode atau filter yang dipilih.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pt-3 border-t border-slate-100">
            {{ $records->links() }}
        </div>
    </div>

    <!-- MODAL 1: CREATE TRANSACTION MODAL -->
    <div x-show="createModalOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs"
         x-transition.opacity>
        
        <div @click.away="createModalOpen = false" 
             class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-7 shadow-2xl border border-slate-200 space-y-5 overflow-y-auto max-h-[90vh]">
            
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <span class="text-xl">✍️</span>
                    <h3 class="text-base font-extrabold text-[#071330]">Catat Transaksi Kas Lembaga Baru</h3>
                </div>
                <button @click="createModalOpen = false" class="text-slate-400 hover:text-slate-600 text-lg">&times;</button>
            </div>

            <form action="{{ route('admin.finances.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Type Selector -->
                <div class="grid grid-cols-2 gap-3">
                    <label class="p-3 rounded-2xl border-2 cursor-pointer text-center font-bold text-xs flex items-center justify-center gap-2 transition-all has-checked:border-emerald-600 has-checked:bg-emerald-50 has-checked:text-emerald-800 border-slate-200">
                        <input type="radio" name="type" value="income" class="hidden" />
                        <span>💰 Pemasukan (Kas Masuk)</span>
                    </label>

                    <label class="p-3 rounded-2xl border-2 cursor-pointer text-center font-bold text-xs flex items-center justify-center gap-2 transition-all has-checked:border-rose-600 has-checked:bg-rose-50 has-checked:text-rose-800 border-slate-200" checked>
                        <input type="radio" name="type" value="expense" class="hidden" checked />
                        <span>💸 Beban Pengeluaran</span>
                    </label>
                </div>

                <!-- Category & Amount -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Kategori Transaksi *</label>
                        <select name="category" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                            <optgroup label="Pengeluaran / Beban Operasional">
                                <option value="server_hosting">Server VPS & Cloud Hosting</option>
                                <option value="ai_tools">Lisensi AI, API & Dev Tools</option>
                                <option value="salary_honor">Honor Developer & Tim</option>
                                <option value="office_ops">Operasional Kantor & Listrik/Net</option>
                                <option value="marketing_ads">Pemasaran & Iklan Medsos</option>
                                <option value="transport_meeting">Transport & Meeting Klien</option>
                                <option value="tax_legal">Pajak, Notaris & Legalitas</option>
                                <option value="equipment">Peralatan Hardware & Aset</option>
                            </optgroup>
                            <optgroup label="Pemasukan Lainnya">
                                <option value="project_direct">Proyek Jasa Langsung</option>
                                <option value="training_workshop">Workshop & Pelatihan IT</option>
                                <option value="consultation">Konsultasi Software</option>
                                <option value="maintenance">Retainer & Maintenance</option>
                                <option value="other">Lain-lain</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Nominal Transaksi (Rp) *</label>
                        <input type="number" name="amount" min="0" step="1000" placeholder="1500000" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <!-- Title / Description -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Keterangan / Nama Transaksi *</label>
                    <input type="text" name="title" placeholder="Contoh: Sewa Server VPS Bulanan Hostinger & Backup" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <!-- Date & Payment Method -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Tanggal Transaksi *</label>
                        <input type="date" name="transaction_date" value="{{ date('Y-m-d') }}" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Metode Pembayaran *</label>
                        <select name="payment_method" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                            <option value="Transfer Bank Mandiri">Transfer Bank Mandiri</option>
                            <option value="Transfer Bank BCA">Transfer Bank BCA</option>
                            <option value="Transfer Bank BSI">Transfer Bank BSI</option>
                            <option value="Transfer Bank Sumsel Babel">Transfer Bank Sumsel Babel</option>
                            <option value="Kartu Kredit / Visa">Kartu Kredit / Visa</option>
                            <option value="ShopeePay / E-Wallet">ShopeePay / E-Wallet</option>
                            <option value="Kas Tunai">Kas Tunai</option>
                        </select>
                    </div>
                </div>

                <!-- Reference Number & Receipt Upload -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Nomor Referensi / Kwitansi</label>
                        <input type="text" name="reference_number" placeholder="Contoh: INV-SRV-09" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Bukti Struk / Nota (Opsional)</label>
                        <input type="file" name="receipt_file" accept="image/*,.pdf" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-bold file:bg-blue-50 file:text-[#3E5CE7]" />
                    </div>
                </div>

                <!-- Notes -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Catatan Tambahan untuk Pengambil Kebijakan</label>
                    <textarea name="notes" rows="2" placeholder="Catatan opsional untuk pertimbangan evaluasi..." class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" @click="createModalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-md transition-all">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL 2: EDIT TRANSACTION MODAL -->
    <div x-show="editModalOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs"
         x-transition.opacity>
        
        <div @click.away="editModalOpen = false" 
             class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-7 shadow-2xl border border-slate-200 space-y-5 overflow-y-auto max-h-[90vh]">
            
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <span class="text-xl">✏️</span>
                    <h3 class="text-base font-extrabold text-[#071330]">Perbarui Catatan Transaksi Kas</h3>
                </div>
                <button @click="editModalOpen = false" class="text-slate-400 hover:text-slate-600 text-lg">&times;</button>
            </div>

            <form :action="'{{ url('admin/finances') }}/' + editData.id" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Type Selector -->
                <div class="grid grid-cols-2 gap-3">
                    <label class="p-3 rounded-2xl border-2 cursor-pointer text-center font-bold text-xs flex items-center justify-center gap-2 transition-all border-slate-200" :class="editData.type === 'income' ? 'border-emerald-600 bg-emerald-50 text-emerald-800' : ''">
                        <input type="radio" name="type" value="income" x-model="editData.type" class="hidden" />
                        <span>💰 Pemasukan (Kas Masuk)</span>
                    </label>

                    <label class="p-3 rounded-2xl border-2 cursor-pointer text-center font-bold text-xs flex items-center justify-center gap-2 transition-all border-slate-200" :class="editData.type === 'expense' ? 'border-rose-600 bg-rose-50 text-rose-800' : ''">
                        <input type="radio" name="type" value="expense" x-model="editData.type" class="hidden" />
                        <span>💸 Beban Pengeluaran</span>
                    </label>
                </div>

                <!-- Category & Amount -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Kategori Transaksi *</label>
                        <select name="category" x-model="editData.category" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                            <optgroup label="Pengeluaran / Beban Operasional">
                                <option value="server_hosting">Server VPS & Cloud Hosting</option>
                                <option value="ai_tools">Lisensi AI, API & Dev Tools</option>
                                <option value="salary_honor">Honor Developer & Tim</option>
                                <option value="office_ops">Operasional Kantor & Listrik/Net</option>
                                <option value="marketing_ads">Pemasaran & Iklan Medsos</option>
                                <option value="transport_meeting">Transport & Meeting Klien</option>
                                <option value="tax_legal">Pajak, Notaris & Legalitas</option>
                                <option value="equipment">Peralatan Hardware & Aset</option>
                            </optgroup>
                            <optgroup label="Pemasukan Lainnya">
                                <option value="project_direct">Proyek Jasa Langsung</option>
                                <option value="training_workshop">Workshop & Pelatihan IT</option>
                                <option value="consultation">Konsultasi Software</option>
                                <option value="maintenance">Retainer & Maintenance</option>
                                <option value="other">Lain-lain</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Nominal Transaksi (Rp) *</label>
                        <input type="number" name="amount" min="0" step="1000" x-model="editData.amount" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <!-- Title / Description -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Keterangan / Nama Transaksi *</label>
                    <input type="text" name="title" x-model="editData.title" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <!-- Date & Payment Method -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Tanggal Transaksi *</label>
                        <input type="date" name="transaction_date" x-model="editData.transaction_date" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-slate-700">Metode Pembayaran *</label>
                        <input type="text" name="payment_method" x-model="editData.payment_method" required class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <!-- Reference Number -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Nomor Referensi / Kwitansi</label>
                    <input type="text" name="reference_number" x-model="editData.reference_number" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <!-- Notes -->
                <div class="space-y-1">
                    <label class="block text-xs font-bold text-slate-700">Catatan Tambahan</label>
                    <textarea name="notes" rows="2" x-model="editData.notes" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" @click="editModalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-md transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Chart.js CDN for Interactive Visualizations -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Monthly Cash Flow Trend Chart
    const cashFlowCtx = document.getElementById('cashFlowTrendChart');
    if (cashFlowCtx) {
        const labels = @json($chartLabels);
        const incomeData = @json($chartIncomeData);
        const expenseData = @json($chartExpenseData);
        const netProfitData = @json($chartNetProfitData);

        new Chart(cashFlowCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Pemasukan (Inflow)',
                        data: incomeData,
                        backgroundColor: '#10b981',
                        borderRadius: 6,
                        barPercentage: 0.7,
                        categoryPercentage: 0.8,
                    },
                    {
                        label: 'Pengeluaran (Outflow)',
                        data: expenseData,
                        backgroundColor: '#f43f5e',
                        borderRadius: 6,
                        barPercentage: 0.7,
                        categoryPercentage: 0.8,
                    },
                    {
                        type: 'line',
                        label: 'Laba Bersih',
                        data: netProfitData,
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        borderWidth: 2.5,
                        tension: 0.3,
                        pointRadius: 4,
                        pointBackgroundColor: '#2563eb',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#071330',
                        titleColor: '#ffffff',
                        bodyColor: '#e2e8f0',
                        padding: 10,
                        borderRadius: 10,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) label += ': ';
                                if (context.parsed.y !== null) {
                                    label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#64748b', font: { size: 10, weight: '600' } }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9' },
                        ticks: {
                            color: '#64748b',
                            font: { size: 10 },
                            callback: function(value) {
                                if (value >= 1000000) return (value / 1000000).toFixed(1) + ' jt';
                                if (value >= 1000) return (value / 1000).toFixed(0) + ' rb';
                                return value;
                            }
                        }
                    }
                }
            }
        });
    }

    // 2. Expense Breakdown Donut Chart
    const expenseDonutCtx = document.getElementById('expenseDonutChart');
    if (expenseDonutCtx) {
        const breakdownData = @json($expenseBreakdown);
        const donutLabels = Object.keys(breakdownData);
        const donutValues = Object.values(breakdownData);

        new Chart(expenseDonutCtx, {
            type: 'doughnut',
            data: {
                labels: donutLabels,
                datasets: [{
                    data: donutValues,
                    backgroundColor: [
                        '#3E5CE7',
                        '#fe6000',
                        '#10b981',
                        '#8b5cf6',
                        '#06b6d4',
                        '#f59e0b',
                        '#64748b',
                        '#ec4899',
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#071330',
                        titleColor: '#ffffff',
                        bodyColor: '#e2e8f0',
                        padding: 10,
                        borderRadius: 10,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) label += ': ';
                                if (context.parsed !== null) {
                                    label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed);
                                }
                                return label;
                            }
                        }
                    }
                },
                cutout: '68%'
            }
        });
    }
});
</script>
@endsection
