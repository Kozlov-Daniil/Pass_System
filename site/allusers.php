<?php
    error_reporting(0);
?>
<!Doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пользователи</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
  <div class="row">
  <?php require "navmenu.php" ?> 
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пользователи</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
    <table class="table">
        <thead class="thead-light">    
            <tr>
                <th style="font-size:22px;">ФИО</th>
                <th style="font-size:22px;">Номер телефона</th>
                <th style="font-size:22px;">Адрес пользователя</th>
                <th style="font-size:22px;">ID Телеграмма</th>
                <th style="font-size:22px;">Действия</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = mysqli_connect('localhost','root','','pass_system');
                mysqli_set_charset($mysql, 'utf8');
                $userpass = mysqli_query($mysql, "SELECT * FROM `users` WHERE `approved` = 'Одобрено' "); 
                $userpass = mysqli_fetch_all($userpass);

                foreach ($userpass as $pass){
                    ?>
                    <tr>        
                        <td style="font-size:20px;"><?= $pass[0]?></td>
                        <td style="font-size:20px;"><?= $pass[1]?> </td>
                        <td style="font-size:20px;"><?= $pass[2]?> </td>
                        <td style="font-size:20px;"> <?= $pass[4]?> </td>
                        <td>
                            <a href="usersform.php?id_user=<?=$pass[3]?>"><img class="" src="img/edit.png" alt="" ></a>
                            <a href="deleteuser.php?id_user=<?=$pass[3]?>"><img class="" src="img/trash.png" alt=""></a>
                        </td>
                    </tr>

                    <?php
                }
            ?>
        </tbody>        
        </table>
        </main>
    </div>

</body>
</html>