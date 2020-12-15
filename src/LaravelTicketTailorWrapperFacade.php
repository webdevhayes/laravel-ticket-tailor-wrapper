<?php

namespace Webdevhayes\LaravelTicketTailorWrapper;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webdevhayes\LaravelTicketTailorWrapper\LaravelTicketTailorWrapper
 */
class LaravelTicketTailorWrapperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ticket-tailor-wrapper';
    }
}
