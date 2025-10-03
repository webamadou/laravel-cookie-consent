<?php

namespace Comparek\CookieConsent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Comparek\CookieConsent\Facades\Consent;

class CookieConsentController extends Controller
{
    public function store(Request $request)
    {
        Consent::store($request->all());
        return back();
    }

    public function revoke()
    {
        Consent::revoke();
        return back();
    }
}
