<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\AdminOrderGuideController;
use App\Models\Setting;
use Illuminate\Http\Request;

class OrderGuidePublicController extends Controller
{
    /**
     * Tampilkan dokumen panduan & alur pemesanan website/aplikasi untuk publik / klien.
     */
    public function show(Request $request)
    {
        $settings = Setting::all()->keyBy('key')->map(fn($s) => $s->value);
        $publicUrl = route('order-guide.show');
        
        $documentContent = $settings['order_guide_content'] ?? (new AdminOrderGuideController())->getDefaultContent($settings);

        return view('public.order_guide', compact('settings', 'publicUrl', 'documentContent'));
    }
}
