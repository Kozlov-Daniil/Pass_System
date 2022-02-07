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

        <label for="name">Введите ваше ФИО</label>
        <input type="text" class="form-control" name="name" id="name" required placeholder="Иванов Иван Иванович"><br>

        <label for="num_car">Введите ваш телефон</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number" required placeholder="79998886655"><br>

        <label for="num_car">Введите номер участка</label>
        <input type="text" class="form-control" name="lot_number" id="lot_number" required placeholder="Ул. Красная д. 10"><br>

        <label for="num_car">Введите ваш id телеграмма</label>
        <input type="password" class="form-control" name="id_telegramm" id="id_telegramm" required ><br>
        <div style="text-align:center;">
            <button class="btn btn-secondary" type="submit">Отмена</button>
            <button class="btn btn-success" type="submit">Зарегистрироваться</button>
        </div>
    </form>
</div>
<?php require "footer.php"?>
</body>
</html>       