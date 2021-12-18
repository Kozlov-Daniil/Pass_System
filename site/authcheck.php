
<?php
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $id_telegramm = filter_var(trim($_POST['id_telegramm']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','','pass_system');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `phone_number`='$phone_number' AND `id_telegramm`='$id_telegramm'");
    $user = $result->fetch_assoc();

    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    setcookie('id_user', $user['id_user'], time() + 3600, "/");

    $mysql->close();

    header('Location: index.php');
    
?>