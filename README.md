# Laravel wrapper for ticket tailor.

This is a laravel wrapper for [Ticket Tailor](https://tickettailor.com/). This wrapper allows you to access your Ticket Tailor data through their [Apis](https://developers.tickettailor.com/#ticket-tailor-api).

## Installation

You can install the package via composer:

```bash
composer require webdevhayes/laravel-ticket-tailor-wrapper
```

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
$ticketTailor = new Webdevhayes\LaravelTicketTailorWrapper( config('ticket-tailor-wrapper.api_key'), config('ticket-tailor-wrapper.api_key') );
dd($ticketTailor->auth()->getAllEvents());
```

## TODO/POSSIBLE FEATURES
* Add tests

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [James Hayes](https://github.com/WebDevHayes)
- [Spatie Laravel Package Skeleton](https://github.com/spatie/package-skeleton-laravel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
