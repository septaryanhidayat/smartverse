<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Eksekutif - {{ $periodLabel }} - SmartVerse (smartverse.id)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0f172a;
            background: #f8fafc;
        }
        .mono {
            font-family: 'JetBrains Mono', monospace;
        }
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .print-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body class="p-4 sm:p-8">

    <!-- Action Bar (Hidden in Print) -->
    <div class="max-w-4xl mx-auto mb-6 flex items-center justify-between no-print">
        <a href="{{ route('admin.finances.index') }}" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-50 transition-colors inline-flex items-center gap-2">
            <span>&larr;</span> Kembali ke Dashboard Finansial
        </a>
        <button onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-[#071330] text-white font-extrabold text-xs uppercase tracking-wider hover:bg-blue-900 transition-all shadow-md inline-flex items-center gap-2">
            <span>🖨️ Cetak Dokumen / Simpan PDF</span>
        </button>
    </div>

    <!-- Official Document Paper -->
    <div class="max-w-4xl mx-auto bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-lg print-container space-y-8">
        
        <!-- Document Header (Kop Surat Resmi) -->
        <div class="flex items-center justify-between border-b-2 border-slate-900 pb-6">
            <div class="flex items-center gap-4">
                <img src="{{ asset($settings['site_logo']->value ?? 'images/Logo-BTD.png') }}" alt="Logo BTD" class="h-16 w-auto object-contain" />
                <div>
                    <h1 class="text-xl font-black text-[#071330] tracking-tight uppercase">
                        {{ $settings['company_name']->value ?? 'SmartVerse (smartverse.id)' }}
                    </h1>
                    <p class="text-xs text-slate-600 font-medium">
                        Software House, Mobile App Development, Enterprise System & AI Solution
                    </p>
                    <p class="text-[11px] text-slate-500 mt-0.5">
                        {{ $settings['company_address']->value ?? 'Jalan Sarjana Blok A No. 25 Timbangan, Ogan Ilir, 30862' }} &bull; {{ $settings['contact_phone']->value ?? '089695249089' }}
                    </p>
                </div>
            </div>
            <div class="text-right">
                <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-[10px] font-black uppercase tracking-wider border border-slate-300">
                    Dokumen Internal
                </span>
                <div class="text-xs text-slate-400 mt-2 font-mono">ID: REP-{{ date('YmdHi') }}</div>
            </div>
        </div>

        <!-- Report Title Banner -->
        <div class="text-center space-y-1">
            <h2 class="text-lg font-black text-[#071330] uppercase tracking-wide">
                Laporan Ringkasan Arus Kas & Analisa Keuangan Lembaga
            </h2>
            <p class="text-xs text-slate-500 font-semibold">
                Periode: <span class="text-slate-900 font-extrabold">{{ $periodLabel }}</span> &bull; Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }} WIB
            </p>
        </div>

        <!-- 1. Executive Summary Metric Table -->
        <div class="space-y-3">
            <h3 class="text-xs font-black text-[#071330] uppercase tracking-wider border-l-4 border-[#3E5CE7] pl-2">
                1. Ringkasan Eksekutif Finansial (Executive Financial KPI)
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="p-3.5 rounded-xl border border-slate-200 bg-slate-50 space-y-1">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Total Kas Masuk (Riil)</span>
                    <div class="text-base font-black text-emerald-700 mono">Rp {{ number_format($totalCashInflow, 0, ',', '.') }}</div>
                    <span class="text-[9px] text-slate-400">Invoice paid & kas jasa</span>
                </div>

                <div class="p-3.5 rounded-xl border border-slate-200 bg-slate-50 space-y-1">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Beban Pengeluaran</span>
                    <div class="text-base font-black text-rose-600 mono">Rp {{ number_format($totalExpenses, 0, ',', '.') }}</div>
                    <span class="text-[9px] text-slate-400">Server, AI, tim & ops</span>
                </div>

                <div class="p-3.5 rounded-xl border border-slate-200 bg-slate-50 space-y-1">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Laba Bersih Operasional</span>
                    <div class="text-base font-black {{ $netProfit >= 0 ? 'text-blue-700' : 'text-rose-600' }} mono">Rp {{ number_format($netProfit, 0, ',', '.') }}</div>
                    <span class="text-[9px] text-slate-500 font-bold">Margin: {{ $profitMargin }}%</span>
                </div>

                <div class="p-3.5 rounded-xl border border-slate-200 bg-slate-50 space-y-1">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Piutang Invoice Tertahan</span>
                    <div class="text-base font-black text-amber-700 mono">Rp {{ number_format($invoiceTotalRemaining, 0, ',', '.') }}</div>
                    <span class="text-[9px] text-slate-400">Menunggu pelunasan</span>
                </div>
            </div>
        </div>

        <!-- 2. Invoice Breakdown Table -->
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <h3 class="text-xs font-black text-[#071330] uppercase tracking-wider border-l-4 border-emerald-600 pl-2">
                    2. Rincian Faktur & Invoice Proyek Klien
                </h3>
                <span class="text-xs font-bold text-slate-600">Total Ditagihkan: <strong class="mono text-slate-900">Rp {{ number_format($invoiceTotalBilled, 0, ',', '.') }}</strong></span>
            </div>

            <table class="w-full text-left border border-slate-200 text-xs">
                <thead>
                    <tr class="bg-slate-100 text-slate-700 font-extrabold uppercase text-[9px] tracking-wider border-b border-slate-200">
                        <th class="py-2 px-3">No. Invoice</th>
                        <th class="py-2 px-3">Tanggal</th>
                        <th class="py-2 px-3">Nama Klien / Instansi</th>
                        <th class="py-2 px-3 text-center">Status</th>
                        <th class="py-2 px-3 text-right">Total Tagihan</th>
                        <th class="py-2 px-3 text-right">Lunas (Paid)</th>
                        <th class="py-2 px-3 text-right">Sisa Piutang</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 font-medium">
                    @forelse($invoices as $inv)
                        <tr>
                            <td class="py-2 px-3 font-mono font-bold text-slate-900">#{{ $inv->invoice_number }}</td>
                            <td class="py-2 px-3 mono text-slate-600">{{ $inv->invoice_date ? $inv->invoice_date->format('d/m/Y') : '-' }}</td>
                            <td class="py-2 px-3 font-bold text-slate-900">{{ $inv->client_name }}</td>
                            <td class="py-2 px-3 text-center font-bold uppercase text-[9px]">
                                {{ $inv->status }}
                            </td>
                            <td class="py-2 px-3 text-right mono text-slate-900">Rp {{ number_format($inv->total_amount, 0, ',', '.') }}</td>
                            <td class="py-2 px-3 text-right mono text-emerald-700 font-bold">Rp {{ number_format($inv->paid_amount, 0, ',', '.') }}</td>
                            <td class="py-2 px-3 text-right mono text-amber-700 font-bold">Rp {{ number_format($inv->remaining_amount, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-slate-400">Tidak ada data invoice pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- 3. Operational Expenses & Other Cashflow Table -->
        <div class="space-y-3">
            <h3 class="text-xs font-black text-[#071330] uppercase tracking-wider border-l-4 border-rose-600 pl-2">
                3. Buku Kas Beban Operasional & Pemasukan Lainnya
            </h3>

            <table class="w-full text-left border border-slate-200 text-xs">
                <thead>
                    <tr class="bg-slate-100 text-slate-700 font-extrabold uppercase text-[9px] tracking-wider border-b border-slate-200">
                        <th class="py-2 px-3 text-center">Tanggal</th>
                        <th class="py-2 px-3">Tipe</th>
                        <th class="py-2 px-3">Kategori</th>
                        <th class="py-2 px-3">Keterangan Transaksi</th>
                        <th class="py-2 px-3">Metode / Ref</th>
                        <th class="py-2 px-3 text-right">Nominal (Rp)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 font-medium">
                    @forelse($records as $rec)
                        <tr>
                            <td class="py-2 px-3 text-center mono text-slate-600">{{ $rec->transaction_date->format('d/m/Y') }}</td>
                            <td class="py-2 px-3 font-bold text-[10px] uppercase {{ $rec->type === 'income' ? 'text-emerald-700' : 'text-rose-600' }}">
                                {{ $rec->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                            </td>
                            <td class="py-2 px-3 text-slate-700 font-semibold">{{ \App\Models\FinancialRecord::getCategoryLabel($rec->category) }}</td>
                            <td class="py-2 px-3 text-slate-900 font-bold">{{ $rec->title }}</td>
                            <td class="py-2 px-3 text-slate-600 text-[11px]">{{ $rec->payment_method }} {{ $rec->reference_number ? '(' . $rec->reference_number . ')' : '' }}</td>
                            <td class="py-2 px-3 text-right mono font-black {{ $rec->type === 'income' ? 'text-emerald-700' : 'text-rose-600' }}">
                                {{ $rec->type === 'income' ? '+' : '-' }} Rp {{ number_format($rec->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-slate-400">Tidak ada riwayat transaksi kas pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Document Signatures (Tanda Tangan Pejabat BTD) -->
        <div class="pt-8 border-t border-slate-200 flex items-start justify-between text-xs">
            <div class="space-y-16">
                <div>
                    <span class="text-slate-400 block text-[10px] uppercase tracking-wider font-bold">Disiapkan Oleh:</span>
                    <span class="font-extrabold text-slate-900">Bendahara / Administrasi Keuangan</span>
                </div>
                <div>
                    <div class="w-44 border-b border-slate-400"></div>
                    <span class="text-[11px] text-slate-500 font-medium">Divisi Administrasi & Finansial</span>
                </div>
            </div>

            <div class="space-y-16 text-right">
                <div>
                    <span class="text-slate-400 block text-[10px] uppercase tracking-wider font-bold">Ogan Ilir, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
                    <span class="font-extrabold text-slate-900">Mengetahui & Menyetujui:</span>
                </div>
                <div>
                    <div class="w-44 border-b border-slate-400 ml-auto"></div>
                    <span class="font-bold text-slate-900 block text-xs">{{ $settings['trainer_name']->value ?? 'Septa Ryan Hidayat, S.Kom' }}</span>
                    <span class="text-[10px] text-slate-500 font-medium">Direktur Utama CV. BTD</span>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
