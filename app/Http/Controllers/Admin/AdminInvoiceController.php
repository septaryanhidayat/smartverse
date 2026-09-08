<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceClientMail;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class AdminInvoiceController extends Controller
{
    private function ensureTableExists(): void
    {
        if (!Schema::hasTable('invoices')) {
            try {
                Artisan::call('migrate', ['--force' => true]);
            } catch (\Throwable $e) {
                // Ignore migration command failure if table exists
            }

            if (!Schema::hasTable('invoices')) {
                Schema::create('invoices', function ($table) {
                    $table->id();
                    $table->string('invoice_number')->unique();
                    $table->date('invoice_date');
                    $table->date('due_date')->nullable();
                    $table->string('status')->default('paid');
                    $table->string('client_type')->default('Personal');
                    $table->string('client_name');
                    $table->string('client_email')->nullable();
                    $table->string('client_attn')->nullable();
                    $table->text('client_address')->nullable();
                    $table->json('items')->nullable();
                    $table->decimal('total_amount', 15, 2)->default(0);
                    $table->decimal('paid_amount', 15, 2)->default(0);
                    $table->decimal('remaining_amount', 15, 2)->default(0);
                    $table->json('transactions')->nullable();
                    $table->text('notes')->nullable();
                    $table->timestamps();
                });
            }
        } elseif (!Schema::hasColumn('invoices', 'client_email')) {
            try {
                Schema::table('invoices', function ($table) {
                    $table->string('client_email')->nullable()->after('client_name');
                });
            } catch (\Throwable $e) {
                // Ignore if already exists
            }
        }

            // Seed initial sample invoice #1675516 if not exists
            if (Invoice::count() === 0) {
                Invoice::create([
                    'invoice_number' => '1675516',
                    'invoice_date' => '2026-07-30',
                    'due_date' => '2026-07-30',
                    'status' => 'paid',
                    'client_type' => 'Personal',
                    'client_name' => 'Ibu Silvi Aryanti',
                    'client_attn' => 'ATTN: Ibu Silvi Aryanti',
                    'client_address' => 'Palembang, Indonesia',
                    'items' => [
                        [
                            'description' => 'Pelunasan Pembuatan Aplikasi https://sa-badmintonapp.com',
                            'amount' => 3000000,
                        ],
                    ],
                    'total_amount' => 3000000,
                    'paid_amount' => 3000000,
                    'remaining_amount' => 0,
                    'transactions' => [
                        [
                            'date' => '20/07/2026',
                            'payment_method' => 'ShopeePay',
                            'transaction_id' => 'UWSK6XWZ6WF5OTDOV2CS61J4QDIKA',
                            'amount' => 1500000,
                        ],
                        [
                            'date' => '30/07/2026',
                            'payment_method' => 'ShopeePay',
                            'transaction_id' => 'UWSMKOFZT6TTMFZKXI5FNEJJCD6QA',
                            'amount' => 1500000,
                        ],
                    ],
                    'notes' => 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.',
                ]);
            }
    }

    public function index()
    {
        $this->ensureTableExists();
        $invoices = Invoice::latest()->paginate(15);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $this->ensureTableExists();
        
        // Nomor invoice lanjut berurutan dari invoice terakhir
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();
        if ($lastInvoice && !empty($lastInvoice->invoice_number) && is_numeric($lastInvoice->invoice_number)) {
            $nextNumber = (string) (((int) $lastInvoice->invoice_number) + 1);
        } else {
            $nextNumber = '1675517';
        }

        return view('admin.invoices.create', compact('nextNumber'));
    }

    public function store(Request $request)
    {
        $this->ensureTableExists();

        $validated = $request->validate([
            'invoice_number' => 'required|string|max:50|unique:invoices,invoice_number',
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'status' => 'required|in:paid,unpaid,partial,cancelled',
            'client_type' => 'required|string|max:100',
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:191',
            'client_attn' => 'nullable|string|max:255',
            'client_address' => 'nullable|string',
            'paid_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        // Parse Items (support multi-items array or legacy items_raw)
        $items = [];
        $totalAmount = 0;
        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items as $item) {
                $desc = trim($item['description'] ?? '');
                $amt = (float) ($item['amount'] ?? 0);
                if (!empty($desc)) {
                    $items[] = [
                        'description' => $desc,
                        'amount' => $amt,
                    ];
                    $totalAmount += $amt;
                }
            }
        } elseif ($request->filled('items_raw')) {
            $lines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->items_raw))));
            foreach ($lines as $line) {
                $parts = array_map('trim', explode('|', $line));
                $desc = $parts[0] ?? '';
                $amt = isset($parts[1]) ? (float) str_replace(['.', ',', ' '], '', $parts[1]) : 0;
                if (!empty($desc)) {
                    $items[] = [
                        'description' => $desc,
                        'amount' => $amt,
                    ];
                    $totalAmount += $amt;
                }
            }
        }

        // Parse Transactions (support separate fields or raw)
        $transactions = [];
        if ($request->has('transactions') && is_array($request->transactions)) {
            foreach ($request->transactions as $t) {
                $tDate = trim($t['date'] ?? date('d/m/Y'));
                $tMethod = trim($t['payment_method'] ?? 'Transfer Bank');
                $tId = trim($t['transaction_id'] ?? '-');
                $tAmt = (float) ($t['amount'] ?? 0);
                if (!empty($tMethod) || !empty($tId) || $tAmt > 0) {
                    $transactions[] = [
                        'date' => $tDate,
                        'payment_method' => $tMethod,
                        'transaction_id' => $tId,
                        'amount' => $tAmt,
                    ];
                }
            }
        } elseif ($request->filled('transactions_raw')) {
            $tLines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->transactions_raw))));
            foreach ($tLines as $tLine) {
                $tParts = array_map('trim', explode('|', $tLine));
                $transactions[] = [
                    'date' => $tParts[0] ?? date('d/m/Y'),
                    'payment_method' => $tParts[1] ?? 'Transfer Bank',
                    'transaction_id' => $tParts[2] ?? '-',
                    'amount' => isset($tParts[3]) ? (float) str_replace(['.', ',', ' '], '', $tParts[3]) : 0,
                ];
            }
        }

        // Format ATTN: template automatically
        $attn = trim($request->client_attn ?? '');
        if (!empty($attn)) {
            if (!str_starts_with(strtoupper($attn), 'ATTN:')) {
                $attn = 'ATTN: ' . $attn;
            }
        } else {
            $attn = 'ATTN: ' . $validated['client_name'];
        }

        $paidAmount = (float) $validated['paid_amount'];
        $remainingAmount = max(0, $totalAmount - $paidAmount);

        $invoice = Invoice::create([
            'invoice_number' => $validated['invoice_number'],
            'invoice_date' => $validated['invoice_date'],
            'due_date' => $validated['due_date'] ?? $validated['invoice_date'],
            'status' => $validated['status'],
            'client_type' => $validated['client_type'],
            'client_name' => $validated['client_name'],
            'client_email' => $validated['client_email'] ?? null,
            'client_attn' => $attn,
            'client_address' => $validated['client_address'],
            'items' => $items,
            'total_amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'remaining_amount' => $remainingAmount,
            'transactions' => $transactions,
            'notes' => $validated['notes'],
        ]);

        $emailMsg = '';
        if (!empty($invoice->client_email) && $request->boolean('send_email_now', true)) {
            $delivery = $this->deliverInvoiceEmail($invoice);
            $emailMsg = $delivery['status'] 
                ? " dan {$delivery['message']}" 
                : " (namun pengiriman email gagal: {$delivery['message']})";
        }

        return redirect()->route('admin.invoices.index')->with('success', "Invoice #{$invoice->invoice_number} berhasil dibuat{$emailMsg}.");
    }

    public function edit(Invoice $invoice)
    {
        $this->ensureTableExists();
        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $this->ensureTableExists();

        $validated = $request->validate([
            'invoice_number' => 'required|string|max:50|unique:invoices,invoice_number,' . $invoice->id,
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'status' => 'required|in:paid,unpaid,partial,cancelled',
            'client_type' => 'required|string|max:100',
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:191',
            'client_attn' => 'nullable|string|max:255',
            'client_address' => 'nullable|string',
            'paid_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        // Parse Items (support multi-items array or legacy items_raw)
        $items = [];
        $totalAmount = 0;
        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items as $item) {
                $desc = trim($item['description'] ?? '');
                $amt = (float) ($item['amount'] ?? 0);
                if (!empty($desc)) {
                    $items[] = [
                        'description' => $desc,
                        'amount' => $amt,
                    ];
                    $totalAmount += $amt;
                }
            }
        } elseif ($request->filled('items_raw')) {
            $lines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->items_raw))));
            foreach ($lines as $line) {
                $parts = array_map('trim', explode('|', $line));
                $desc = $parts[0] ?? '';
                $amt = isset($parts[1]) ? (float) str_replace(['.', ',', ' '], '', $parts[1]) : 0;
                if (!empty($desc)) {
                    $items[] = [
                        'description' => $desc,
                        'amount' => $amt,
                    ];
                    $totalAmount += $amt;
                }
            }
        }

        // Parse Transactions (support separate fields or raw)
        $transactions = [];
        if ($request->has('transactions') && is_array($request->transactions)) {
            foreach ($request->transactions as $t) {
                $tDate = trim($t['date'] ?? date('d/m/Y'));
                $tMethod = trim($t['payment_method'] ?? 'Transfer Bank');
                $tId = trim($t['transaction_id'] ?? '-');
                $tAmt = (float) ($t['amount'] ?? 0);
                if (!empty($tMethod) || !empty($tId) || $tAmt > 0) {
                    $transactions[] = [
                        'date' => $tDate,
                        'payment_method' => $tMethod,
                        'transaction_id' => $tId,
                        'amount' => $tAmt,
                    ];
                }
            }
        } elseif ($request->filled('transactions_raw')) {
            $tLines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->transactions_raw))));
            foreach ($tLines as $tLine) {
                $tParts = array_map('trim', explode('|', $tLine));
                $transactions[] = [
                    'date' => $tParts[0] ?? date('d/m/Y'),
                    'payment_method' => $tParts[1] ?? 'Transfer Bank',
                    'transaction_id' => $tParts[2] ?? '-',
                    'amount' => isset($tParts[3]) ? (float) str_replace(['.', ',', ' '], '', $tParts[3]) : 0,
                ];
            }
        }

        // Format ATTN: template automatically
        $attn = trim($request->client_attn ?? '');
        if (!empty($attn)) {
            if (!str_starts_with(strtoupper($attn), 'ATTN:')) {
                $attn = 'ATTN: ' . $attn;
            }
        } else {
            $attn = 'ATTN: ' . $validated['client_name'];
        }

        $paidAmount = (float) $validated['paid_amount'];
        $remainingAmount = max(0, $totalAmount - $paidAmount);

        $invoice->update([
            'invoice_number' => $validated['invoice_number'],
            'invoice_date' => $validated['invoice_date'],
            'due_date' => $validated['due_date'] ?? $validated['invoice_date'],
            'status' => $validated['status'],
            'client_type' => $validated['client_type'],
            'client_name' => $validated['client_name'],
            'client_email' => $validated['client_email'] ?? null,
            'client_attn' => $attn,
            'client_address' => $validated['client_address'],
            'items' => $items,
            'total_amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'remaining_amount' => $remainingAmount,
            'transactions' => $transactions,
            'notes' => $validated['notes'],
        ]);

        $emailMsg = '';
        if (!empty($invoice->client_email) && $request->boolean('send_email_now')) {
            $delivery = $this->deliverInvoiceEmail($invoice);
            $emailMsg = $delivery['status'] 
                ? " dan {$delivery['message']}" 
                : " (namun pengiriman email gagal: {$delivery['message']})";
        }

        return redirect()->route('admin.invoices.index')->with('success', "Invoice #{$invoice->invoice_number} berhasil diperbarui{$emailMsg}.");
    }

    public function destroy(Invoice $invoice)
    {
        $this->ensureTableExists();
        $invoice->delete();
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice berhasil dihapus.');
    }

    public function sendEmail(Invoice $invoice)
    {
        $this->ensureTableExists();

        if (empty($invoice->client_email)) {
            return back()->with('error', "Invoice #{$invoice->invoice_number} belum memiliki alamat email klien. Silakan isi email terlebih dahulu pada menu Edit.");
        }

        $delivery = $this->deliverInvoiceEmail($invoice);
        if ($delivery['status']) {
            return back()->with('success', "Invoice #{$invoice->invoice_number}: {$delivery['message']}");
        }

        return back()->with('error', "Gagal mengirim email: {$delivery['message']}");
    }

    private function deliverInvoiceEmail(Invoice $invoice): array
    {
        if (empty($invoice->client_email)) {
            return ['status' => false, 'message' => 'Alamat email klien belum diisi.'];
        }

        $defaultMailer = config('mail.default');

        // Jika mailer default masih 'log' (umum terjadi jika .env server cPanel belum diset SMTP),
        // coba kirimkan via sendmail driver bawaan server cPanel/Linux terlebih dahulu
        if ($defaultMailer === 'log') {
            try {
                Mail::mailer('sendmail')->to($invoice->client_email)->send(new InvoiceClientMail($invoice));
                return ['status' => true, 'message' => "notifikasi invoice terkirim ke {$invoice->client_email} via mail server"];
            } catch (\Throwable $e) {
                // Jika sendmail gagal (misal di local Windows), fallback catat ke log driver
                Mail::to($invoice->client_email)->send(new InvoiceClientMail($invoice));
                return ['status' => true, 'message' => "notifikasi invoice dicatat ke log sistem. (Driver email: log. Atur MAIL_MAILER=smtp di file .env server agar langsung ke inbox klien)"];
            }
        }

        // Coba kirim via mailer default (SMTP)
        try {
            Mail::to($invoice->client_email)->send(new InvoiceClientMail($invoice));
            return ['status' => true, 'message' => "invoice berhasil dikirim ke {$invoice->client_email}"];
        } catch (\Throwable $e) {
            // Jika SMTP gagal terhubung, lakukan fallback ke sendmail
            try {
                Mail::mailer('sendmail')->to($invoice->client_email)->send(new InvoiceClientMail($invoice));
                return ['status' => true, 'message' => "invoice berhasil dikirim ke {$invoice->client_email} (via fallback sendmail)"];
            } catch (\Throwable $fallbackEx) {
                Log::error("Gagal kirim email invoice: " . $e->getMessage() . " | Fallback sendmail: " . $fallbackEx->getMessage());
                return ['status' => false, 'message' => "Gagal terhubung ke mail server ({$e->getMessage()})"];
            }
        }
    }

    public function print(Invoice $invoice)
    {
        $this->ensureTableExists();
        $settings = Setting::all()->keyBy('key')->map(fn($s) => $s->value);
        return view('admin.invoices.print', compact('invoice', 'settings'));
    }
}
