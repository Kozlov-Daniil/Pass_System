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
    <div class="container sps" >
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="completed.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img  src="img/arow.png" alt="">
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-dark " style="font-size:20px;">Список пропусков</a></li>
        </ul>
        <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-secondary me-2" onClick="window.print()" style="font-size:20px;">Распечатать</button>
        </div>
        </header>
    </div>
        <div class="container mt-4 spi">
        <table class="table print">
            <thead class="thead-light">    
                <tr>
                    <th style="font-size:22px;">Статус</th>
                    <th style="font-size:22px;">Автомобиль</th>
                    <th style="font-size:22px;">Адрес и заявитель</th>
                    <th style="font-size:22px;">Дата и время</th>
                </tr>
            </thead>
            <tbody>   
                <?php
                    $mysql = new mysqli('localhost','root','','pass_system');
                    
                    $userpass = mysqli_query($mysql, "SELECT * FROM `reg_car` WHERE `status` = 'Завершена' OR `status` = 'Отменена'"); 
                    $userpass = mysqli_fetch_all($userpass);
                    foreach ($userpass as $userpass){
                        ?>
                        <tr> 
                            <form action="autopark.php" method="post">
                            <input type="hidden" class="form-control" name="id" value="24?>">  
                            <input type="hidden" class="form-control" name="form-type" value="autopark" > 
                            <td style="font-size:20px;"><button type="button" class="btn btn-secondary" style="font-size:18px;"><?= $userpass[9]?></button></td>
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
        </div>
</body>
</html>

