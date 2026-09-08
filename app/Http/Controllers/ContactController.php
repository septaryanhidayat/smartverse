<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactEmail = Setting::getValue('contact_email', 'contact@berandadigital.net');
        $contactPhone = Setting::getValue('contact_phone', '+62 812-3456-7890');
        $contactAddress = Setting::getValue('contact_address', 'Jl. Teknologi Digital No. 88, Cyber Hub, Jakarta South');

        return view('public.contact', compact('contactEmail', 'contactPhone', 'contactAddress'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim! Tim Beranda Digital akan segera menghubungi Anda.');
    }
}
