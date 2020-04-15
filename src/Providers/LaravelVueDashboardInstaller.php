<?php

namespace dacoto\LaravelInstaller\Providers;

use dacoto\LaravelInstaller\Middleware\InstallMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelVueDashboardInstaller extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }

    /**
     * Bootstrap the application events.
     *
     * @param  Router  $router
     */
    public function boot(Router $router)
    {
        $router->middlewareGroup('install', [InstallMiddleware::class]);
    }

    /**
     * Publish config file for the installer.
     *
     * @return void
     */
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__.'/../Config/installer.php' => base_path('config/installer.php'),
        ], 'laravelInstaller');

        $this->publishes([
            __DIR__.'/../Views' => base_path('resources/views/vendor/installer'),
        ], 'laravelInstaller');
    }
}
