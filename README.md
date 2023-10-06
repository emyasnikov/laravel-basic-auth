# Laravel Basic Auth

[![Latest Version on Packagist](https://img.shields.io/packagist/v/intraset/laravel-basic-auth.svg?style=flat)](https://packagist.org/packages/intraset/laravel-basic-auth)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/intraset/laravel-basic-auth.svg?style=flat)](https://packagist.org/packages/intraset/laravel-basic-auth)

Basic authentication using master credentials for the application.

## Installation

```bash
composer require intraset/laravel-basic-auth
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="Intraset\LaravelBasicAuth\ServiceProvider"
```

## Usage

Activate the middleware in the .env file:

```bash
BASIC_AUTH_ENABLED=true
```

Set the master credentials in the .env file:

```bash
BASIC_AUTH_USERNAME=admin
BASIC_AUTH_PASSWORD=secret
```

Change the middleware alias in the .env file:

```bash
BASIC_AUTH_ALIAS=basic.auth
```

Change the middleware behavior to be applied to the application globally in the .env file:

```bash
BASIC_AUTH_GLOBAL=true
```

Change the middleware behavior to be applied to the middleware group in the .env file:

```bash
BASIC_AUTH_GROUP=web
```

## Middleware

The middleware can be used in the following ways:

```php
Route::get('/', function () {
    //
})->middleware('basic.auth');
```

## Testing

```bash
composer test
```

## Credits

- [Evgenij Myasnikov](https://github.com/emyasnikov)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
