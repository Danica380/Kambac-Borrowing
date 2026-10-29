<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'databaseDriver' => config('database.default'),
    'pdoMysqlAvailable' => extension_loaded('pdo_mysql'),
    'storagePath' => storage_path(),
]);
