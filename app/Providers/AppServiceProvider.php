<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $siteSettings = \App\Models\Setting::all()->pluck('value', 'key');
                \Illuminate\Support\Facades\View::share('siteSettings', $siteSettings);
                \Illuminate\Support\Facades\View::share('settings', $siteSettings);
            } else {
                \Illuminate\Support\Facades\View::share('siteSettings', collect());
                \Illuminate\Support\Facades\View::share('settings', collect());
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\View::share('siteSettings', collect());
            \Illuminate\Support\Facades\View::share('settings', collect());
        }

        // Share real-time visitor and branding counter to public layout
        \Illuminate\Support\Facades\View::composer('layouts.app', function ($view) {
            try {
                $baseOffset = (int) (\App\Models\Setting::getValue('visitor_offset', '153563') ?: 153563);
                $hitsCount = \Illuminate\Support\Facades\Schema::hasTable('visitor_logs') ? \App\Models\VisitorLog::count() : 0;
                $totalVisitors = $baseOffset + $hitsCount;
                $onlineUsers = \Illuminate\Support\Facades\Schema::hasTable('visitor_logs') ? \App\Models\VisitorLog::getRealOnlineCount() : 1;

                $view->with([
                    'visitorTotalCount' => $totalVisitors,
                    'visitorFormattedCount' => number_format($totalVisitors, 0, ',', '.'),
                    'visitorOnlineCount' => $onlineUsers,
                    'visitorBaseOffset' => $baseOffset,
                ]);
            } catch (\Throwable $e) {
                $view->with([
                    'visitorTotalCount' => 153563,
                    'visitorFormattedCount' => '153.563',
                    'visitorOnlineCount' => 1,
                    'visitorBaseOffset' => 153563,
                ]);
            }
        });
    }
}

