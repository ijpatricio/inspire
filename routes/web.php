<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', );
});

Route::get('/remote-template', function () {
    $data = [
        'user' => (object) ['email' => 'ask@me.com']
    ];

    return \Illuminate\Support\Facades\Blade::render(
        <<<'BLADE'
        <span>
            I am loaded from a server, woohoo {{ $user->email }}
        </span>
        <MyCustomComponent />
        BLADE, $data);
});
