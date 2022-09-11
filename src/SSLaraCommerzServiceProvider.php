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
        $this->mergeConfigFrom(__DIR__ . '/../config/sslcommerz.php', 'sslcommerz');

        $this->publishConfig();
        $this->publishViews();
        $this->publishMigrations();
        //$this->publishModel();
        $this->publishAssets();
        $this->publishRoutesAndController();

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
    public function publishConfig(): void
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
    public function publishViews(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/resources/views' => resource_path('views'),
            ], 'views');
        }
    }

    /**
     * Publish Migrations
     *
     * @return void
     */
    public function publishMigrations(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }

    /**
     * Publish Model
     *
     * @return void
     */
    public function publishModel(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Models/Order.php' => app_path('Models/Order.php'),
            ], 'model');
        }
    }

    /**
     * Publish Assets
     *
     * @return void
     */
    public function publishAssets(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('assets'),
            ], 'public-assets');
        }
    }

    /**
     * Publish  Routes And Controller
     *
     * @return void
     */
    public function publishRoutesAndController(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Http/publish-routes.php' => base_path('routes/sslcommerz.php'),
                __DIR__ . '/Http/Controllers/PublishSslCommerzPaymentController.php' => app_path('Http/Controllers/SslCommerzPaymentController.php'),
            ], 'routes-controller');
        }
    }
}
