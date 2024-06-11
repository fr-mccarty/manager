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

try {
    if (Schema::hasTable('apps')) {
        $apps = App::get();
        foreach($apps as $app) {
            Route::get('/' . $app->url, \App\Livewire\Detail::class);
        }
    }
} catch (\Exception $e) {
    // Handle the exception
    \Log::error('An error occurred: ' . $e->getMessage());
}

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

    Route::get('/global-utilities', \App\Livewire\GlobalUtilities::class)->name('global-utilities');

    Route::get('apps/create', \App\Livewire\AppEdit::class)->name('apps.create');
    Route::get('apps/{appId}', \App\Livewire\AppEdit::class)->name('apps.edit');
    Route::get('apps', \App\Livewire\AppsIndex::class)->name('apps.index');

    // Insert Above
});
