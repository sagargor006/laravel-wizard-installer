<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'install',
    'namespace' => 'dacoto\LaravelInstaller\Controllers',
    'middleware' => ['web', 'installer']
], function () {
    Route::get('/', 'InstallIndexController@index')->name('install.index');
    Route::get('/server', 'InstallServerController@index')->name('install.server');
    Route::get('/folders', 'InstallFolderController@index')->name('install.folders');
});
