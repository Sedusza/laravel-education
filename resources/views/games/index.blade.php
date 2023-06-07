<!-- resources/views/games/index.blade.php -->
<html>
<head>
    <title>Игры</title>
    <!-- Подключение Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @keyframes hoverFill {
          0% { background-color: transparent; }
          100% { background-color: #89cff0; }
        }

        .table-hover tbody tr:hover {
          animation: hoverFill 1.0s ease-in-out;
          animation-fill-mode: forwards; /* Анимация останавливается на последнем кадре */
        }

        /* Создаем разные оттенки голубого цвета для плавного заполнения */
        @keyframes gradientFill {
          0% { background-color: #89cff0; }
          50% { background-color: #a1d8f7; }
          100% { background-color: #c3e5fc; }
        }

        .fade-in {
          animation: fadeIn 1.0s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="storage/app/web/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Контакты</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <h1>Игры</h1>

        <!-- Форма для фильтрации -->

        <form action="{{ route('games.filter') }}" method="GET">
            <div class="form-row align-items-end">
                <div class="col">
                    <label for="name">Имя:</label>
                    <input type="text" name="name" class="form-control" value="{{ request('name') }}">
                </div>
                <div class="col">
                    <label for="author">Автор:</label>
                    <select name="author" class="form-control">
                        <option value="">Автор</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="category">Категория:</label>
                    <select name="category" class="form-control">
                        <option value="">Категория</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
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
                    <select name="created_by" class="form-control">
                        <option value="">Кем создано</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('created_by') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Поиск</button>
                </div>
            </div>
        </form>

        <!-- Таблица со списком игр -->
        <table class="table table-hover fade-in">
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
                <tr onclick="window.location='{{ route('games.show', $game->id) }}';" style="cursor: pointer;">
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->description }}</td>
                    <td>{{ $game->price }}</td>
                    <td>{{ $game->stock_quantity }}</td>
                    <td>{{ $game->category->name }}</td>
                    <td>{{ $game->author->name ?? '-' }}</td>
                    <td>{{ $game->createdBy ? $game->createdBy->name : '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        {{ $games->links('pagination::bootstrap-4') }}
    </div>
</body>
</html>
