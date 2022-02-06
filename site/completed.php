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
        <h1 class="h2">Завершенные заявки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
    <table class="table">
        <thead class="thead-light">    
            <tr>
                <th style="font-size:22px;">Статус</th>
                <th style="font-size:22px;">Автомобиль</th>
                <th style="font-size:22px;">Адрес и заявитель</th>
                <th style="font-size:22px;">Ожидаемая дата</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = mysqli_connect('localhost','root','','pass_system');
                mysqli_set_charset($mysql, 'utf8');
                
                $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE (`status` = 'Завершена' OR `status` = 'Отменена')"); 
                // $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE (`status` = 'Завершена' OR `status` = 'Отменена') AND DATE(`data_time`) = CURRENT_DATE() ORDER BY `data_time` DESC"); 

                $userpass = mysqli_fetch_all($userpass);
                foreach ($userpass as $userpass){
                    ?>
                    <tr> 
                        <form action="autopark.php" method="post">
                        <input type="hidden" class="form-control" name="id" value="<?=$userpass[0]?>">  
                        <input type="hidden" class="form-control" name="form-type" value="autopark"> 
                        <td style="font-size:20px;"><button type="button" class="btn btn-secondary" style="font-size:18px;"><?= $userpass[6]?></button></td>
                        <td style="font-size:20px;"><?= $userpass[3]?><br><?= $userpass[2]?></td>
                        <td style="font-size:20px;"><?= $userpass[5]?><br><?= $userpass[6]?><br><?= $userpass[7]?> </td>
                        <td style="font-size:20px;"><?= $userpass[4]?></td>
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