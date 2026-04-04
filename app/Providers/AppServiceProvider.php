<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; //

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 🚀 Əgər sayt Render kimi uzaq serverdədirsə, HTTPS-i məcburi et
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
