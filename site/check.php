<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $lot_number = filter_var(trim($_POST['lot_number']), FILTER_SANITIZE_STRING);
    $user_id = filter_var(trim($_POST['user_id']), FILTER_SANITIZE_STRING);


    $mysql = new mysqli('localhost','root','','pass_system');
    $mysql->query("INSERT INTO `users` (`name`, `phone_number`, `lot_number`, `user_id`) VALUES ('$name', '$phone_number', '$lot_number', '$user_id')");

    $mysql->close();

    header('Location: index.php');
?>