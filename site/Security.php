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

<div class="container-fluid">
  <div class="row">
   <?php require "navmenu.php" ?> 
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новые заявки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
    
    <table class="table">
        <thead class="thead-light">    
            <tr>
                <th style="font-size:22px;">Статус</th>
                <th style="font-size:22px;">Автомобиль</th>
                <th style="font-size:22px;">Доп информация</th>
                <th style="font-size:22px;">Комментарий</th>
                <th style="font-size:22px;">Действия</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = mysqli_connect('localhost','root','','pass_system');
                mysqli_set_charset($mysql, 'utf8');
            
                $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE `status` = 'Ожидается'"); 
                // $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE `status` = 'Ожидается' AND DATE(`data_time`) = CURRENT_DATE() ORDER BY `data_time`"); 

                $result = $mysql->query("SELECT * FROM `users`");
                $user = $result->fetch_assoc();

                $userpass = mysqli_fetch_all($userpass);
                foreach ($userpass as $userpass){
                    ?>
                    <tr>
                        <form action="autopark.php" method="post">
                        <input type="hidden" class="form-control" name="id" value="<?=$userpass[0]?>">  
                        <input type="hidden" class="form-control" name="form-type" value="autopark"> 
                        <td style="font-size:20px;"><button type="button" class="btn btn-danger" style="font-size:18px;"><?= $userpass[6]?></button></td>
                        <td style="font-size:20px;"><?= $userpass[2]?></td>
                        <td style="font-size:20px;"><?= $userpass[3]?></td>
                        <td style="font-size:20px;"><?= $userpass[5]?></td>
                        <td style="font-size:20px;">
                            <button type="button" class="btn btn-info"><a href="CarDecorationsec.php?id=<?=$userpass[0]?>" style="color:white; text-decoration:none; padding: 7px; font-size:18px; ">Редактировать</a></button><br>
                            <input type="submit" name="button" value = "Машина приехала" style="color:white; background-color: green; border:none; padding: 7px; border-radius: 5px; margin-top: 10px; font-size:18px;"><br>
                            <input type="submit" name="button" value = "Отмена" style="color:white; background-color: gray; border:none; padding: 7px; border-radius: 5px; font-size:18px; margin-top: 10px;">
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

