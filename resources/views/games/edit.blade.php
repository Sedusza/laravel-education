<!-- resources/views/games/edit.blade.php -->
<html>
<head>
    <title>Редактировать игру</title>
    <!-- Подключение Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Редактировать игру</h1>

        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Здесь добавьте поля для редактирования записи -->

            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" class="form-control" value="{{ $game->name }}">
            </div>

            <!-- Добавьте остальные поля для редактирования -->

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('games.show', $game->id) }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
</body>
</html>
