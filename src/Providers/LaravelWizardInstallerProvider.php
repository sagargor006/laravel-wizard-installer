<?php

namespace dacoto\LaravelWizardInstaller\Providers;

use dacoto\LaravelWizardInstaller\Middleware\InstallerMiddleware;
use dacoto\LaravelWizardInstaller\Middleware\ToInstallMiddleware;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelWizardInstallerProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/installer.php', 'installer');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }

    public function boot(Router $router, Kernel $kernel): void
    {
        $kernel->prependMiddlewareToGroup('web', ToInstallMiddleware::class);
        $router->pushMiddlewareToGroup('installer', InstallerMiddleware::class);
        $this->loadViewsFrom(__DIR__.'/../Views', 'installer');
    }
}
