<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::where('type', 'project')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'summary' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'features_raw' => 'nullable|string',
            'app_type' => 'nullable|string|in:web,mobile,both',
            'status_badge' => 'nullable|string|max:100',
            'gallery_raw' => 'nullable|string',
            'tech_stack_raw' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Project::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $techStack = [];
        if ($request->filled('tech_stack_raw')) {
            $techStack = array_filter(array_map('trim', explode(',', $request->tech_stack_raw)));
        }

        $features = [];
        if ($request->filled('features_raw')) {
            $features = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->features_raw))));
        }

        $gallery = [];
        if ($request->filled('gallery_raw')) {
            $lines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->gallery_raw))));
            foreach ($lines as $line) {
                $parts = array_map('trim', explode('|', $line));
                $url = $parts[0] ?? '';
                if (!empty($url)) {
                    $title = $parts[1] ?? '';
                    $type = isset($parts[2]) && in_array(strtolower($parts[2]), ['web', 'mobile']) ? strtolower($parts[2]) : ($request->app_type ?? 'web');
                    $caption = $parts[3] ?? '';
                    $gallery[] = [
                        'url' => $url,
                        'title' => $title,
                        'type' => $type,
                        'caption' => $caption,
                    ];
                }
            }
        }

        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $gFile) {
                $gPath = UploadHelper::upload($gFile, 'projects');
                if ($gPath) {
                    $gallery[] = [
                        'url' => $gPath,
                        'title' => pathinfo($gFile->getClientOriginalName(), PATHINFO_FILENAME),
                        'type' => $validated['app_type'] ?? 'web',
                        'caption' => 'Screenshot Aplikasi',
                    ];
                }
            }
        }

        $thumbnail = $validated['thumbnail'] ?? '/btd/sekolah.png';
        if ($request->hasFile('thumbnail_file')) {
            $uploadedThumb = UploadHelper::upload($request->file('thumbnail_file'), 'projects');
            if ($uploadedThumb) {
                $thumbnail = $uploadedThumb;
            }
        }

        Project::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'summary' => $validated['summary'],
            'challenge' => $validated['challenge'],
            'solution' => $validated['solution'],
            'features' => $features,
            'app_type' => $validated['app_type'] ?? 'web',
            'status_badge' => $validated['status_badge'] ?? null,
            'gallery' => $gallery,
            'tech_stack' => $techStack,
            'client_name' => $validated['client_name'],
            'project_url' => $validated['project_url'],
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $categories = Category::where('type', 'project')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'summary' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'features_raw' => 'nullable|string',
            'app_type' => 'nullable|string|in:web,mobile,both',
            'status_badge' => 'nullable|string|max:100',
            'gallery_raw' => 'nullable|string',
            'tech_stack_raw' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $techStack = [];
        if ($request->filled('tech_stack_raw')) {
            $techStack = array_filter(array_map('trim', explode(',', $request->tech_stack_raw)));
        }

        $features = [];
        if ($request->filled('features_raw')) {
            $features = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->features_raw))));
        }

        $gallery = [];
        if ($request->filled('gallery_raw')) {
            $lines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->gallery_raw))));
            foreach ($lines as $line) {
                $parts = array_map('trim', explode('|', $line));
                $url = $parts[0] ?? '';
                if (!empty($url)) {
                    $title = $parts[1] ?? '';
                    $type = isset($parts[2]) && in_array(strtolower($parts[2]), ['web', 'mobile']) ? strtolower($parts[2]) : ($request->app_type ?? 'web');
                    $caption = $parts[3] ?? '';
                    $gallery[] = [
                        'url' => $url,
                        'title' => $title,
                        'type' => $type,
                        'caption' => $caption,
                    ];
                }
            }
        }

        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $gFile) {
                $gPath = UploadHelper::upload($gFile, 'projects');
                if ($gPath) {
                    $gallery[] = [
                        'url' => $gPath,
                        'title' => pathinfo($gFile->getClientOriginalName(), PATHINFO_FILENAME),
                        'type' => $validated['app_type'] ?? 'web',
                        'caption' => 'Screenshot Aplikasi',
                    ];
                }
            }
        }

        $thumbnail = $project->thumbnail;
        if ($request->hasFile('thumbnail_file')) {
            $uploadedThumb = UploadHelper::upload($request->file('thumbnail_file'), 'projects');
            if ($uploadedThumb) {
                $thumbnail = $uploadedThumb;
            }
        } elseif ($request->filled('thumbnail')) {
            $thumbnail = $request->thumbnail;
        }

        $project->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'challenge' => $validated['challenge'],
            'solution' => $validated['solution'],
            'features' => $features,
            'app_type' => $validated['app_type'] ?? 'web',
            'status_badge' => $validated['status_badge'] ?? null,
            'gallery' => $gallery,
            'tech_stack' => $techStack,
            'client_name' => $validated['client_name'],
            'project_url' => $validated['project_url'],
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}
