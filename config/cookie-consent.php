<?php

return [

    'cookie_name'   => 'comparek_cookie_consent',
    'lifetime_days' => 180,
    'route_prefix'  => 'cookie-consent',

    'categories' => [
        'essential'   => ['required' => true,  'label' => 'Essentials'],
        'preferences' => ['required' => false, 'label' => 'Preferences'],
        'analytics'   => ['required' => false, 'label' => 'Analytics'],
        'marketing'   => ['required' => false, 'label' => 'Marketing'],
    ],

    'cookie' => [
        'path'     => '/',
        'domain'   => null,
        // Use app env (production => secure cookie)
        'secure'   => config('app.env') === 'production',
        'httpOnly' => false,
        'sameSite' => 'Lax',
    ],
];
