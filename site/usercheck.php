<?php
    $lot_number = filter_var(trim($_POST['lot_number']), FILTER_SANITIZE_STRING);
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $id_user = filter_var(trim($_POST['id_user']), FILTER_SANITIZE_STRING);
    $id_telegramm = filter_var(trim($_POST['id_telegramm']), FILTER_SANITIZE_STRING);


    $mysql = new mysqli('localhost','root','','pass_system');

    mysqli_query($mysql, "UPDATE `users` SET `id_user` = '$id_user', `name` = '$name', `phone_number` = ' $phone_number', `lot_number` = '$lot_number', `id_telegramm` = '$id_telegramm',  WHERE `users`.`id_user` = '$id_user'");
    
    header('Location: allusers.php')

?>
