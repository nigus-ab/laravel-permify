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
php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="views"
php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="traits"

Publish all assets with:

php artisan vendor:publish --provider="Permify\PermifyServiceProvider"
=======
php artisan migrate
# Serve the app
php artisan serve

Usage

    Add the HasAdvancedRoles trait to your User model:

    use Permify\Traits\HasAdvancedRoles;

	class User extends Authenticatable
	{
	    use HasAdvancedRoles;
	    // ...
	}

>>>>>>> d97db44b8e733d9d9c60df00c036fc46b78e154a
Routes included:

    /login, /register, /logout for authentication

    /password/reset and related routes for password reset

    /permify/roles and /permify/permissions for role & permission management

    /permify/dashboard for the admin dashboard

All views are Tailwind CSS styled and support dark/light mode, located at resources/views/vendor/permify.

# Customization

- Publish views to customize UI:
php artisan vendor:publish --provider="Permify\PermifyServiceProvider" --tag="views"


    Extend or override controllers and routes as needed.

Testing

You can test the package inside your Laravel app by visiting the routes and managing users, roles, and permissions.
License

MIT

Credits

Developed by Nigus Abate


---

### Auth Routes (add to your `routes/web.php` or a dedicated `auth.php` loaded from the service provider)

```php
<?php

use Illuminate\Support\Facades\Route;
use Permify\Http\Controllers\Auth\LoginController;
use Permify\Http\Controllers\Auth\RegisterController;
use Permify\Http\Controllers\Auth\ForgotPasswordController;
use Permify\Http\Controllers\Auth\ResetPasswordController;

Route::middleware('web')->group(function () {
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Password Reset Routes
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

