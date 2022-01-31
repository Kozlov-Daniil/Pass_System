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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Security.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 15 15"></polyline></svg>
              Новые заявки
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="carter.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Авто на территории
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="completed.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="20 6 9 17 4 12"></polyline></svg>
              Завершенные заявки
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="allusers.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Пользователи
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addusers.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
              Одобрение пользователя
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CarDecorationc.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
            Оформить заявку
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="seal.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" ширина обводки ="2"stroke-linecap="round"stroke-linejoin="round" class="featherfeatherfeather"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d= "M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y= "14" ширина="12" высота="8"></rect></svg>
              Печать
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="exit.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="20" y1="12" x2="4" y2="12"></line><polyline points="10 18 4 12 10 6"></polyline></svg>              Выход
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
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
                <th style="font-size:22px;">Адрес и заявитель</th>
                <th style="font-size:22px;">Ожидаемая дата</th>
                <th style="font-size:22px;">Действия</th>
            </tr>
        </thead>
        <tbody>   
            <?php
                $mysql = new mysqli('localhost','root','','pass_system');

                $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE `status` = 'Ожидается' AND DATE(`data_time`) = CURRENT_DATE() ORDER BY `data_time`"); 
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
    </main>
  </div>
</body>
</html>

