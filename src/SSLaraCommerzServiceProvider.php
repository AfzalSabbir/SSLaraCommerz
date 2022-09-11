<?php

namespace AfzalSabbir\SSLaraCommerz;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SSLaraCommerzServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sslcommerz.php', 'sslaracommerz');

        $this->publishConfig();
        $this->publishViews();
        $this->publishMigrations();

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'sslaracommerz');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
     * Get route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => "AfzalSabbir\SSLaraCommerz\Http\Controllers",
            // 'middleware' => 'api',
            // 'prefix'     => 'api'
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('sslaracommerz', function () {
            return new SSLaraCommerz;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sslcommerz.php' => config_path('sslcommerz.php'),
            ], 'config');
        }
    }

    /**
     * Publish Views
     *
     * @return void
     */
    public function publishViews()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/resources/views' => resource_path('views'),
            ]);
        }
    }

    /**
     * Publish Migrations
     *
     * @return void
     */
    public function publishMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ]);
        }
    }
}
