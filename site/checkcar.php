<?php
    $num_car = filter_var(trim($_POST['num_car']), FILTER_SANITIZE_STRING);
    $add_info = filter_var(trim($_POST['add_info']), FILTER_SANITIZE_STRING);
    $data_time = filter_var(trim($_POST['data_time']), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $full_name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
    $phone_numbers = filter_var(trim($_POST['phone_numbers']), FILTER_SANITIZE_STRING);
    $comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);
    $id_user = filter_var(trim($_POST['id_user']), FILTER_SANITIZE_STRING);



    $mysql = mysqli_connect('localhost','root','','pass_system');
    mysqli_set_charset($mysql, 'utf8');

    $mysql->query("INSERT INTO `reg_car` (`id_user`, `num_car`, `add_info`, `data_time`, `address`, `full_name`, `phone_numbers`, `comment`) VALUES ( '$id_user','$num_car', '$add_info', '$data_time', '$address', '$full_name', '$phone_numbers', '$comment')");


    $mysql->close();

    header('Location: index.php');
?>

