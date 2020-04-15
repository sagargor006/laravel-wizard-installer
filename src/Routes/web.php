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
    Route::get('/database', 'InstallDatabaseController@database')->name('install.database');
    Route::post('/database', 'InstallDatabaseController@setDatabase');
    Route::get('/migrations', 'InstallDatabaseController@migrations')->name('install.migrations');
    Route::post('/migrations', 'InstallDatabaseController@makeMigrations');
    Route::get('/keys', 'InstallKeysController@index')->name('install.keys');
    Route::post('/keys', 'InstallKeysController@setKeys');
    Route::get('/finish', 'InstallIndexController@finish')->name('install.finish');
});
