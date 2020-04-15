<?php

namespace dacoto\LaravelInstaller\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Controller;
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
     * @return Application|Factory|View
     */
    public function finish()
    {
        DotenvEditor::setKey('INSTALLED', true);
        DotenvEditor::save();
        return view('installer::steps.finish');
    }
}
