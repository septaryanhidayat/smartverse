<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;

class InvoiceVerificationController extends Controller
{
    public function verify($invoice_number)
    {
        $invoice = Invoice::where('invoice_number', $invoice_number)
            ->orWhere('id', is_numeric($invoice_number) ? (int) $invoice_number : 0)
            ->first();

        if (!$invoice) {
            abort(404, "Dokumen invoice dengan nomor #{$invoice_number} tidak ditemukan di sistem resmi kami.");
        }

        $settings = Setting::all()->keyBy('key')->map(fn($s) => $s->value);

        return view('public.invoices.verify', compact('invoice', 'settings'));
    }

    public function print($invoice_number)
    {
        $invoice = Invoice::where('invoice_number', $invoice_number)
            ->orWhere('id', is_numeric($invoice_number) ? (int) $invoice_number : 0)
            ->first();

        if (!$invoice) {
            abort(404, "Dokumen invoice dengan nomor #{$invoice_number} tidak ditemukan di sistem resmi kami.");
        }

        $settings = Setting::all()->keyBy('key')->map(fn($s) => $s->value);

        return view('admin.invoices.print', compact('invoice', 'settings'));
    }
}
