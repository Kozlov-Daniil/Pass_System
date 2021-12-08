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
    <?php  require "header.php"?>
    <div class="container mt-4">
        <h3>Мои пропуска</h3>         
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
    </div>
    <?php require "footer.php" ?>
</body>
</html>