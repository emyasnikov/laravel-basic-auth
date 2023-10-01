<?php

namespace Intraset\LaravelBasicAuth;

use Closure;
use Illuminate\Http\Request;

class AuthenticateWithBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (config('basic_auth.enabled') === false) {
            return $next($request);
        }

        $username = $request->getUser();
        $password = $request->getPassword();

        if ($username && $password) {
            $config = config('basic_auth');

            if ($username === $config['username'] && $password === $config['password']) {
                return $next($request);
            }
        }

        $headers = ['WWW-Authenticate' => 'Basic'];

        return response('Unauthorized', 401, $headers);
    }
}
