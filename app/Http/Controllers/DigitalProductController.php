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

        $products = $query->orderBy('order', 'asc')->latest()->paginate(9)->withQueryString();

        return view('public.products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = DigitalProduct::with('category')->where('slug', $slug)->firstOrFail();

        $relatedProducts = DigitalProduct::where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('public.products.show', compact('product', 'relatedProducts'));
    }
}
