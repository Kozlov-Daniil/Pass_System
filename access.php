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
    <h3 style="text-align:center;">Вы успешно авторизовались!</h3><br>
    <p style="text-align:center; font-size:20px;">Перейдите в телеграм для подачи завки или оформите ее на сайте.</p>
    <div style ="text-align:center;"><br>
    <button type="button" class="btn btn-secondary"><a href = "index.php" style ="color:white; text-decoration: none; font-size: 20px;">Перейти к оформлению пропуска</a></button>
    </div>
</div>
<?php require "footer.php"?>
</body>
</html>    