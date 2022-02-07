<?php
    
    $id_telegramm = filter_var(trim($_POST['id_telegramm']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);

    $mysql = mysqli_connect('localhost','root','','pass_system');
    mysqli_set_charset($mysql, 'utf8');

    $id_user = $_POST['id_user'];


    if ($_POST['form-type'] == 'addusers'){

        if ($_POST['button'] == 'Добавить'){
            mysqli_query($mysql, "UPDATE `users` SET `approved` = '1' WHERE `users`.`id_user` =  '$id_user'");

            $apiToken = "2141779356:AAEancJzWsHSh0Js_62mLGTocwSEOkDJq-E";
            $data = [
                 'chat_id' => $id_telegramm, 
                 'text' => "Здравствуйте, " . $name . ". Ваша регистрация подтверждена! Теперь вы можете оформлять пропуска для въезда автомобилей на территорию посёлка. Для заказа пропуска ввердите номер и марку машины"
                ];
            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data));

        } else if ($_POST['button'] == 'Бан'){
            mysqli_query($mysql, "UPDATE `users` SET `approved` = '2' WHERE `users`.`id_user` =  '$id_user'");  
            
            $apiToken = "2141779356:AAEancJzWsHSh0Js_62mLGTocwSEOkDJq-E";
            $data = [
                 'chat_id' => $id_telegramm, 
                 'text' => "Здравствуйте, " . $name . ". Ваш аккаунт находится в бане. "
                ];
            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data)); 
        }
        
    }

    // header('Location: addusers.php');
    
?> 
