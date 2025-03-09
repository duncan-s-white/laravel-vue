<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class AppController extends Controller
{

    public function all(Request $request)
    {
        return Inertia::render('Games', [
            'games' => App::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString(),
            'filters' => $request->only(['search'])
        ]);
    }

    public function view(string $id)
    {
        $response = Http::get('https://store.steampowered.com/api/appdetails?appids=' . $id);
        $game = json_decode($response, true);

        if ($game[$id]["success"] !== true) abort(404);

        $game = $game[$id]["data"];
        return Inertia::render('Game', ['game' => $game]);
    }
}
