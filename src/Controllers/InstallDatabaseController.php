<?php

namespace dacoto\LaravelInstaller\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class InstallDatabaseController extends Controller
{
    /**
     * Set database settings
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function database()
    {
        if (
            in_array(false, (new InstallServerController())->check()) ||
            in_array(false, (new InstallFolderController())->check())
        ) {
            return redirect()->route('install.folders');
        }
        return view('installer::steps.database');
    }

    /**
     * Test database and set keys in .env
     *
     * @param  Request  $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function setDatabase(Request $request)
    {
        $settings = config('database.connections.mysql');
        config([
            'database' => [
                'default' => 'mysql',
                'connections' => [
                    'mysql' => array_merge($settings, [
                        'driver' => 'mysql',
                        'host' => $request->input('database_hostname'),
                        'port' => $request->input('database_port'),
                        'database' => $request->input('database_name'),
                        'username' => $request->input('database_username'),
                        'password' => $request->input('database_password'),
                        'prefix' => $request->input('database_prefix'),
                    ]),
                ],
            ],
        ]);
        try {
            DB::connection()->getPdo();
            DotenvEditor::setKeys([
                [
                    'key' => 'DB_HOST',
                    'value' => $request->input('database_hostname'),
                ],
                [
                    'key' => 'DB_PORT',
                    'value' => $request->input('database_port'),
                ],
                [
                    'key' => 'DB_DATABASE',
                    'value' => $request->input('database_name'),
                ],
                [
                    'key' => 'DB_USERNAME',
                    'value' => $request->input('database_username'),
                ],
                [
                    'key' => 'DB_PASSWORD',
                    'value' => $request->input('database_password'),
                ],
                [
                    'key' => 'DB_PREFIX',
                    'value' => $request->input('database_prefix'),
                ],
            ]);
            DotenvEditor::save();
            return redirect()->route('install.migrations');
        } catch (Exception $e) {
            return view('installer::steps.database', ['values' => $request->all(), 'error' => $e->getMessage()]);
        }
    }

    /**
     * Success database connection
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function migrations()
    {
        if (
            in_array(false, (new InstallServerController())->check()) ||
            in_array(false, (new InstallFolderController())->check()) ||
            !DB::connection()->getPdo()
        ) {
            return redirect()->route('install.database');
        }
        return view('installer::steps.migrations');
    }

    /**
     * Run laravel migrations & seeders
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function makeMigrations()
    {
        if (
            in_array(false, (new InstallServerController())->check()) ||
            in_array(false, (new InstallFolderController())->check()) ||
            !DB::connection()->getPdo()
        ) {
            return redirect()->route('install.database');
        }
        try {
            Artisan::call('migrate', ['--seed' => true]);
            return redirect()->route('install.keys');
        } catch (Exception $e) {
            return view('installer::steps.migrations', ['error' => $e->getMessage() ? $e->getMessage() : __('An error occurred while executing migrations')]);
        }
    }
}
