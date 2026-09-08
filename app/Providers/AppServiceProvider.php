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
        if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
            try {
                $siteSettings = \App\Models\Setting::all()->pluck('value', 'key');
                \Illuminate\Support\Facades\View::share('siteSettings', $siteSettings);
                \Illuminate\Support\Facades\View::share('settings', $siteSettings);
            } catch (\Throwable $e) {
                // Ignore during migrations / early setup
            }
        }
    }
}
