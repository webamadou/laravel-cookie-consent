<?php

return [
    'cookie_name'   => env('COOKIE_CONSENT_NAME', 'comparek_cookie_consent'),
    'lifetime_days' => env('COOKIE_CONSENT_LIFETIME_DAYS', 180),
    'route_prefix'  => env('COOKIE_CONSENT_PREFIX', 'cookie-consent'),

    'categories' => [
        'essential'   => ['required' => true,  'label' => 'Essentials'],
        'preferences' => ['required' => false, 'label' => 'Preferences'],
        'analytics'   => ['required' => false, 'label' => 'Analytics'],
        'marketing'   => ['required' => false, 'label' => 'Marketing'],
    ],

    'cookie' => [
        'path'     => '/',
        'domain'   => null,
        'secure'   => env('COOKIE_CONSENT_SECURE', app()->environment('production')),
        'httpOnly' => false,
        'sameSite' => 'Lax',
    ],
];
