<?php

use Illuminate\Support\Facades\Route;
use Permify\Http\Controllers\RoleController;
use Permify\Http\Controllers\PermissionController;
use Permify\Http\Controllers\UserController;
use Permify\Http\Controllers\Auth\LoginController;
use Permify\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;

Route::middleware(['web', 'auth'])->prefix('permify')->group(function () {
    // Role routes
    Route::get('/roles', [RoleController::class, 'index'])->name('permify.roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('permify.roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('permify.roles.store');

    // Permission routes
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permify.permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permify.permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permify.permissions.store');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permify.permissions.edit');
    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permify.permissions.update');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permify.permissions.destroy');
    // User routes
    Route::get('/users', [UserController::class, 'index'])->name('permify.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('permify.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('permify.users.store');

    // Authentication Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});
