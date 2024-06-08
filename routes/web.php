<?php

use App\Livewire\Landing;
use App\Models\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Landing::class);

if (Schema::hasTable('apps')) {
    $apps = App::get();

    if($apps) {
        foreach($apps as $app) {
            Route::get('/' . $app->url, \App\Livewire\Detail::class);
        }
    }
}

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
