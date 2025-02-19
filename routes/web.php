<?php

use App\Http\Controllers\ProfileController;
use App\Models\App;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return Inertia::render('About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::inertia('/about', 'About');

Route::inertia('/rovers', 'Rovers');

Route::get('/games', function () {
    return Inertia::render('Games', ['games' => App::paginate(10)]);
});

Route::get('/games/{id}', function (string $id) {

    $response = Http::get('https://store.steampowered.com/api/appdetails?appids=' . $id);

    $game = json_decode($response, true);

    $game = $game[$id]["data"];

    return Inertia::render('Game', ['game' => $game]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
