<?php

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
