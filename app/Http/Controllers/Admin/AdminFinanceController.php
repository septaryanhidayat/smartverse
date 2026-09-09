<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\FinancialRecord;
use App\Models\Invoice;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminFinanceController extends Controller
{
    private function ensureTableExists(): void
    {
        if (!Schema::hasTable('financial_records')) {
            try {
                Artisan::call('migrate', ['--force' => true]);
            } catch (\Throwable $e) {
                // Ignore migration command failure if table exists
            }

            if (!Schema::hasTable('financial_records')) {
                Schema::create('financial_records', function ($table) {
                    $table->id();
                    $table->enum('type', ['income', 'expense'])->default('expense');
                    $table->string('category')->default('other');
                    $table->string('title');
                    $table->decimal('amount', 15, 2)->default(0);
                    $table->date('transaction_date');
                    $table->string('payment_method')->default('Transfer Bank');
                    $table->string('reference_number')->nullable();
                    $table->unsignedBigInteger('invoice_id')->nullable();
                    $table->text('notes')->nullable();
                    $table->string('receipt_path')->nullable();
                    $table->unsignedBigInteger('created_by')->nullable();
                    $table->timestamps();

                    $table->index('type');
                    $table->index('category');
                    $table->index('transaction_date');
                });
            }
        }

        // Seed representative sample records if empty
        if (FinancialRecord::count() === 0) {
            $initialRecords = [
                [
                    'type' => 'expense',
                    'category' => 'server_hosting',
                    'title' => 'Sewa Server Cloud VPS & Cadangan Backup Mingguan',
                    'amount' => 1450000,
                    'transaction_date' => Carbon::now()->subDays(35)->format('Y-m-d'),
                    'payment_method' => 'Transfer Bank Mandiri',
                    'reference_number' => 'SRV-VPS-202608',
                    'notes' => 'Infrastruktur cloud server hosting untuk sistem web klien enterprise & staging BTD.',
                ],
                [
                    'type' => 'expense',
                    'category' => 'ai_tools',
                    'title' => 'Lisensi Anthropic Claude Pro & OpenAI API Suite',
                    'amount' => 650000,
                    'transaction_date' => Carbon::now()->subDays(30)->format('Y-m-d'),
                    'payment_method' => 'Kartu Kredit / Visa',
                    'reference_number' => 'AI-SUB-202608',
                    'notes' => 'Alat bantu otomatisasi coding, generator arsitektur database, dan riset AI RAG.',
                ],
                [
                    'type' => 'income',
                    'category' => 'maintenance',
                    'title' => 'Retainer Maintenance Server & Keamanan Web Pemdes',
                    'amount' => 1500000,
                    'transaction_date' => Carbon::now()->subDays(28)->format('Y-m-d'),
                    'payment_method' => 'Transfer Bank Sumsel Babel',
                    'reference_number' => 'RET-DESA-08',
                    'notes' => 'Kontrak bulanan pemeliharaan sistem web desa, update konten, dan backup mingguan.',
                ],
                [
                    'type' => 'expense',
                    'category' => 'salary_honor',
                    'title' => 'Honor Developer & Quality Assurance Modul Aplikasi',
                    'amount' => 2500000,
                    'transaction_date' => Carbon::now()->subDays(25)->format('Y-m-d'),
                    'payment_method' => 'Transfer Bank Mandiri',
                    'reference_number' => 'HNR-DEV-08',
                    'notes' => 'Kompensasi pengerjaan backend API dan pengujian fitur mobile Flutter.',
                ],
                [
                    'type' => 'income',
                    'category' => 'training_workshop',
                    'title' => 'Honor Pemateri Workshop AI & Vibe Coding Komdigi',
                    'amount' => 3500000,
                    'transaction_date' => Carbon::now()->subDays(15)->format('Y-m-d'),
                    'payment_method' => 'Transfer Bank BNI',
                    'reference_number' => 'SPK-KMD-08',
                    'notes' => 'Narasumber pelatihan talenta digital kecerdasan buatan dan coding modern.',
                ],
                [
                    'type' => 'expense',
                    'category' => 'office_ops',
                    'title' => 'Langganan Internet Dedicated Fiber & Listrik Kantor Hub',
                    'amount' => 850000,
                    'transaction_date' => Carbon::now()->subDays(12)->format('Y-m-d'),
                    'payment_method' => 'ShopeePay',
                    'reference_number' => 'OPS-NET-09',
                    'notes' => 'Konektivitas stabil untuk deploy web, build APK Android, dan komunikasi klien.',
                ],
                [
                    'type' => 'expense',
                    'category' => 'ai_tools',
                    'title' => 'Lisensi Google Gemini Advanced & Midjourney Studio',
                    'amount' => 520000,
                    'transaction_date' => Carbon::now()->subDays(6)->format('Y-m-d'),
                    'payment_method' => 'Kartu Kredit / Visa',
                    'reference_number' => 'AI-SUB-202609',
                    'notes' => 'Kebutuhan pembuatan aset visual portofolio, copywriting, dan coding ideation.',
                ],
                [
                    'type' => 'expense',
                    'category' => 'transport_meeting',
                    'title' => 'Transportasi & Konsumsi Presentasi Klien Instansi',
                    'amount' => 350000,
                    'transaction_date' => Carbon::now()->subDays(3)->format('Y-m-d'),
                    'payment_method' => 'Kas Tunai',
                    'reference_number' => 'TRP-MTG-09',
                    'notes' => 'Meeting koordinasi implementasi sistem informasi sekolah & yayasan mitra.',
                ],
            ];

            foreach ($initialRecords as $r) {
                FinancialRecord::create($r);
            }
        }
    }

    public function index(Request $request)
    {
        $this->ensureTableExists();

        $period = $request->get('period', 'this_month');
        $typeFilter = $request->get('type', 'all');
        $categoryFilter = $request->get('category', 'all');
        $search = $request->get('search', '');

        // Determine Date Range
        $now = Carbon::now();
        switch ($period) {
            case 'today':
                $startDate = $now->copy()->startOfDay();
                $endDate = $now->copy()->endOfDay();
                $periodLabel = 'Hari Ini (' . $now->translatedFormat('d F Y') . ')';
                break;
            case 'last_month':
                $startDate = $now->copy()->subMonth()->startOfMonth();
                $endDate = $now->copy()->subMonth()->endOfMonth();
                $periodLabel = 'Bulan Lalu (' . $startDate->translatedFormat('F Y') . ')';
                break;
            case 'this_year':
                $startDate = $now->copy()->startOfYear();
                $endDate = $now->copy()->endOfYear();
                $periodLabel = 'Tahun Ini (' . $now->year . ')';
                break;
            case 'all':
                $startDate = Carbon::create(2020, 1, 1);
                $endDate = $now->copy()->endOfDay();
                $periodLabel = 'Semua Riwayat Finansial';
                break;
            case 'custom':
                $startDate = $request->get('start_date') ? Carbon::parse($request->get('start_date'))->startOfDay() : $now->copy()->startOfMonth();
                $endDate = $request->get('end_date') ? Carbon::parse($request->get('end_date'))->endOfDay() : $now->copy()->endOfDay();
                $periodLabel = $startDate->translatedFormat('d M Y') . ' s/d ' . $endDate->translatedFormat('d M Y');
                break;
            case 'this_month':
            default:
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                $periodLabel = 'Bulan Ini (' . $now->translatedFormat('F Y') . ')';
                $period = 'this_month';
                break;
        }

        // 1. PULL INVOICE DATA
        $invoiceQuery = Invoice::query();
        if ($period !== 'all') {
            $invoiceQuery->whereBetween('invoice_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
        }
        $invoices = $invoiceQuery->get();

        $invoiceTotalBilled = (float) $invoices->sum('total_amount');
        $invoiceTotalPaid = (float) $invoices->sum('paid_amount');
        $invoiceTotalRemaining = (float) $invoices->sum('remaining_amount');
        $invoicePaidCount = $invoices->where('status', 'paid')->count();
        $invoicePartialCount = $invoices->where('status', 'partial')->count();
        $invoiceUnpaidCount = $invoices->whereIn('status', ['unpaid', 'pending', 'overdue'])->count();

        // 2. PULL FINANCIAL LEDGER DATA (Income & Expense)
        $recordsQuery = FinancialRecord::query();
        if ($period !== 'all') {
            $recordsQuery->whereBetween('transaction_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
        }
        $allPeriodRecords = $recordsQuery->get();

        $manualIncome = (float) $allPeriodRecords->where('type', 'income')->sum('amount');
        $totalExpenses = (float) $allPeriodRecords->where('type', 'expense')->sum('amount');

        // 3. EXECUTIVE FINANCIAL AGGREGATES
        $totalCashInflow = $invoiceTotalPaid + $manualIncome;
        $netProfit = $totalCashInflow - $totalExpenses;
        $profitMargin = $totalCashInflow > 0 ? round(($netProfit / $totalCashInflow) * 100, 1) : 0;
        $expenseRatio = $totalCashInflow > 0 ? round(($totalExpenses / $totalCashInflow) * 100, 1) : 0;

        // Financial Health Rating
        if ($profitMargin >= 55) {
            $healthStatus = 'Sangat Sehat (Margin Sangat Baik)';
            $healthBadge = 'bg-emerald-50 text-emerald-700 border-emerald-200';
            $healthIcon = '🟢';
        } elseif ($profitMargin >= 30) {
            $healthStatus = 'Sehat & Stabil';
            $healthBadge = 'bg-blue-50 text-blue-700 border-blue-200';
            $healthIcon = '🔵';
        } elseif ($profitMargin >= 10) {
            $healthStatus = 'Cukup Sehat (Waspada Efisiensi)';
            $healthBadge = 'bg-amber-50 text-amber-700 border-amber-200';
            $healthIcon = '🟡';
        } elseif ($profitMargin >= 0) {
            $healthStatus = 'Break Even (Imbang)';
            $healthBadge = 'bg-orange-50 text-orange-700 border-orange-200';
            $healthIcon = '🟠';
        } else {
            $healthStatus = 'Defisit Kas Operasional';
            $healthBadge = 'bg-rose-50 text-rose-700 border-rose-200';
            $healthIcon = '🔴';
        }

        // 4. CHART DATA: 12-Month Cash Flow Trend
        $chartLabels = [];
        $chartIncomeData = [];
        $chartExpenseData = [];
        $chartNetProfitData = [];

        for ($i = 11; $i >= 0; $i--) {
            $monthObj = Carbon::now()->subMonths($i);
            $monthStart = $monthObj->copy()->startOfMonth()->format('Y-m-d');
            $monthEnd = $monthObj->copy()->endOfMonth()->format('Y-m-d');
            $label = $monthObj->translatedFormat('M Y');

            $monthInvoicePaid = (float) Invoice::whereBetween('invoice_date', [$monthStart, $monthEnd])->sum('paid_amount');
            $monthManualIncome = (float) FinancialRecord::where('type', 'income')->whereBetween('transaction_date', [$monthStart, $monthEnd])->sum('amount');
            $monthExpenses = (float) FinancialRecord::where('type', 'expense')->whereBetween('transaction_date', [$monthStart, $monthEnd])->sum('amount');

            $monthTotalIncome = $monthInvoicePaid + $monthManualIncome;
            $monthNet = $monthTotalIncome - $monthExpenses;

            $chartLabels[] = $label;
            $chartIncomeData[] = $monthTotalIncome;
            $chartExpenseData[] = $monthExpenses;
            $chartNetProfitData[] = $monthNet;
        }

        // 5. CHART DATA: Expense Distribution by Category
        $expenseCategories = [
            'server_hosting'    => 'Server & Cloud',
            'ai_tools'          => 'Lisensi AI & Tools',
            'salary_honor'      => 'Honor Tim & Dev',
            'office_ops'        => 'Operasional Kantor',
            'marketing_ads'     => 'Marketing & Iklan',
            'transport_meeting' => 'Transport Klien',
            'tax_legal'         => 'Pajak & Legalitas',
            'other'             => 'Lain-lain',
        ];

        $expenseBreakdown = [];
        foreach ($expenseCategories as $catKey => $catLabel) {
            $catSum = (float) $allPeriodRecords->where('type', 'expense')->where('category', $catKey)->sum('amount');
            if ($catSum > 0 || $totalExpenses === 0.0) {
                $expenseBreakdown[$catLabel] = $catSum;
            }
        }

        // 6. FILTERED LEDGER TABLE
        $ledgerQuery = FinancialRecord::query()->with('creator');

        if ($period !== 'all') {
            $ledgerQuery->whereBetween('transaction_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
        }
        if ($typeFilter !== 'all') {
            $ledgerQuery->where('type', $typeFilter);
        }
        if ($categoryFilter !== 'all') {
            $ledgerQuery->where('category', $categoryFilter);
        }
        if (!empty($search)) {
            $ledgerQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('reference_number', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        $records = $ledgerQuery->orderBy('transaction_date', 'desc')->orderBy('id', 'desc')->paginate(15)->withQueryString();

        // Policy Maker Insights
        $policyInsights = $this->generatePolicyInsights(
            $totalCashInflow,
            $totalExpenses,
            $netProfit,
            $profitMargin,
            $invoiceTotalRemaining,
            $expenseBreakdown
        );

        return view('admin.finances.index', compact(
            'period',
            'periodLabel',
            'typeFilter',
            'categoryFilter',
            'search',
            'startDate',
            'endDate',
            'invoiceTotalBilled',
            'invoiceTotalPaid',
            'invoiceTotalRemaining',
            'invoicePaidCount',
            'invoicePartialCount',
            'invoiceUnpaidCount',
            'invoices',
            'manualIncome',
            'totalExpenses',
            'totalCashInflow',
            'netProfit',
            'profitMargin',
            'expenseRatio',
            'healthStatus',
            'healthBadge',
            'healthIcon',
            'chartLabels',
            'chartIncomeData',
            'chartExpenseData',
            'chartNetProfitData',
            'expenseBreakdown',
            'records',
            'policyInsights'
        ));
    }

    public function store(Request $request)
    {
        $this->ensureTableExists();

        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'payment_method' => 'required|string|max:100',
            'reference_number' => 'nullable|string|max:100',
            'notes' => 'nullable|string',
            'receipt_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,webp|max:5120',
        ]);

        $receiptPath = null;
        if ($request->hasFile('receipt_file')) {
            $receiptPath = UploadHelper::upload($request->file('receipt_file'), 'finances');
        }

        FinancialRecord::create([
            'type' => $validated['type'],
            'category' => $validated['category'],
            'title' => $validated['title'],
            'amount' => $validated['amount'],
            'transaction_date' => $validated['transaction_date'],
            'payment_method' => $validated['payment_method'],
            'reference_number' => $validated['reference_number'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'receipt_path' => $receiptPath,
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Catatan keuangan kas baru berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $this->ensureTableExists();

        $record = FinancialRecord::findOrFail($id);

        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
            'payment_method' => 'required|string|max:100',
            'reference_number' => 'nullable|string|max:100',
            'notes' => 'nullable|string',
            'receipt_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,webp|max:5120',
        ]);

        if ($request->hasFile('receipt_file')) {
            $receiptPath = UploadHelper::upload($request->file('receipt_file'), 'finances');
            if ($receiptPath) {
                $record->receipt_path = $receiptPath;
            }
        }

        $record->update([
            'type' => $validated['type'],
            'category' => $validated['category'],
            'title' => $validated['title'],
            'amount' => $validated['amount'],
            'transaction_date' => $validated['transaction_date'],
            'payment_method' => $validated['payment_method'],
            'reference_number' => $validated['reference_number'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Data transaksi kas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $record = FinancialRecord::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('success', 'Catatan transaksi keuangan kas berhasil dihapus.');
    }

    public function printReport(Request $request)
    {
        $this->ensureTableExists();

        $period = $request->get('period', 'this_month');
        $now = Carbon::now();

        switch ($period) {
            case 'this_year':
                $startDate = $now->copy()->startOfYear();
                $endDate = $now->copy()->endOfYear();
                $periodLabel = 'Tahun ' . $now->year;
                break;
            case 'last_month':
                $startDate = $now->copy()->subMonth()->startOfMonth();
                $endDate = $now->copy()->subMonth()->endOfMonth();
                $periodLabel = 'Bulan ' . $startDate->translatedFormat('F Y');
                break;
            case 'all':
                $startDate = Carbon::create(2020, 1, 1);
                $endDate = $now->copy()->endOfDay();
                $periodLabel = 'Semua Periode';
                break;
            case 'this_month':
            default:
                $startDate = $now->copy()->startOfMonth();
                $endDate = $now->copy()->endOfMonth();
                $periodLabel = 'Bulan ' . $now->translatedFormat('F Y');
                break;
        }

        $invoices = Invoice::whereBetween('invoice_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->get();
        $invoiceTotalBilled = (float) $invoices->sum('total_amount');
        $invoiceTotalPaid = (float) $invoices->sum('paid_amount');
        $invoiceTotalRemaining = (float) $invoices->sum('remaining_amount');

        $records = FinancialRecord::whereBetween('transaction_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->orderBy('transaction_date', 'asc')
            ->get();

        $manualIncome = (float) $records->where('type', 'income')->sum('amount');
        $totalExpenses = (float) $records->where('type', 'expense')->sum('amount');
        $totalCashInflow = $invoiceTotalPaid + $manualIncome;
        $netProfit = $totalCashInflow - $totalExpenses;
        $profitMargin = $totalCashInflow > 0 ? round(($netProfit / $totalCashInflow) * 100, 1) : 0;

        $settings = Setting::all()->keyBy('key');

        return view('admin.finances.print', compact(
            'periodLabel',
            'startDate',
            'endDate',
            'invoices',
            'invoiceTotalBilled',
            'invoiceTotalPaid',
            'invoiceTotalRemaining',
            'records',
            'manualIncome',
            'totalExpenses',
            'totalCashInflow',
            'netProfit',
            'profitMargin',
            'settings'
        ));
    }

    private function generatePolicyInsights(
        float $inflow,
        float $expense,
        float $netProfit,
        float $profitMargin,
        float $receivables,
        array $expenseBreakdown
    ): array {
        $insights = [];

        // 1. Cash Reserve Recommendation
        if ($netProfit > 0) {
            $recommendedReserve = $netProfit * 0.20;
            $insights[] = [
                'type' => 'success',
                'icon' => '🛡️',
                'title' => 'Alokasi Cadangan Kas Lembaga (20% Laba Bersih)',
                'description' => 'Disarankan mengalokasikan sekitar Rp ' . number_format($recommendedReserve, 0, ',', '.') . ' ke rekening cadangan darurat lembaga guna mengamankan operasional server, sewa domain tahunan, dan riset inovasi AI mandiri.',
            ];
        }

        // 2. Receivables / Follow-up Alert
        if ($receivables > 0) {
            $insights[] = [
                'type' => 'warning',
                'icon' => '⏳',
                'title' => 'Tindak Lanjut Piutang Klien (Unpaid Invoices)',
                'description' => 'Terdapat piutang tertahan sebesar Rp ' . number_format($receivables, 0, ',', '.') . ' dari tagihan invoice klien yang belum terlunasi. Tim administrasi disarankan menerbitkan reminder penagihan termin berikutnya.',
            ];
        } else {
            $insights[] = [
                'type' => 'success',
                'icon' => '✨',
                'title' => 'Arus Pelunasan Piutang Sangat Sehat',
                'description' => 'Semua tagihan faktur invoice pada periode ini telah terselesaikan dengan baik tanpa ada tunggakan piutang tertahan.',
            ];
        }

        // 3. Top Expense Category Assessment
        if (!empty($expenseBreakdown)) {
            arsort($expenseBreakdown);
            $topCategory = array_key_first($expenseBreakdown);
            $topAmount = $expenseBreakdown[$topCategory];
            if ($topAmount > 0) {
                $insights[] = [
                    'type' => 'info',
                    'icon' => '📊',
                    'title' => 'Pusat Beban Biaya Terbesar: ' . $topCategory,
                    'description' => 'Pos pengeluaran tertinggi dialokasikan untuk ' . $topCategory . ' sebesar Rp ' . number_format($topAmount, 0, ',', '.') . ' (' . ($expense > 0 ? round(($topAmount / $expense) * 100, 1) : 0) . '% dari total beban). Pastikan nilai investasi ini berbanding lurus dengan kelancaran pengiriman sistem klien.',
                ];
            }
        }

        // 4. Strategic Growth Directive
        if ($profitMargin >= 50) {
            $insights[] = [
                'type' => 'success',
                'icon' => '🚀',
                'title' => 'Rekomendasi Kebijakan: Ekspansi & Reinvestasi',
                'description' => 'Tingkat margin laba lembaga sangat prima di angka ' . $profitMargin . '%. Momentum ini sangat ideal bagi jajaran direksi untuk meningkatkan kapasitas tim pengembang atau memperluas promosi produk digital SaaS BTD.',
            ];
        } else {
            $insights[] = [
                'type' => 'warning',
                'icon' => '⚖️',
                'title' => 'Rekomendasi Kebijakan: Efisiensi Biaya Operasional',
                'description' => 'Margin laba saat ini berada di angka ' . $profitMargin . '%. Pengambil kebijakan disarankan meninjau efektivitas langganan tools bulanan dan mengoptimalkan penagihan termin proyek berjalan.',
            ];
        }

        return $insights;
    }
}
