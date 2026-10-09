<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'title',
        'amount',
        'transaction_date',
        'payment_method',
        'reference_number',
        'invoice_id',
        'notes',
        'receipt_path',
        'created_by',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function getCategoryLabel(string $category): string
    {
        $labels = [
            // Expense Categories
            'server_hosting'      => 'Server, VPS & Cloud',
            'domain_registration' => 'Pembelian Domain Baru',
            'domain_renewal'      => 'Perpanjangan Domain & SSL',
            'ai_tools'            => 'Lisensi AI & Dev Tools',
            'salary_honor'        => 'Honor Tim & Developer',
            'marketing_ads'       => 'Pemasaran & Iklan',
            'office_ops'          => 'Operasional & Listrik/Net',
            'transport_meeting'   => 'Transport & Meeting Klien',
            'tax_legal'           => 'Pajak & Legalitas Usaha',
            'equipment'           => 'Peralatan & Hardware',
            
            // Income Categories
            'project_invoice'     => 'Faktur Invoice Klien',
            'project_direct'      => 'Proyek Jasa Langsung',
            'training_workshop'   => 'Pelatihan & Workshop IT',
            'consultation'        => 'Konsultasi Software & AI',
            'maintenance'         => 'Retainer & Maintenance',
            'other'               => 'Lain-lain',
        ];

        return $labels[$category] ?? ucfirst(str_replace('_', ' ', $category));
    }

    public static function ensureTableExists(): void
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('financial_records')) {
            \Illuminate\Support\Facades\Schema::create('financial_records', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->id();
                $table->string('type')->default('expense');
                $table->string('category')->default('other');
                $table->string('title');
                $table->decimal('amount', 15, 2);
                $table->date('transaction_date');
                $table->string('payment_method')->default('transfer_bank');
                $table->string('reference_number')->nullable();
                $table->unsignedBigInteger('invoice_id')->nullable();
                $table->text('notes')->nullable();
                $table->string('receipt_path')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamps();

                $table->index(['type', 'transaction_date']);
                $table->index('category');
            });
        }
    }
}
