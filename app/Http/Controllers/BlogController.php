<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('type', 'post')->get();

        $query = Post::with(['category', 'author'])->where('status', 'published');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('body', 'like', "%{$q}%");
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

        $posts = $query->latest('published_at')->paginate($perPage)->withQueryString();

        return view('public.blog.index', compact('posts', 'categories', 'perPageParam'));
    }

    public function show($slug)
    {
        $post = Post::with(['category', 'author'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.blog.show', compact('post', 'relatedPosts'));
    }
}
