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
<?php require "header.php"?>
<div class="container mt-4">
    <h3 style="text-align:center;">Авторизация</h3><br>
    <p style="text-align:center;">Неверный логин или пароль<br> Попробуйте еще раз</p>
    <form action="authcheck.php" method="post" style="margin: 0 auto;">
        <input type="text" class="form-control" name="phone_number" id="phone_number" required placeholder="Введите телефон"><br>
        <input type="password" class="form-control" name="id_telegramm" id="id_telegramm"  required placeholder="Введите пароль"><br>
        <div style="text-align:center;">
            <button class="btn btn-secondary" type="submit">Отмена</button>
            <button class="btn btn-success" type="submit">Войти</button>
        </div>
    </form>
</div>
<?php require "footer.php"?>
</body>
</html>    