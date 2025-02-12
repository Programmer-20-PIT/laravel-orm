<?php

namespace App\Providers;

use App\Services\PrayerServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(PrayerServices::class, function ($app) {
            return new PrayerServices(new \GuzzleHttp\Client());
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
