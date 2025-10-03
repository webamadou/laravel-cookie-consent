<?php

namespace Comparek\CookieConsent\Facades;

use Illuminate\Support\Facades\Facade;

class Consent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Comparek\CookieConsent\Services\ConsentManager::class;
    }
}
