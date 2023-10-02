<?php

namespace Intraset\LaravelBasicAuth;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(Kernel $kernel)
    {
        if (config('basic_auth.global')) {
            $kernel->pushMiddleware(AuthenticateWithBasicAuth::class);
        } else {
            $kernel->appendMiddlewareToGroup(config('basic_auth.group'), AuthenticateWithBasicAuth::class);
        }

        $this->publishes([
            __DIR__.'/../config/basic_auth.php' => config_path('basic_auth.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/basic_auth.php', 'basic_auth');
    }
}
