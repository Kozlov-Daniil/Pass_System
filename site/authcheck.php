
<?php
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $user_id = filter_var(trim($_POST['user_id']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','','pass_system');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `phone_number`='$phone_number' AND `user_id`='$user_id'");
    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Такой пользователь не найден";
        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();

    header('Location: index.php');
    
?>