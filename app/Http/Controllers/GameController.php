<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(10);
        return view('games.index', compact('games'));
    }

    public function filter(Request $request)
    {
        $query = Game::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('author')) {
            $query->whereHas('author', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('author') . '%');
            });
        }

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('category') . '%');
            });
        }

        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }

        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }

        if ($request->has('created_by')) {
            $query->whereHas('createdBy', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('created_by') . '%');
            });
        }

        $games = $query->paginate(10);
        return view('games.index', compact('games'));
    }
}
