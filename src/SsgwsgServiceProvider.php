<?php

namespace Jasonbdaro\Ssgwsg;

use Illuminate\Support\ServiceProvider;

class SsgwsgServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ssgwsg');

        $this->app->singleton('ssgwsg', function () {
            return new Ssgwsg;
        });
    }
}
