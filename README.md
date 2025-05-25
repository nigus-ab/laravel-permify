# Laravel-Permify

**Laravel-Permify** is a flexible, developer-friendly permission and role management package for Laravel.

## Features
- Role-based and permission-based access
- Granular control (e.g., field or action-level)
- Role inheritance
- Blade directives and middleware
- Easy integration with Laravel’s auth

## Installation

```bash
composer require nigus-abate/laravel-permify
php artisan vendor:publish --tag="permify-config"
php artisan migrate
