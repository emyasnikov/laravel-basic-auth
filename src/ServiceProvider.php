<?php

namespace Intraset\LaravelBasicAuth;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/basic_auth.php' => config_path('basic_auth.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/basic_auth.php', 'basic_auth');
    }
}
