<?php

namespace App\Http\Controllers;

use App\Models\CvActivity;
use App\Models\CvProfile;
use App\Models\Setting;
use Illuminate\Http\Request;

class CvPublicController extends Controller
{
    public function show(Request $request)
    {
        $profile = CvProfile::current();
        
        $speakers = CvActivity::where('type', 'speaker')
            ->where('is_featured', true)
            ->orderBy('order')
            ->orderBy('year', 'desc')
            ->get();

        $projects = CvActivity::where('type', 'project')
            ->where('is_featured', true)
            ->orderBy('order')
            ->orderBy('year', 'desc')
            ->get();

        // Project categories for filtering
        $projectCategories = $projects->pluck('category')->filter()->unique()->values();

        $activitiesWithFlyer = CvActivity::whereNotNull('flyer_path')
            ->where('is_featured', true)
            ->orderBy('order')
            ->get();

        $docUrl = route('cv.show');
        $printUrl = route('cv.print');

        return view('public.cv.index', compact(
            'profile',
            'speakers',
            'projects',
            'projectCategories',
            'activitiesWithFlyer',
            'docUrl',
            'printUrl'
        ));
    }

    public function print(Request $request)
    {
        $profile = CvProfile::current();

        $speakers = CvActivity::where('type', 'speaker')
            ->where('show_in_print', true)
            ->orderBy('order')
            ->orderBy('year', 'desc')
            ->get();

        $projects = CvActivity::where('type', 'project')
            ->where('show_in_print', true)
            ->orderBy('order')
            ->orderBy('year', 'desc')
            ->get();

        $flyersForAppendix = CvActivity::whereNotNull('flyer_path')
            ->where('show_in_print', true)
            ->orderBy('order')
            ->get();

        $docUrl = route('cv.show');

        return view('public.cv.print', compact(
            'profile',
            'speakers',
            'projects',
            'flyersForAppendix',
            'docUrl'
        ));
    }
}
