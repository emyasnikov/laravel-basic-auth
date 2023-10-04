<?php

namespace Intraset\LaravelBasicAuth;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(Kernel $kernel)
    {
        $middleware = AuthenticateWithBasicAuth::class;

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware(config('basic_auth.alias'), $middleware);

        if (config('basic_auth.global')) {
            $kernel->pushMiddleware($middleware);
        } else {
            $kernel->appendMiddlewareToGroup(config('basic_auth.group'), $middleware);
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
