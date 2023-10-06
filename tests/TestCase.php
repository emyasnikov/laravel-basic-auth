<?php

namespace Intraset\LaravelBasicAuth\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Orchestra\Testbench\Concerns\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        //
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'Intraset\LaravelBasicAuth\ServiceProvider',
        ];
    }

    /**
     * Tear down the test environment.
     */
    protected function tearDown(): void
    {
        //

        parent::tearDown();
    }
}
