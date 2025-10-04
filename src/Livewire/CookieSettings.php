<?php

namespace Comparek\CookieConsent\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Comparek\CookieConsent\Facades\Consent;

class CookieSettings extends Component
{
    public bool $open = false;

    // État du formulaire (catégories dynamiques)
    public array $categories = [
        'preferences' => false,
        'analytics'   => false,
        'marketing'   => false,
    ];

    public function mount(): void
    {
        // Pré-remplit avec l'état courant
        $current = Consent::current();
        foreach ($this->categories as $cat => $val) {
            $this->categories[$cat] = (bool)($current[$cat] ?? false);
        }
    }

    #[On('cookie-settings:open')]
    public function open(): void
    {
        $this->open = true;
    }

    #[On('cookie-settings:close')]
    public function close(): void
    {
        $this->open = false;
    }

    public function acceptAll(): void
    {
        $cats = array_keys($this->categories);
        $payload = array_fill_keys($cats, true);
        Consent::store($payload);

        $this->categories = $payload;
        $this->dispatch('cookie-consent:saved', ['all' => true]); // navigateur
        $this->open = false;
    }

    public function rejectNonEssential(): void
    {
        $cats = array_keys($this->categories);
        $payload = array_fill_keys($cats, false);
        Consent::store($payload);

        $this->categories = $payload;
        $this->dispatch('cookie-consent:saved', ['all' => false]); // navigateur
        $this->open = false;
    }

    public function save(): void
    {
        // Sauvegarde granulaire
        Consent::store($this->categories);

        $this->dispatch('cookie-consent:saved', [
            'all' => !in_array(false, $this->categories, true)
        ]);
        $this->open = false;
    }

    public function revoke(): void
    {
        Consent::revoke();
        // Reset UI
        foreach ($this->categories as $k => $v) $this->categories[$k] = false;

        $this->dispatch('cookie-consent:revoked');
        $this->open = false;
    }

    public function render()
    {
        // Essential toujours vrai, on l’affiche simplement en readonly côté vue
        return view('cookie-consent::livewire.cookie-settings', [
            'definedCategories' => array_merge(['essential' => true], $this->categories),
        ]);
    }
}
