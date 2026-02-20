<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\FooterContent;

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
        // Share footer content with all views so partials don't need direct model calls
        try {
            $footer = FooterContent::first();
            View::share('footer', $footer);
        } catch (\Throwable $e) {
            // in case of any issues (migrations not run yet), share null to avoid view errors
            View::share('footer', null);
        }
    }
}
