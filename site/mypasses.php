<?php error_reporting(0); ?>
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
        <table class="table">
        <thead class="thead-light">    
            <tr>
                <th>id</th>
                <th>Номер машины</th>
                <th>Ожидаемая дата</th>
                <th>Редактирование</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = new mysqli('localhost','root','','pass_system');
                
                $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car`"); 
                $userpass = mysqli_fetch_all($userpass);
                foreach ($userpass as $userpass){
                    ?>
                    <tr>        
                        <td><?= $userpass[0]?> </td>
                        <td><?= $userpass[2]?> </td>
                        <td><?= $userpass[4]?> </td>
                        <td>
                            <a href="update.php?id=<?$userpass[0]?>"><img class="" src="img/edit.png" alt="" ></a>
                            <a href="delete.php?id=<?$userpass[0]?>"><img class="" src="img/trash.png" alt=""></a>
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