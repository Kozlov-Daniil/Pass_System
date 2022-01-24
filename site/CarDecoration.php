<?php 
    error_reporting(0);
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
    <?php require "header.php" ?>
    <div class="container mt-4">
        <h3 style="text-align:center;">Заполнение основной инофрмации</h3><br>
        <form action="checkcar.php" method="post" style="margin: 0 auto;" >

            <input type="hidden" class="form-control" name="id_user" value="<?php echo $_COOKIE['id_user']; ?>">

            <label for="num_car">Гос. номер авто*</label>
            <input type="text" class="form-control" name="num_car" id="num_car"><br>

            <label for="data_time">Ожидаемая дата и время*</label>
            <input type="datetime-local" class="form-control" name="data_time" id="data_time"><br>

            <label for="full_name">Ваше ФИО*</label>
            <input type="text" class="form-control" name="full_name" id="full_name"><br>

            <button class="btn btn-secondary">Отмена</button>
            <button class="btn btn-success" type="submit">Создать заявку</button>
        </form>
    </div>
    <?php require "footer.php" ?>
</body>
</html>    
