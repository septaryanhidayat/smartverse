<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::orderBy('order')->latest()->paginate(10);
        return view('admin.trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('admin.trainings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|max:100',
            'duration' => 'nullable|string|max:100',
            'target_audience' => 'nullable|string|max:255',
            'summary' => 'required|string',
            'syllabus_raw' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'thumbnail' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Training::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $syllabus = [];
        if ($request->filled('syllabus_raw')) {
            $syllabus = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->syllabus_raw))));
        }

        $thumbnail = $validated['thumbnail'] ?? '/images/Insight-Talks-Komdigi.jpeg';
        if ($request->hasFile('thumbnail_file')) {
            $uploadedThumb = UploadHelper::upload($request->file('thumbnail_file'), 'trainings');
            if ($uploadedThumb) {
                $thumbnail = $uploadedThumb;
            }
        }

        Training::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'level' => $validated['level'],
            'duration' => $validated['duration'],
            'target_audience' => $validated['target_audience'],
            'summary' => $validated['summary'],
            'syllabus' => $syllabus,
            'price' => $validated['price'] ?? 0,
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.trainings.index')->with('success', 'Modul pelatihan IT berhasil ditambahkan.');
    }

    public function edit(Training $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|max:100',
            'duration' => 'nullable|string|max:100',
            'target_audience' => 'nullable|string|max:255',
            'summary' => 'required|string',
            'syllabus_raw' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'thumbnail' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $syllabus = [];
        if ($request->filled('syllabus_raw')) {
            $syllabus = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->syllabus_raw))));
        }

        $thumbnail = $training->thumbnail;
        if ($request->hasFile('thumbnail_file')) {
            $uploadedThumb = UploadHelper::upload($request->file('thumbnail_file'), 'trainings');
            if ($uploadedThumb) {
                $thumbnail = $uploadedThumb;
            }
        } elseif ($request->filled('thumbnail')) {
            $thumbnail = $request->thumbnail;
        }

        $training->update([
            'title' => $validated['title'],
            'level' => $validated['level'],
            'duration' => $validated['duration'],
            'target_audience' => $validated['target_audience'],
            'summary' => $validated['summary'],
            'syllabus' => $syllabus,
            'price' => $validated['price'] ?? 0,
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.trainings.index')->with('success', 'Modul pelatihan IT berhasil diperbarui.');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('admin.trainings.index')->with('success', 'Modul pelatihan berhasil dihapus.');
    }
}
