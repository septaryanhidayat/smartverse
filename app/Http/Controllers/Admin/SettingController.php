<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fileFields = [
            'site_logo_file' => 'site_logo',
            'site_favicon_file' => 'site_favicon',
            'og_image_file' => 'og_image',
            'hero_image_file' => 'hero_image',
            'about_image_file' => 'about_image',
            'trainer_avatar_file' => 'trainer_avatar',
        ];

        $data = $request->except(array_merge(['_token', '_method'], array_keys($fileFields)));

        foreach ($fileFields as $inputName => $settingKey) {
            if ($request->hasFile($inputName)) {
                $path = UploadHelper::upload($request->file($inputName), 'settings');
                if ($path) {
                    $data[$settingKey] = $path;
                }
            }
        }

        foreach ($data as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $val]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan tema, SEO, favicon, dan banner hero berhasil disimpan.');
    }
}
