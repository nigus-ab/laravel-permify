# Installation Guide

### 1. Install the Package

```bash
composer require yourvendor/laravel-permify
php artisan vendor:publish --tag=permify-config
php artisan migrate


$user->assignRole('admin');
$user->givePermissionTo('edit_post');

if ($user->hasPermission('edit_post')) {
    // show edit interface
}
