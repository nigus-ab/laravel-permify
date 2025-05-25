# Laravel-Permify

**Laravel Permify** is a powerful, easy-to-use Laravel package for managing roles and permissions with full CRUD UI and middleware support.

## Features
- Role and Permission management with CRUD operations
- Middleware to protect routes via permissions (`permission` middleware)
- Blade directives for easy permission checks (`@permission`)
- Traits for User models to assign/check roles and permissions
- Publishable migrations, views, and config
- Fully customizable admin UI with Tailwind CSS

## Installation

Require the package via Composer:

```bash
composer require nigus-ab/laravel-permify


php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="config"
php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="views"
php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="migrations"

Publish all assets with:

php artisan vendor:publish --provider="Permify\PermifyServiceProvider"
=======
php artisan migrate
>>>>>>> d97db44b8e733d9d9c60df00c036fc46b78e154a
