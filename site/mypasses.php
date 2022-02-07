<?php  ?>
<!Doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои Пропуска</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php  require "header.php"?>
    <div class="container mt-4">
        <h1 style = "text-align:center;">Мои пропуска</h1><br>
        <table class="table">
        <thead class="thead-light">    
            <tr>
                <th>Статус</th>
                <th>Номер машины</th>
                <th>Доп. информация</th>
                <th>Дата создания заявки</th>
                <th>Редактирование</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = mysqli_connect('localhost','root','','pass_system');
                mysqli_set_charset($mysql, 'utf8');
                $id_user = $_COOKIE['id_user'];
                $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE `id_user` = $id_user"); 
                $userpass = mysqli_fetch_all($userpass);

                foreach ($userpass as $pass){
                    ?>
                    <tr>        
                        <td><button type="button" class="btn btn-secondary"><?= $pass[6]?></button></td>
                        <td><?= $pass[2]?> </td>
                        <td><?= $pass[3]?> </td>
                        <td><?= $pass[4]?> </td>
                        <td>
                            <a href="update.php?id=<?=$pass[0]?>"><img class="" src="img/edit.png" alt="" ></a>
                            <a href="delete.php?id=<?=$pass[0]?>"><img class="" src="img/trash.png" alt=""></a>
                        </td>
                    </tr>

                    <?php
                }
            ?>
        </tbody>    
        </table>
    </div>
    <?php require "footer.php" ?>
</body>
</html>

