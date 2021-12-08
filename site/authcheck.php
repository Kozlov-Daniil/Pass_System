<?php
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $id_user = filter_var(trim($_POST['id_user']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','','passes');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `phone_number`='$phone_number' AND `id_user`='$id_user'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();

    header('Location: /Passes');
    
?>