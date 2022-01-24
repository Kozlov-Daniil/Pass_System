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
<div class="container" >
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="exit.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
       Выйти
      </a>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-dark " style="font-size:20px;">Список пропусков</a></li>
      </ul>
      <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-light" ><a href="CarDecoration.php" style="font-size:20px; text-decoration: none; ">Оформить заявку</a></button>
      </div>
    </header>
    
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-tabs">
    <li><a href="allusers.php" class="nav-link px-2 link-dark" style="font-size:20px;">Пользователи</a></li>
    <li><a href="Security.php" class="nav-link px-2 link-active" style="font-size:20px;">Новые заявки</a></li>
        <li><a href="carter.php" class="nav-link px-2 link-dark" style="font-size:20px;">Авто на территории</a></li>
        <li><a href="completed.php" class="nav-link px-2 link-dark" style="font-size:20px;">Звершенные заявки</a></li>
        <li><a href="seal.php" class="nav-link px-2 link-dark" style="font-size:20px;">Печать</a></li>
      </ul>
   
    <div class="container mt-4">
    <table class="table">
        <thead class="thead-light">    
            <tr>
                <th style="font-size:22px;">Статус</th>
                <th style="font-size:22px;">Автомобиль</th>
                <th style="font-size:22px;">Адрес и заявитель</th>
                <th style="font-size:22px;">Ожидаемая дата</th>
                <th style="font-size:22px;">Действия</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = new mysqli('localhost','root','','pass_system');

                $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE `status` = 'Ожидается'"); 
                $userpass = mysqli_fetch_all($userpass);
                foreach ($userpass as $userpass){
                    ?>
                    <tr>
                        <form action="autopark.php" method="post">
                        <input type="hidden" class="form-control" name="id" value="<?=$userpass[0]?>">  
                        <input type="hidden" class="form-control" name="form-type" value="autopark"> 
                        <td style="font-size:20px;"><button type="button" class="btn btn-danger" style="font-size:18px;"><?= $userpass[9]?></button></td>
                        <td style="font-size:20px;"><?= $userpass[3]?><br><?= $userpass[2]?></td>
                        <td style="font-size:20px;"><?= $userpass[5]?><br><?= $userpass[6]?><br><?= $userpass[7]?> </td>
                        <td style="font-size:20px;"><?= $userpass[4]?></td>
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
    </div>

</body>
</html>