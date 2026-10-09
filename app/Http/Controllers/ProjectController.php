<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('type', 'project')->get();

        $query = Project::with('category');

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

        $projects = $query->orderByDesc('is_featured')->orderBy('order', 'asc')->latest()->paginate($perPage)->withQueryString();

        return view('public.projects.index', compact('projects', 'categories', 'perPageParam'));
    }

    public function show($slug)
    {
        $project = Project::with('category')->where('slug', $slug)->firstOrFail();

        $relatedProjects = Project::where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('public.projects.show', compact('project', 'relatedProjects'));
    }
}
