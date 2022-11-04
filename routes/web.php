<?php

use Illuminate\Support\Facades\Route;
use Spatie\RouteDiscovery\Discovery\Discover;

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

Route::get('/', fn () => inertia('Welcome'));
Route::get('/about', fn () => inertia('About'));
Route::get('/quiz', fn () => inertia('Quiz'));
Route::get('/results', fn () => inertia('Results'));
Route::get('/renderless', fn () => inertia('Renderless'));

Route::group([
    'prefix' => 'api'
], fn() => Discover::controllers()->in(app_path('Http/Controllers/Api')));


Route::get('/remote-template', function () {
    $data = [
        'user' => (object) ['email' => 'user@me.com']
    ];

    return \Illuminate\Support\Facades\Blade::render(
        <<<'BLADE'
        <span>
            I am loaded from a server, woohoo {{ $user->email }}
        </span>

        <MyCustomComponent />
        BLADE, $data);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
