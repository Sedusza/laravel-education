<!DOCTYPE html>
<html>
<head>
    <title>Игры - Фильтр и поиск</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            padding: 20px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#filterForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var url = '/games?' + formData;

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        displayGames(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            function displayGames(data) {
                // Очистка текущих результатов
                $('#gameList').empty();

                // Вывод новых результатов
                if (data.data.length > 0) {
                    $.each(data.data, function(index, game) {
                        var listItem = '<div class="card mb-3">' +
                            '<div class="card-body">' +
                            '<h5 class="card-title">' + game.name + '</h5>' +
                            '<p class="card-text">Автор: ' + game.author + '</p>' +
                            '<p class="card-text">Категория: ' + game.category + '</p>' +
                            '<p class="card-text">Цена: ' + game.price + '</p>' +
                            '<p class="card-text">Кем создано: ' + game.created_by + '</p>' +
                            '</div>' +
                            '</div>';
                        $('#gameList').append(listItem);
                    });
                } else {
                    $('#gameList').append('<div class="alert alert-info" role="alert">Нет результатов.</div>');
                }

                // Вывод пагинации
                $('#pagination').html(data.links);
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Игры - Фильтр и поиск</h1>

        <form id="filterForm" class="mt-4">
            <div class="form-row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" placeholder="Название">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="author" placeholder="Автор">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Применить фильтр</button>
                </div>
            </div>
        </form>

        <div id="gameList" class="mt-4"></div>

        <div id="pagination" class="mt-4"></div>
    </div>
</body>
