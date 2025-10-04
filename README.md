# Comparek Laravel Cookie Consent

Design-agnostic cookie consent manager for Laravel 12+.  
Granular categories (essential, preferences, analytics, marketing), server-side gating, optional Livewire UI.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/comparek/laravel-cookie-consent.svg?style=flat-square)](https://packagist.org/packages/comparek/laravel-cookie-consent)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/comparek/laravel-cookie-consent/run-tests?label=tests)](

[Français](#français) · [English](#english)

---

## Français

### ✨ Fonctionnalités
- Catégories de cookies (Essentiels, Préférences, Analytics, Marketing)
- **Blocage serveur** via `@cookiesAllowed('analytics')` (les scripts non essentiels ne chargent pas sans consentement)
- Cookie JSON configurable (nom, durée, flags Secure/SameSite)
- **UI facultative** :
  - Vues Blade non stylées (bannière + modale)
  - **Composants Livewire 3** (ouverture/fermeture via événements, sauvegarde instantanée, feedback)

### 🚀 Installation
```bash
composer require comparek/laravel-cookie-consent
php artisan vendor:publish --tag=cookie-consent-config
# (facultatif) publier les vues de base :
php artisan vendor:publish --tag=cookie-consent-views
```
## English
### ✨ Features
- Cookie categories (Essential, Preferences, Analytics, Marketing)
- **Server-side blocking** via `@cookiesAllowed('analytics')` (non-essential scripts won't load without consent)
- Configurable JSON cookie (name, duration, Secure/SameSite flags)
- **Optional UI**:
  - Unstyled Blade views (banner + modal)
  - **Livewire 3 components** (open/close via events, instant save, feedback)
## Installation

```bash
composer require comparek/laravel-cookie-consent
php artisan vendor:publish --tag=cookie-consent-config
# (facultatif) publier les vues de base :
php artisan vendor:publish --tag=cookie-consent-views
```
