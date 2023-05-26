<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        // Применение фильтров
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }

        // Применение сортировки
        $query->orderBy('name', 'asc');

        // Получение пагинированных результатов
        $perPage = 10; // Количество записей на страницу
        $games = $query->paginate($perPage);

        return response()->json($games);
    }
}
