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

        $projects = $query->orderBy('order', 'asc')->latest()->paginate(12)->withQueryString();

        return view('public.projects.index', compact('projects', 'categories'));
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
