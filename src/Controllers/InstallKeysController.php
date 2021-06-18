<?php

namespace dacoto\LaravelWizardInstaller\Controllers;

use dacoto\LaravelWizardInstaller\Support\EnvEditor;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
            !DB::connection()->getPdo() ||
            in_array(false, (new InstallServerController())->check(), true) ||
            in_array(false, (new InstallFolderController())->check(), true)
        ) {
            return redirect()->route('LaravelWizardInstaller::install.database');
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
        if (
            !DB::connection()->getPdo() ||
            in_array(false, (new InstallServerController())->check(), true) ||
            in_array(false, (new InstallFolderController())->check(), true)
        ) {
            return redirect()->route('LaravelWizardInstaller::install.database');
        }
        try {
            Artisan::call('key:generate', ['--force' => true, '--show' => true]);
            if (empty(EnvEditor::getEnv('APP_KEY'))) {
                EnvEditor::setEnv('APP_KEY', trim(str_replace('"', '', Artisan::output())));
            }
            Artisan::call('storage:link');
            if (empty(EnvEditor::getEnv('APP_KEY'))) {
                return view('installer::steps.keys', ['error' => 'The application keys could not be generated.']);
            }
            return redirect()->route('LaravelWizardInstaller::install.finish');
        } catch (Exception $e) {
            return view('installer::steps.keys', ['error' => $e->getMessage()]);
        }
    }
}
