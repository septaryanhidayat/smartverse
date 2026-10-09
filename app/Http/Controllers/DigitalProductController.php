<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;

class DigitalProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('type', 'product')->get();

        $query = DigitalProduct::with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $perPageParam = $request->get('per_page', 10);
        if ($perPageParam === 'all' || $perPageParam === 'semua') {
            $perPage = 500;
        } elseif (in_array((int)$perPageParam, [5, 10, 50, 100])) {
            $perPage = (int)$perPageParam;
        } else {
            $perPage = 10;
        }

        $products = $query->orderBy('order', 'asc')->latest()->paginate($perPage)->withQueryString();

        return view('public.products.index', compact('products', 'categories', 'perPageParam'));
    }

    public function show($slug)
    {
        $product = DigitalProduct::with('category')
            ->where('slug', $slug)
            ->orWhere('slug', 'like', $slug . '-%')
            ->orWhere('slug', 'like', '%' . $slug . '%')
            ->firstOrFail();

        $relatedProducts = DigitalProduct::where('id', '!=', $product->id)
            ->orderBy('order', 'asc')
            ->take(4)
            ->get();

        return view('public.products.show', compact('product', 'relatedProducts'));
    }
}
