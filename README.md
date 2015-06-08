# Laravel TurnKey

## Intro

This package provides a form to delete an account and display a feedback form after the process or just redirect to a goodbye page.

## Installation

First, pull in the package through Composer.

```js
"require": {
    "draperstudio/laravel-turnkey": "~1.0"
}
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    'DraperStudio\TurnKey\TurnKeyServiceProvider'
];
```

To get started, you'll need to publish the vendor assets:

```bash
php artisan vendor:publish
```
