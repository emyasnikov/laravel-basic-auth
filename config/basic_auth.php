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

    'alias' => env('BASIC_AUTH_ALIAS', 'basic.auth'),
    'global' => env('BASIC_AUTH_GLOBAL', false),
    'group' => env('BASIC_AUTH_GROUP', 'web'),

];
