<?php

use Illuminate\Support\Facades\Route;
use Permify\Http\Controllers\RoleController;
use Permify\Http\Controllers\PermissionController;
use Permify\Http\Controllers\UserController;
use Permify\Http\Controllers\Auth\LoginController;
use Permify\Http\Controllers\Auth\RegisterController;
use Permify\Http\Controllers\Auth\ForgotPasswordController;
use Permify\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;

Route::middleware(['web', 'auth'])->prefix('permify')->group(function () {
	
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('permify.dashboard');
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
    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('permify.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('permify.logout');

    // Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('permify.register');
    Route::post('register', [RegisterController::class, 'register']);

    // Password Reset
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('permify.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('permify.password.email');

    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('permify.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('permify.password.update');
});
