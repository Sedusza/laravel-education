<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Categorie;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(10);
        $authors = Author::all(); // Получаем список авторов
        $categories = Categorie::all(); // Получаем список категорий
        $users = User::all(); // Получаем список пользователей

        return view('games.index', compact('games', 'authors', 'categories', 'users'));
    }

    public function filter(Request $request)
    {
        $query = Game::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('author')) {
            $query->whereHas('author', function ($q) use ($request) {
                $q->where('id', 'like', '%' . $request->input('author') . '%');
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', 'like', '%' . $request->input('category') . '%');
            });
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }

        if ($request->filled('created_by')) {
            $query->whereHas('createdBy', function ($q) use ($request) {
                $q->where('id', 'like', '%' . $request->input('created_by') . '%');
            });
        }

        $games = $query->paginate(10); //Получаем список с пагнацией

        $authors = Author::all(); // Получаем список авторов
        $categories = Categorie::all(); // Получаем список категорий
        $users = User::all(); // Получаем список пользователей

        return view('games.index', compact('games', 'authors', 'categories', 'users'));
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }

    public function create(){

    }
    public function edit()
    {

        $game = Game::findOrFail($id); // Получение игры по ее ID

        // Здесь также можете передать другие данные, необходимые для редактирования

        return view('games.edit', compact('game'));

    }

    public function update(Request $request, $id)
{
    $game = Game::findOrFail($id); // Получение игры по ее ID

    // Валидация данных, полученных из формы

    $game->name = $request->input('name');
    // Обновите остальные поля, которые нужно обновить

    $game->save();

    return redirect()->route('games.show', $game->id)->with('success', 'Игра успешно обновлена.');
}

}
