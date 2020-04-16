<?php

namespace dacoto\LaravelInstaller\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class InstallIndexController extends Controller
{
    /**
     * Welcome step
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('installer::steps.welcome');
    }

    /**
     * Success installed
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function finish()
    {
        if (
            in_array(false, (new InstallServerController())->check()) ||
            in_array(false, (new InstallFolderController())->check()) ||
            !DB::connection()->getPdo() ||
            empty(DotenvEditor::getValue('APP_KEY')) ||
            empty(DotenvEditor::getValue('JWT_SECRET'))
        ) {
            return redirect()->route('install.database');
        }
        DotenvEditor::setKey('INSTALLED', true);
        DotenvEditor::save();
        Artisan::call('route:cache');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('optimize:clear');
        Artisan::call('auth:clear-resets');
        return view('installer::steps.finish');
    }
}
