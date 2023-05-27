<!-- resources/views/games/index.blade.php -->
<html>
<head>
    <title>Игры</title>
    <!-- Подключение Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Игры</h1>

        <!-- Форма для фильтрации -->
        <form action="{{ route('games.filter') }}" method="GET">
            <div class="form-row">
                <div class="col">
                    <label for="name">Имя:</label>
                    <input type="text" name="name" class="form-control" value="{{ request('name') }}">
                </div>
                <div class="col">
                    <label for="author">Автор:</label>
                    <input type="text" name="author" class="form-control" value="{{ request('author') }}">
                </div>
                <div class="col">
                    <label for="category">Категория:</label>
                    <input type="text" name="category" class="form-control" value="{{ request('category') }}">
                </div>
                <div class="col">
                    <label for="price_min">Цена мин:</label>
                    <input type="number" name="price_min" class="form-control" value="{{ request('price_min') }}">
                </div>
                <div class="col">
                    <label for="price_max">Цена макс:</label>
                    <input type="number" name="price_max" class="form-control" value="{{ request('price_max') }}">
                </div>
                <div class="col">
                    <label for="created_by">Кем создано:</label>
                    <input type="text" name="created_by" class="form-control" value="{{ request('created_by') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Поиск</button>
                </div>
            </div>
        </form>

        <!-- Таблица со списком игр -->
        <table class="table">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Колличество на складе</th>
                    <th>Категория</th>
                    <th>Автор</th>
                    <th>Кем создано</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                <tr>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->description }}</td>
                    <td>{{ $game->price }}</td>
                    <td>{{ $game->stock_quantity }}</td>
                    <td>{{ $game->category->name }}</td>
                    <td>{{ $game->author->name }}</td>
                    <td>{{ $game->createdBy ? $game->createdBy->name : 'Unknown' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        {{ $games->links('pagination::bootstrap-4') }}
    </div>
</body>
</html>
