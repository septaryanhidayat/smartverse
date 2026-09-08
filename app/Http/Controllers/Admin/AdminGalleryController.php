<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'category' => 'required|string|max:100',
            'image_path' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $imagePath = $validated['image_path'] ?? '/images/Insight-Talks-Komdigi.jpeg';
        if ($request->hasFile('image_file')) {
            $uploaded = UploadHelper::upload($request->file('image_file'), 'galleries');
            if ($uploaded) {
                $imagePath = $uploaded;
            }
        }

        Gallery::create([
            'title' => $validated['title'],
            'event_name' => $validated['event_name'],
            'location' => $validated['location'],
            'event_date' => $validated['event_date'],
            'category' => $validated['category'],
            'image_path' => $imagePath,
            'description' => $validated['description'],
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Dokumentasi event berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'category' => 'required|string|max:100',
            'image_path' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $imagePath = $gallery->image_path;
        if ($request->hasFile('image_file')) {
            $uploaded = UploadHelper::upload($request->file('image_file'), 'galleries');
            if ($uploaded) {
                $imagePath = $uploaded;
            }
        } elseif ($request->filled('image_path')) {
            $imagePath = $request->image_path;
        }

        $gallery->update([
            'title' => $validated['title'],
            'event_name' => $validated['event_name'],
            'location' => $validated['location'],
            'event_date' => $validated['event_date'],
            'category' => $validated['category'],
            'image_path' => $imagePath,
            'description' => $validated['description'],
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Dokumentasi event berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Dokumentasi event berhasil dihapus.');
    }
}
