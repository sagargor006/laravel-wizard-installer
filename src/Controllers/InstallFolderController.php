<?php

namespace dacoto\LaravelInstaller\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class InstallFolderController extends Controller
{
    /**
     * Welcome step
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('installer::steps.folders');
    }
}
