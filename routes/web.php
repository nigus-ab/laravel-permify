<?php

use Illuminate\Support\Facades\Route;
use Permify\Http\Controllers\RoleController;
use Permify\Http\Controllers\PermissionController;

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
});
