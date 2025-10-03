<?php

namespace Comparek\CookieConsent\Services;

use Illuminate\Support\Facades\Cookie;

class ConsentManager
{
    public function __construct(protected string $cookieName, protected array $categories) {}

    public function current(): array
    {
        $raw = Cookie::get($this->cookieName);
        $data = $raw ? json_decode($raw, true) : [];
        $data['essential'] = true;
        return is_array($data) ? $data : ['essential' => true];
    }

    public function allowed(string $category): bool
    {
        return ($this->current()[$category] ?? false) === true;
    }

    public function store(array $input): void
    {
        $payload = array_fill_keys($this->categories, false);
        $payload['essential'] = true;

        foreach ($this->categories as $cat) {
            if ($cat !== 'essential') {
                $payload[$cat] = filter_var($input[$cat] ?? false, FILTER_VALIDATE_BOOLEAN);
            }
        }

        $minutes = config('cookie-consent.lifetime_days', 180) * 1440;
        $opts = config('cookie-consent.cookie');

        Cookie::queue(
            cookie(
                $this->cookieName,
                json_encode($payload),
                $minutes,
                $opts['path'],
                $opts['domain'],
                $opts['secure'],
                $opts['httpOnly'],
                $opts['sameSite']
            )
        );
    }

    public function revoke(): void
    {
        Cookie::queue(cookie($this->cookieName, '', -5256000, '/'));
    }
}
