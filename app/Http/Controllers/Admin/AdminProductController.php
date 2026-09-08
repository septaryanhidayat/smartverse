<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = DigitalProduct::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('type', 'product')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'badge' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'features_raw' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'demo_url' => 'nullable|string',
            'buy_url' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (DigitalProduct::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $features = [];
        if ($request->filled('features_raw')) {
            $features = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->features_raw))));
        }

        $thumbnail = $validated['thumbnail'] ?? '/btd/0.png';
        if ($request->hasFile('thumbnail_file')) {
            $uploadedThumb = UploadHelper::upload($request->file('thumbnail_file'), 'products');
            if ($uploadedThumb) {
                $thumbnail = $uploadedThumb;
            }
        }

        DigitalProduct::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'badge' => $validated['badge'] ?? 'Template Kit',
            'tagline' => $validated['tagline'],
            'description' => $validated['description'],
            'features' => $features,
            'price' => $validated['price'],
            'demo_url' => $validated['demo_url'],
            'buy_url' => $validated['buy_url'],
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk digital berhasil ditambahkan.');
    }

    public function edit(DigitalProduct $product)
    {
        $categories = Category::where('type', 'product')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, DigitalProduct $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'badge' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'features_raw' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'demo_url' => 'nullable|string',
            'buy_url' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $features = [];
        if ($request->filled('features_raw')) {
            $features = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $request->features_raw))));
        }

        $thumbnail = $product->thumbnail;
        if ($request->hasFile('thumbnail_file')) {
            $uploadedThumb = UploadHelper::upload($request->file('thumbnail_file'), 'products');
            if ($uploadedThumb) {
                $thumbnail = $uploadedThumb;
            }
        } elseif ($request->filled('thumbnail')) {
            $thumbnail = $request->thumbnail;
        }

        $product->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'badge' => $validated['badge'] ?? $product->badge,
            'tagline' => $validated['tagline'],
            'description' => $validated['description'],
            'features' => $features,
            'price' => $validated['price'],
            'demo_url' => $validated['demo_url'],
            'buy_url' => $validated['buy_url'],
            'thumbnail' => $thumbnail,
            'is_featured' => $request->boolean('is_featured'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk digital berhasil diperbarui.');
    }

    public function destroy(DigitalProduct $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk digital berhasil dihapus.');
    }
}
