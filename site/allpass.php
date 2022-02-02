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
        <table class="table">
        <thead class="thead-light">    
            <tr>
                <th>ФИО</th>
                <th>Номер телефона</th>
                <th>Участок</th>
                <th>Id телеграмма</th>
            </tr>
        </thead>
        <tbody>   
            <?php

                // $mysql = new mysqli('localhost','root','','pass_system');
                $mysql = mysqli_connect('localhost','root','','pass_system');
                mysqli_set_charset($mysql, 'utf8');
                $allusers = mysqli_query($mysql, "SELECT * FROM `users`"); 
                $allusers = mysqli_fetch_all($allusers);
                foreach ($allusers as $allusers){
                    ?>
                    <tr>        
                        <td><?= $allusers[0]?> </td>
                        <td><?= $allusers[1]?> </td>
                        <td><?= $allusers[2]?> </td>
                        <td><?= $allusers[4]?> </td>
                    </tr>

                    <?php
                
                }
        
            ?>
        </tbody>    
        </table>
    </div>
<?php require "footer.php"?>
</body>
</html>