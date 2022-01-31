<?php 
    error_reporting(0);
?>
<?php
    $mysql = new mysqli('localhost','root','','pass_system');

    $userpass_id = $_GET['id_user'];
    $userpass = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id_user` = '$userpass_id'");
    $userpass = mysqli_fetch_assoc($userpass);

?>
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
    <?//php require "header.php" ?>
    <div class="container mt-4">
        <h3 style="text-align:center;">Заполнение основной инофрмации</h3><br>
        <form action="usercheck.php" method="post" style="margin: 0 auto;" >

            <input type="hidden" class="form-control" name="id_user" value="<?= $userpass['id_user'] ?>">

            <label for="name">ФИО</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $userpass['name'] ?>"><br>

            <label for="phone_numbers">Телефон</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?= $userpass['phone_number'] ?>"><br>

            <label for="address">Адрес</label>
            <input type="text" class="form-control" name="lot_number" id="lot_number" value="<?= $userpass['lot_number'] ?>"><br>

            <label for="comment">ID Телеграмм</label>
            <input type="text" class="form-control" name="id_telegramm" id="id_telegramm" value="<?= $userpass['id_telegramm'] ?>"><br>

            <button class="btn btn-secondary">Отмена</button>
            <button class="btn btn-success" type="submit">Обновить</button>
        </form>
    </div>
    <?//php require "footer.php" ?>
</body>
</html>