<?php

namespace Comparek\CookieConsent\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Comparek\CookieConsent\Facades\Consent;

class InjectCookieConsent
{
    public function handle(Request $request, Closure $next)
    {
        view()->share('cookieConsent', Consent::current());
        return $next($request);
    }
}
