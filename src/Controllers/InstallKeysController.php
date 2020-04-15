<?php

namespace dacoto\LaravelInstaller\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class InstallKeysController extends Controller
{
    /**
     * Confirm database migrations & confirm to generate new keys
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function index()
    {
        if (
            in_array(false, (new InstallServerController())->check()) ||
            in_array(false, (new InstallFolderController())->check()) ||
            !DB::connection()->getPdo()
        ) {
            return redirect()->route('install.database');
        }
        return view('installer::steps.keys');
    }

    /**
     * Set new keys and generate storage link
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function setKeys()
    {
        try {
            Artisan::call('key:generate');
            Artisan::call('jwt:secret', ['--always-no' => true]);
            Artisan::call('storage:link');
            if (empty(DotenvEditor::getValue('APP_KEY')) || empty(DotenvEditor::getValue('JWT_SECRET'))) {
                return view('installer::steps.keys', ['error' => __('The application keys could not be generated.')]);
            }
            return redirect()->route('install.finish');
        } catch (Exception $e) {
            return view('installer::steps.keys', ['error' => $e->getMessage()]);
        }
    }
}
