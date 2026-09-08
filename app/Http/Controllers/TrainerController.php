<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index(Request $request)
    {
        $trainerName = Setting::getValue('trainer_name', 'Tim Ahli & Trainer Beranda Digital');
        $trainerTitle = Setting::getValue('trainer_title', 'Software Engineer, UI/UX Designer & AI Specialist');
        $trainerBio = Setting::getValue('trainer_bio', 'Tim profesional di CV. Beranda Teknologi Digital yang berpengalaman merancang arsitektur sistem skala besar dan memimpin pelatihan teknologi nasional.');
        $trainerAvatar = Setting::getValue('trainer_avatar', '/images/hero-person-old.png');

        $statsYears = Setting::getValue('trainer_stats_years', '8+');
        $statsEvents = Setting::getValue('trainer_stats_events', '65+');
        $statsAlumni = Setting::getValue('trainer_stats_alumni', '3,500+');

        $trainings = Training::orderBy('order', 'asc')->get();

        $categoryFilter = $request->get('category', 'all');
        $galleryQuery = Gallery::orderBy('order', 'asc');
        if ($categoryFilter !== 'all') {
            $galleryQuery->where('category', $categoryFilter);
        }
        $galleries = $galleryQuery->latest()->get();

        return view('public.trainer.index', compact(
            'trainerName',
            'trainerTitle',
            'trainerBio',
            'trainerAvatar',
            'statsYears',
            'statsEvents',
            'statsAlumni',
            'trainings',
            'galleries',
            'categoryFilter'
        ));
    }
}
