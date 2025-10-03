<?php

use Illuminate\Support\Facades\Route;
use Comparek\CookieConsent\Http\Controllers\CookieConsentController;

Route::group([
    'prefix' => config('cookie-consent.route_prefix'),
    'middleware' => ['web'],
], function () {
    Route::post('/store',  [CookieConsentController::class, 'store'])->name('cookie-consent.store');
    Route::post('/revoke', [CookieConsentController::class, 'revoke'])->name('cookie-consent.revoke');
});
