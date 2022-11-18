<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    \Illuminate\Support\Facades\File::append(
        base_path('zz_manual.log'), 'Hello ' . now()->format('H:i:s') . PHP_EOL
    );
})->purpose('Display an inspiring quote');
