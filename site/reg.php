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
<div class="container mt-4" >
    <h3 style="text-align:center;">Регистрация</h3><br>
    <form action="check.php" method="post" style="margin: 0 auto;">
        <input type="text" class="form-control" name="name" id="name" placeholder="Введите Имя"><br>
        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Введите телефон"><br>
        <input type="text" class="form-control" name="lot_number" id="lot_number" placeholder="Введите номер участка"><br>
        <input type="password" class="form-control" name="id_telegramm" id="id_telegramm" placeholder="Введите ваш id телеграмма"><br>
        <div style="text-align:center;">
            <button class="btn btn-secondary" type="submit">Отмена</button>
            <button class="btn btn-success" type="submit">Зарегистрироваться</button>
        </div>
    </form>
</div>
<?php require "footer.php"?>
</body>
</html>       