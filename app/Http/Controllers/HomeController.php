<?php

namespace App\Http\Controllers;

use App\Models\DigitalProduct;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Featured Projects
        try {
            $featuredProjects = Project::with('category')
                ->orderByDesc('is_featured')
                ->orderBy('order', 'asc')
                ->latest()
                ->take(12)
                ->get();
        } catch (\Throwable $e) {
            $featuredProjects = collect();
        }

        // 2. The 5 Flagship Digital Products of SmartVerse
        try {
            $flagshipProducts = DigitalProduct::with('category')
                ->orderBy('order', 'asc')
                ->take(5)
                ->get();
        } catch (\Throwable $e) {
            $flagshipProducts = collect();
        }

        $featuredProducts = $flagshipProducts;

        // 3. Featured Trainings
        try {
            $trainings = Training::where('is_featured', true)
                ->orderBy('order', 'asc')
                ->take(2)
                ->get();
        } catch (\Throwable $e) {
            $trainings = collect();
        }

        // 4. Featured Galleries
        try {
            $galleries = Gallery::where('is_featured', true)
                ->orderBy('order', 'asc')
                ->take(4)
                ->get();
        } catch (\Throwable $e) {
            $galleries = collect();
        }

        // 5. Latest Posts
        try {
            $latestPosts = Post::with(['category', 'author'])
                ->where('status', 'published')
                ->latest('published_at')
                ->take(6)
                ->get();
        } catch (\Throwable $e) {
            $latestPosts = collect();
        }

        // 6. Settings
        $siteName = Setting::getValue('site_name', 'SmartVerse');
        $heroTagline = Setting::getValue('hero_tagline', 'Satu Ekosistem Cerdas, 5 Kekuatan Transformasi Digital');
        $heroDescription = Setting::getValue('hero_description', 'SmartVerse (smartverse.id) menghadirkan 5 inovasi produk digital unggulan: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth.');
        
        $trainerName = Setting::getValue('trainer_name', 'Septa Ryan Hidayat, S.Kom');
        $trainerTitle = Setting::getValue('trainer_title', 'Founder SmartVerse, Direktur CV. Beranda Teknologi Digital & AI Specialist');
        $trainerBio = Setting::getValue('trainer_bio', 'Founder SmartVerse & Lead Software Architect di CV. Beranda Teknologi Digital. Dewan Pakar IGI Ogan Ilir, Narasumber Komdigi & Media Indonesia, serta Perancang 5 Ekosistem Produk Digital Nasional: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth.');
        $trainerAvatar = Setting::getValue('trainer_avatar', '/images/Insight-Talks-Komdigi.jpeg');

        return view('public.home', compact(
            'featuredProjects',
            'featuredProducts',
            'flagshipProducts',
            'trainings',
            'galleries',
            'latestPosts',
            'siteName',
            'heroTagline',
            'heroDescription',
            'trainerName',
            'trainerTitle',
            'trainerBio',
            'trainerAvatar'
        ));
    }

    public function services()
    {
        return view('public.services');
    }
}
