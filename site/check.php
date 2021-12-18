<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $lot_number = filter_var(trim($_POST['lot_number']), FILTER_SANITIZE_STRING);
    $id_telegramm = filter_var(trim($_POST['id_telegramm']), FILTER_SANITIZE_STRING);


    $mysql = new mysqli('localhost','root','','pass_system');
    $mysql->query("INSERT INTO `users` (`name`, `phone_number`, `lot_number`, `id_telegramm`) VALUES ('$name', '$phone_number', '$lot_number', '$id_telegramm')");



    $mysql->close();

    header('Location: index.php');
?>