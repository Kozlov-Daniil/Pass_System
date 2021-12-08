<?php error_reporting(0); ?>
<!Doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пропуска</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <main>
    <?php require "header.php"?>
    <div class="container mt-4">
        <?php
            if($_COOKIE['user'] == 'Охрана'):
        ?>
        <h4 class="mb-4">Список пропусков</h4>
            <table class="table table-hover">
            <thead>
            <tr>
                <th>Статус</th>
                <th>Автомобиль</th>
                <th>Ожидаемая дата</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>john@example.com</td>
            </tr>
            </tbody>
        </table>

        <p><a href="exit.php">Выйти</a></p>


            <?php else: ?>
                <h4 class="mb-5" style="text-align:center;">Подайте свою заявку для въезда</h4>
        <div class="d-flex flex-wrap">
            <div class="card mb-5 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Гостевое авто</h4>
                </div>
                <div class="card-body">
                    <img class="img_form" src="img/1.png" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Оформление заявки на получение пропуск для гостей</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-dark"><a href="CarDecoration.php" style="text-decoration:none; color:white; ">Оформить заявку</a></button>
                </div>
            </div>
            <div class="card mb-5 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Такси</h4>
                </div>
                <div class="card-body">
                    <img class="img_form" src="img/2.png" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Оформление заявки на получение пропуска для такси</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-dark"><a href="CarDecoration.php" style="text-decoration:none; color:white; ">Оформить заявку</a></button>
                </div>
            </div>
            <div class="card mb-5 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Служебное авто</h4>
                </div>
                <div class="card-body">
                    <img class="img_form" src="img/3.png" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Оформление заявки на получение пропуска для служебного авто</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-dark"><a href="CarDecoration.php" style="text-decoration:none; color:white; ">Оформить заявку</a></button>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </main>
    <?php require "footer.php" ?>
</body>
</html>