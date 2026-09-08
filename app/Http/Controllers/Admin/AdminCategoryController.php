<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount(['projects', 'posts', 'digitalProducts'])
            ->latest()
            ->paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:project,product,post',
        ]);

        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'type' => $validated['type'],
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:project,product,post',
        ]);

        $slug = Str::slug($validated['name']);
        if ($slug !== $category->slug) {
            $originalSlug = $slug;
            $count = 1;
            while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                $slug = "{$originalSlug}-" . $count++;
            }
        }

        $category->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'type' => $validated['type'],
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori "' . $category->name . '" berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        // Check if category has associated content
        $totalItems = $category->projects()->count() + $category->posts()->count() + $category->digitalProducts()->count();
        if ($totalItems > 0) {
            return redirect()->route('admin.categories.index')->with('error', "Kategori tidak dapat dihapus karena masih digunakan oleh {$totalItems} konten.");
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
