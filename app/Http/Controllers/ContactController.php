<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactEmail = Setting::getValue('contact_email', 'info@smartverse.id');
        $contactPhone = Setting::getValue('contact_phone', '0896 9524 9089');
        $contactAddress = Setting::getValue('contact_address', 'Palembang - Ogan Ilir, Sumatera Selatan, Indonesia');

        return view('public.contact', compact('contactEmail', 'contactPhone', 'contactAddress'));
    }

    public function store(Request $request)
    {
        $siteName = Setting::getValue('site_name', 'SmartVerse');

        // Anti-bot honeypot check
        if ($request->filled('_hp_company')) {
            \Log::info("Bot inquiry submission quietly dropped via honeypot from IP: " . $request->ip());
            return redirect()->back()->with('success', "Pesan Anda telah berhasil dikirim! Tim {$siteName} akan segera menghubungi Anda.");
        }

        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:40',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        // Input Sanitization against XSS
        $cleanData = [
            'name' => strip_tags(trim($validated['name'])),
            'email' => filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL),
            'phone' => isset($validated['phone']) ? preg_replace('/[^\d\+\-\s\(\)]/', '', trim($validated['phone'])) : null,
            'subject' => isset($validated['subject']) ? strip_tags(trim($validated['subject'])) : 'Permintaan Konsultasi Solusi Digital',
            'message' => htmlspecialchars(strip_tags(trim($validated['message'])), ENT_QUOTES, 'UTF-8'),
        ];

        Inquiry::create($cleanData);

        return redirect()->back()->with('success', "Pesan Anda telah berhasil dikirim! Tim {$siteName} akan segera menghubungi Anda.");
    }
}
