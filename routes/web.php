<?php

use App\Http\Controllers\ProfileController;
use App\Models\App;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

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
    return Inertia::render('Games', [
        'games' => App::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(),
        'blah' => Request::only(['search'])
    ]);
});

Route::get('/games/{id}', function (string $id) {

    $response = Http::get('https://store.steampowered.com/api/appdetails?appids=' . $id);

    $game = json_decode($response, true);

    if ($game[$id]["success"] !== true) abort(404);

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
