<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlShorteningController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard', [
        'laravelVersion' => Application::VERSION,
    ]);
})->name('dashboard');

Route::inertia('/about', 'About');

// Route::inertia('/rovers', 'Rovers');

Route::get('/games', [AppController::class, 'all']);

Route::get('/games/{id}', [AppController::class, 'view']);

Route::get('/url/shorten', [UrlShorteningController::class, 'create']);

Route::post('/url/shorten', [UrlShorteningController::class, 'store'])->name('url.shorten');

Route::get('/url/look-up', [UrlShorteningController::class, 'show'])->name('url.look-up');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
