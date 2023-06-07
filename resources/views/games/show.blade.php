<!-- resources/views/games/show.blade.php -->
<html>
<head>
    <title>{{ $game->name }}</title>
    <!-- Подключение Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .game-info {
            margin-bottom: 20px;
        }

        .game-info h2 {
            margin-top: 0;
        }

        .game-info p {
            margin-bottom: 5px;
        }

        .game-description {
            margin-bottom: 20px;
        }

        .game-actions {
            margin-bottom: 20px;
        }

        .game-actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="game-info">
            <h2>{{ $game->name }}</h2>
            <p><strong>Цена:</strong> {{ $game->price }}</p>
            <p><strong>Количество на складе:</strong> {{ $game->stock_quantity }}</p>
            <p><strong>Категория:</strong> {{ $game->category->name }}</p>
            <p><strong>Автор:</strong> {{ $game->author->name ?? '-' }}</p>
            <p><strong>Кем создано:</strong> {{ $game->createdBy ? $game->createdBy->name : '-' }}</p>
        </div>

        <div class="game-description">
            <h3>Описание</h3>
            <p>{{ $game->description }}</p>
        </div>

        <div class="game-actions">
            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">Редактировать</a>
            <a href="{{ route('games.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
</body>
</html>
