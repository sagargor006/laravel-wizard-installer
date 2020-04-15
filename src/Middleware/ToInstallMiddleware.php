<?php

namespace dacoto\LaravelInstaller\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ToInstallMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if (!env('INSTALLED', false) && explode('/', $request->route()->uri())[0] !== 'install') {
            return redirect()->route('install.index');
        }
        return $next($request);
    }
}
