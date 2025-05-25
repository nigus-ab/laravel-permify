<?php

namespace Permify;

use Illuminate\Support\ServiceProvider;

class PermifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__.'/../config/permify.php' => config_path('permify.php'),
        ], 'config');

        // Publish migrations
        if (! class_exists('CreateRolesAndPermissionsTables')) {
            $this->publishes([
                __DIR__.'/../database/migrations/2025_05_24_000000_create_roles_and_permissions_tables.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_roles_and_permissions_tables.php'),
            ], 'migrations');
        }

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load views and allow publishing
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'permify');
        $this->publishes([
            __DIR__.'/../resources/views/permify' => resource_path('views/vendor/permify'),
        ], 'views');

    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/permify.php',
            'permify'
        );
    }
}
