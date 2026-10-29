<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('demo:status', function (): void {
    $this->info('Laravel demo is ready.');
})->purpose('Check the Laravel demo application');
