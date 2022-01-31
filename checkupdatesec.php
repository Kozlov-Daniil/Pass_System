<?php
    $num_car = filter_var(trim($_POST['num_car']), FILTER_SANITIZE_STRING);
    $add_info = filter_var(trim($_POST['add_info']), FILTER_SANITIZE_STRING);
    $data_time = filter_var(trim($_POST['data_time']), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $full_name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
    $phone_numbers = filter_var(trim($_POST['phone_numbers']), FILTER_SANITIZE_STRING);
    $comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
 

    $mysql = new mysqli('localhost','root','','pass_system');


    mysqli_query($mysql, "UPDATE `reg_car` SET `num_car` = '$num_car', `add_info` = '$add_info', `data_time` = ' $data_time', `address` = '$address', `full_name` = '$full_name', `phone_numbers` = '$phone_numbers', `comment` = ' $comment' WHERE `reg_car`.`id` = '$id'");
    
    header('Location: Security.php')

?>
