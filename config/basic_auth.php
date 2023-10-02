<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Basic Authentication
    |--------------------------------------------------------------------------
    |
    | This options are used by the middleware to check if the user has to
    | authenticate using basic authentication.
    |
    */

    'enabled' => env('BASIC_AUTH', false),
    'password' => env('BASIC_AUTH_PASSWORD', ''),
    'username' => env('BASIC_AUTH_USERNAME', ''),

    /*
    |--------------------------------------------------------------------------
    | Basic Authentication Settings
    |--------------------------------------------------------------------------
    |
    | This options configure the middleware behaviour.
    |
    */

    'global' => env('BASIC_AUTH_GLOBAL', false),

];
