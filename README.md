# Laravel wrapper for ticket tailor.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webdevhayes/laravel-ticket-tailor-wrapper.svg?style=flat-square)](https://packagist.org/packages/webdevhayes/laravel-ticket-tailor-wrapper)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/webdevhayes/laravel-ticket-tailor-wrapper/run-tests?label=tests)](https://github.com/webdevhayes/laravel-ticket-tailor-wrapper/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/webdevhayes/laravel-ticket-tailor-wrapper.svg?style=flat-square)](https://packagist.org/packages/webdevhayes/laravel-ticket-tailor-wrapper)


This is a laravel wrapper for [Ticket Tailor](https://tickettailor.com/). This wrapper allows you to access your Ticket Tailor data through their Apis.

## Installation

You can install the package via composer:

```bash
composer require webdevhayes/laravel-ticket-tailor-wrapper
```

You can publish and run the migrations with:

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Webdevhayes\LaravelTicketTailorWrapper\LaravelTicketTailorWrapperServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Ticket Tailor Api Base Url
    |--------------------------------------------------------------------------
    |
    | This value is the base url for the api calls.
    |
    */

    "base_url" => env('TT_BASE_URL', 'https://api.tickettailor.com/v1'),

    /*
    |--------------------------------------------------------------------------
    | Ticket Tailor Api Key
    |--------------------------------------------------------------------------
    |
    | This value is the api key for ticket tailor. This value is used when the
    | api is called.
    |
    */
    "api_key" => env('TT_API_KEY', ''),

];
```

## Usage

```php
$ticketTailor = new Webdevhayes\LaravelTicketTailorWrapper();
dd($ticketTailor->auth()->getAllEvents());
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [James Hayes](https://github.com/WebDevHayes)
- [Spatie Laravel Package Skeleton](https://github.com/spatie/package-skeleton-laravel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
