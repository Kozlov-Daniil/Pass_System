<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $id_user = filter_var(trim($_POST['id_user']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','','pass_system');
    $mysql->query("INSERT INTO `users` (`name`, `phone_number`, `id_user`) VALUES ('$name', '$phone_number', '$id_user')");

    $mysql->close();

    header('Location: /Passes/index.php');
?>
