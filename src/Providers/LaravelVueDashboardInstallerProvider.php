<?php

namespace dacoto\LaravelInstaller\Providers;

use dacoto\LaravelInstaller\Middleware\InstallerMiddleware;
use dacoto\LaravelInstaller\Middleware\ToInstallMiddleware;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelVueDashboardInstallerProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(__DIR__.'/../Config/installer.php', 'installer');
        // Merge routes
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }

    /**
     * Bootstrap the application events.
     *
     * @param  Router  $router
     * @param  Kernel  $kernel
     */
    public function boot(Router $router, Kernel $kernel)
    {
        // Register middleware to redirect to installer if not installed
        $router->middlewareGroup('web', [ToInstallMiddleware::class]);
        // Register middleware to prevent installer if is already installed
        $router->middlewareGroup('installer', [InstallerMiddleware::class]);
        // Load views
        $this->loadViewsFrom(__DIR__.'/../Views', 'installer');
    }
}
