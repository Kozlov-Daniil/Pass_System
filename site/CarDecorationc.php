<?php 
    error_reporting(0);
?>
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
        <h1 class="h2">Оформление заявки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
            <h3 style="text-align:center;">Заполнение основной инофрмации</h3><br>
            <form action="checkcar.php" method="post" style="margin: 0 auto;" >

                <input type="hidden" class="form-control" name="id_user" value="<?php echo $_COOKIE['id_user']; ?>">

                <label for="num_car">Гос. номер авто*</label>
                <input type="text" class="form-control"  name="num_car" id="num_car" required placeholder="А000АА"><br>

                <label for="data_time">Ожидаемая дата и время*</label>
                <input type="datetime-local" class="form-control" name="data_time" id="data_time" required><br>

                <label for="full_name">Ваше ФИО*</label>
                <input type="text" class="form-control" name="full_name" id="full_name" required placeholder="Иванов Иван Иванович"><br>

                <button class="btn btn-success" type="submit" >Создать заявку</button>
            </form>
        </main>
    </div>
</body>
</html>    
