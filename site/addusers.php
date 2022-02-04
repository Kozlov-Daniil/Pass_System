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
        <h1 class="h2">Одобрение пользователя</h1>
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
                $userpass = mysqli_query($mysql, "SELECT * FROM `users` WHERE `approved` IS NULL"); 
                $userpass = mysqli_fetch_all($userpass);
                foreach ($userpass as $userpass){
                    ?>
                    <tr>
                        <form action="userapproval.php" method="post">
                        <input type="hidden" class="form-control" name="id_user" value="<?=$userpass[3]?>">  
                        <input type="hidden" class="form-control" name="form-type" value="addusers">         
                        <td style="font-size:20px;"><?= $userpass[0]?></td>
                        <td style="font-size:20px;"><?= $userpass[1]?> </td>
                        <td style="font-size:20px;"><?= $userpass[2]?> </td>
                        <td style="font-size:20px;"> <?= $userpass[4]?> </td>
                        <td>
                            <input type="submit" name="button" value = "Добавить" style="color:white; background-color: green; border:none; padding: 7px; border-radius: 5px; margin-top: 10px; font-size:18px;"><br>
                            <input type="submit" name="button" value = "Отменить" style="color:white; background-color: gray; border:none; padding: 7px; border-radius: 5px; font-size:18px; margin-top: 10px;">
                        </td>
                    </tr>
                    </form>  
                    <?php
                }
            ?>
        </tbody>        
        </table>
        </main>
    </div>

</body>
</html>

          