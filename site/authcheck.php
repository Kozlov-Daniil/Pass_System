
<?php
    $phone_number = filter_var(trim($_POST['phone_number']), FILTER_SANITIZE_STRING);
    $id_telegramm = filter_var(trim($_POST['id_telegramm']), FILTER_SANITIZE_STRING);

    // $approved = filter_var(trim($_POST['approved']), FILTER_SANITIZE_STRING);

    $mysql = mysqli_connect('localhost','root','','pass_system');
    mysqli_set_charset($mysql, 'utf8');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `phone_number`='$phone_number' AND `id_telegramm`='$id_telegramm'");
    $user = $result->fetch_assoc();
    
    if($user == 0){
        echo "Такой пользователь не найден";
        header('Location: autherror.php');
        exit(); 
    }
    elseif ($user["approved"] == 0) {

        header('Location: expectation.php');
        exit();
    }
    elseif ($user["approved"] == 2) {

        header('Location: auth.php');
        exit();
    }

    elseif ($user["approved"] == 2) {

        $apiToken = "2141779356:AAEancJzWsHSh0Js_62mLGTocwSEOkDJq-E";
        $data = [
             'chat_id' => $id_telegramm, 
             'text' => "Здравствуйте, " . $user['name'] . ". Ваш аккаунт находится в бане. "
            ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data)); 
    }

    else{
        $apiToken = "2141779356:AAEancJzWsHSh0Js_62mLGTocwSEOkDJq-E";
        $data = [
             'chat_id' => $id_telegramm, 
             'text' => "Здравствуйте, " . $user['name'] . ". Ваша регистрация подтверждена! Теперь вы можете оформлять пропуска для въезда автомобилей на территорию посёлка. Для заказа пропуска ввердите номер и марку машины"
            ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data)); 
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    setcookie('id_user', $user['id_user'], time() + 3600, "/");

    header("Location: access.php");
    
    $mysql->close();

    
    
?>


