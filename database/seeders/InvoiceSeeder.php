<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::updateOrCreate(['invoice_number' => '1675516'], [
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
