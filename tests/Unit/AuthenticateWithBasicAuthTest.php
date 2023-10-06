<?php

namespace Intraset\LaravelBasicAuth\Tests\Unit;

use Illuminate\Http\Request;
use Intraset\LaravelBasicAuth\AuthenticateWithBasicAuth;
use Intraset\LaravelBasicAuth\Tests\TestCase;

class AuthenticateWithBasicAuthTest extends TestCase
{
    public function test_it_allows_access_when_basic_auth_is_disabled()
    {
        config(['basic_auth.enabled' => false]);

        $request = Request::create('/', 'GET');

        $middleware = new AuthenticateWithBasicAuth();

        $response = $middleware->handle($request, function ($request) {
            return response('OK');
        });

        $this->assertEquals('OK', $response->getContent());
    }

    public function test_it_allows_access_with_valid_credentials()
    {
        config(['basic_auth.enabled' => true]);
        config(['basic_auth.username' => 'test']);
        config(['basic_auth.password' => 'password']);

        $request = Request::create('/', 'GET', [], [], [], [
            'PHP_AUTH_USER' => 'test',
            'PHP_AUTH_PW' => 'password',
        ]);

        $middleware = new AuthenticateWithBasicAuth();

        $response = $middleware->handle($request, function ($request) {
            return response('OK');
        });

        $this->assertEquals('OK', $response->getContent());
    }

    public function test_it_denies_access_with_invalid_credentials()
    {
        config(['basic_auth.enabled' => true]);
        config(['basic_auth.username' => 'test']);
        config(['basic_auth.password' => 'password']);

        $request = Request::create('/', 'GET', [], [], [], [
            'PHP_AUTH_USER' => 'test',
            'PHP_AUTH_PW' => 'wrong-password',
        ]);

        $middleware = new AuthenticateWithBasicAuth();

        $response = $middleware->handle($request, function ($request) {
            return response('OK');
        });

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals('Unauthorized', $response->getContent());
    }
}
