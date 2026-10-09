<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\CvActivity;
use App\Models\CvProfile;
use Database\Seeders\CvDataSeeder;
use Illuminate\Http\Request;

class AdminCvController extends Controller
{
    public function index()
    {
        $profile = CvProfile::current();
        $speakerActivities = CvActivity::where('type', 'speaker')->orderBy('order')->orderBy('year', 'desc')->get();
        $projectActivities = CvActivity::where('type', 'project')->orderBy('order')->orderBy('year', 'desc')->get();

        return view('admin.cv.index', compact('profile', 'speakerActivities', 'projectActivities'));
    }

    public function updateProfile(Request $request)
    {
        $profile = CvProfile::current();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:100',
            'website_1' => 'nullable|string|max:255',
            'website_2' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'social' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'about_me' => 'nullable|string',
            'avatar_file' => 'nullable|image|max:10240',
            'affiliations' => 'nullable|array',
            'skills' => 'nullable|array',
            'certifications' => 'nullable|array',
            'stats' => 'nullable|array',
            'print_config' => 'nullable|array',
        ]);

        $avatarPath = $profile->avatar_path;
        if ($request->hasFile('avatar_file')) {
            $uploaded = UploadHelper::upload($request->file('avatar_file'), 'avatars');
            if ($uploaded) {
                $avatarPath = $uploaded;
            }
        }

        // Process affiliations (remove empty rows)
        $affiliations = [];
        if (!empty($validated['affiliations'])) {
            foreach ($validated['affiliations'] as $item) {
                if (!empty($item['role']) || !empty($item['organization'])) {
                    $affiliations[] = [
                        'role' => $item['role'] ?? '',
                        'organization' => $item['organization'] ?? '',
                        'period' => $item['period'] ?? '',
                        'description' => $item['description'] ?? '',
                    ];
                }
            }
        }

        // Process certifications
        $certifications = [];
        if (!empty($validated['certifications'])) {
            foreach ($validated['certifications'] as $item) {
                if (!empty($item['name'])) {
                    $certifications[] = [
                        'name' => $item['name'] ?? '',
                        'issuer' => $item['issuer'] ?? '',
                        'year' => $item['year'] ?? '',
                        'description' => $item['description'] ?? '',
                    ];
                }
            }
        }

        // Process skills
        $skills = [];
        if (!empty($validated['skills'])) {
            foreach ($validated['skills'] as $group) {
                if (!empty($group['category'])) {
                    $rawItems = $group['items_raw'] ?? '';
                    $itemList = array_filter(array_map('trim', explode(',', (string) $rawItems)));
                    $skills[] = [
                        'category' => $group['category'],
                        'items' => array_values($itemList),
                    ];
                }
            }
        }

        // Process print config
        $printConfig = [
            'show_flyers_appendix' => $request->boolean('print_config.show_flyers_appendix'),
            'show_contact_qr' => $request->boolean('print_config.show_contact_qr'),
            'show_certifications' => $request->boolean('print_config.show_certifications'),
            'show_projects' => $request->boolean('print_config.show_projects'),
            'watermark_text' => $request->input('print_config.watermark_text', 'OFFICIAL RESUME - SEPTA RYAN HIDAYAT'),
        ];

        $profile->update([
            'full_name' => $validated['full_name'],
            'title' => $validated['title'],
            'headline' => $validated['headline'] ?? '',
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'website_1' => $validated['website_1'] ?? '',
            'website_2' => $validated['website_2'] ?? '',
            'github' => $validated['github'] ?? '',
            'social' => $validated['social'] ?? '',
            'city' => $validated['city'] ?? '',
            'about_me' => $validated['about_me'] ?? '',
            'avatar_path' => $avatarPath,
            'affiliations' => $affiliations,
            'certifications' => $certifications,
            'skills' => $skills,
            'stats' => $request->input('stats', $profile->stats),
            'print_config' => $printConfig,
        ]);

        return redirect()->route('admin.cv.index')->with('success', 'Profil dan data utama CV berhasil diperbarui.');
    }

    public function storeActivity(Request $request)
    {
        $profile = CvProfile::current();

        $validated = $request->validate([
            'type' => 'required|in:speaker,project',
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'organizer' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'flyer_file' => 'nullable|image|max:10240',
            'pdf_file' => 'nullable|mimes:pdf|max:25600',
            'is_featured' => 'nullable|boolean',
            'show_in_print' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $flyerPath = null;
        if ($request->hasFile('flyer_file')) {
            $flyerPath = UploadHelper::upload($request->file('flyer_file'), 'cv_flyers', 1048576);
        }

        $pdfPath = null;
        if ($request->hasFile('pdf_file')) {
            $pdfPath = UploadHelper::upload($request->file('pdf_file'), 'cv_docs');
        }

        CvActivity::create([
            'cv_profile_id' => $profile->id,
            'type' => $validated['type'],
            'title' => $validated['title'],
            'category' => $validated['category'] ?? null,
            'organizer' => $validated['organizer'] ?? null,
            'year' => $validated['year'] ?? date('Y'),
            'location' => $validated['location'] ?? null,
            'url' => $validated['url'] ?? null,
            'description' => $validated['description'] ?? null,
            'flyer_path' => $flyerPath,
            'pdf_path' => $pdfPath,
            'is_featured' => $request->boolean('is_featured', true),
            'show_in_print' => $request->boolean('show_in_print', true),
            'order' => $validated['order'] ?? 0,
        ]);

        $typeName = $validated['type'] === 'speaker' ? 'Kegiatan narasumber / pelatihan' : 'Proyek software engineering';
        return redirect()->route('admin.cv.index')->with('success', "{$typeName} berhasil ditambahkan ke CV.");
    }

    public function updateActivity(Request $request, CvActivity $activity)
    {
        $validated = $request->validate([
            'type' => 'required|in:speaker,project',
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'organizer' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'flyer_file' => 'nullable|image|max:10240',
            'pdf_file' => 'nullable|mimes:pdf|max:25600',
            'remove_flyer' => 'nullable|boolean',
            'remove_pdf' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'show_in_print' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $flyerPath = $activity->flyer_path;
        if ($request->boolean('remove_flyer')) {
            $flyerPath = null;
        } elseif ($request->hasFile('flyer_file')) {
            $uploaded = UploadHelper::upload($request->file('flyer_file'), 'cv_flyers', 1048576);
            if ($uploaded) {
                $flyerPath = $uploaded;
            }
        }

        $pdfPath = $activity->pdf_path;
        if ($request->boolean('remove_pdf')) {
            $pdfPath = null;
        } elseif ($request->hasFile('pdf_file')) {
            $uploaded = UploadHelper::upload($request->file('pdf_file'), 'cv_docs');
            if ($uploaded) {
                $pdfPath = $uploaded;
            }
        }

        $activity->update([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'category' => $validated['category'] ?? null,
            'organizer' => $validated['organizer'] ?? null,
            'year' => $validated['year'] ?? null,
            'location' => $validated['location'] ?? null,
            'url' => $validated['url'] ?? null,
            'description' => $validated['description'] ?? null,
            'flyer_path' => $flyerPath,
            'pdf_path' => $pdfPath,
            'is_featured' => $request->boolean('is_featured'),
            'show_in_print' => $request->boolean('show_in_print'),
            'order' => $validated['order'] ?? $activity->order,
        ]);

        return redirect()->route('admin.cv.index')->with('success', 'Data kegiatan/proyek CV berhasil diperbarui.');
    }

    public function destroyActivity(CvActivity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.cv.index')->with('success', 'Kegiatan/proyek berhasil dihapus dari CV.');
    }

    public function resetDefault()
    {
        CvActivity::truncate();
        CvProfile::truncate();

        $seeder = new CvDataSeeder();
        $seeder->run();

        return redirect()->route('admin.cv.index')->with('success', 'Seluruh data CV berhasil di-reset kembali sesuai data resmi Septa Ryan Hidayat.');
    }
}
