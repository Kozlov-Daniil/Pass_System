
<?php
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $id_telegramm = filter_var(trim($_POST['id_telegramm']), FILTER_SANITIZE_STRING);
    // $approved = filter_var(trim($_POST['approved']), FILTER_SANITIZE_STRING);

    $mysql = mysqli_connect('localhost','root','','pass_system');
    mysqli_set_charset($mysql, 'utf8');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `phone_number`='$phone_number' AND `id_telegramm`='$id_telegramm'");
    $user = $result->fetch_assoc();
    
    if($user == NULL){

        echo "Такой пользователь не найден";
        header('Location: autherror.php');
        exit(); 
    }
    elseif ($user["approved"] == NULL) {

        header('Location: expectation.php');
        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    setcookie('id_user', $user['id_user'], time() + 3600, "/");

    $mysql->close();

    header('Location: index.php');
    
?>


<!-- header('Location: expectation.php'); -->
<!-- AND `approved`= 'Одобрено' -->