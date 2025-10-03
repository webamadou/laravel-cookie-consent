<?php

namespace Comparek\CookieConsent;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Comparek\CookieConsent\Services\ConsentManager;

class CookieConsentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/cookie-consent.php', 'cookie-consent');

        $this->app->singleton(ConsentManager::class, function () {
            return new ConsentManager(
                config('cookie-consent.cookie_name'),
                array_keys(config('cookie-consent.categories', []))
            );
        });
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cookie-consent');

        $this->publishes([
            __DIR__.'/../config/cookie-consent.php' => config_path('cookie-consent.php'),
        ], 'cookie-consent-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/cookie-consent'),
        ], 'cookie-consent-views');

        Blade::if('cookiesAllowed', fn(string $cat) => app(ConsentManager::class)->allowed($cat));
    }
}
