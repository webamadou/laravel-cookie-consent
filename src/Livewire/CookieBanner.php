<?php

namespace Comparek\CookieConsent\Livewire;

use Livewire\Component;
use Comparek\CookieConsent\Facades\Consent;

class CookieBanner extends Component
{
    public bool $visible = false;

    public function mount(): void
    {
        $state = Consent::current();
        // S'il n'existe pas de clés non essentielles, on considère que l’utilisateur n’a pas répondu
        $this->visible = !array_key_exists('analytics', $state)
            && !array_key_exists('marketing', $state)
            && !array_key_exists('preferences', $state);
    }

    public function openSettings(): void
    {
        $this->dispatch('cookie-settings:open');
    }

    public function acceptAll(): void
    {
        Consent::store([
            'preferences' => true,
            'analytics'   => true,
            'marketing'   => true,
        ]);
        $this->dispatch('cookie-consent:saved', ['all' => true]);
        $this->visible = false;
    }

    public function reject(): void
    {
        Consent::store([
            'preferences' => false,
            'analytics'   => false,
            'marketing'   => false,
        ]);
        $this->dispatch('cookie-consent:saved', ['all' => false]);
        $this->visible = false;
    }

    public function render()
    {
        return view('cookie-consent::livewire.cookie-banner');
    }
}
