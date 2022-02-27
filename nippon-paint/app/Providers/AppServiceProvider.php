<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Route\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \URL::forceScheme('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $url = $this->app['url'];
        $this->app->singleton('url', function () use ($url) {
            return new UrlGenerator($url);
        });
    }
}
