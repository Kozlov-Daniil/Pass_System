<?php
    
    $mysql = mysqli_connect('localhost','root','','pass_system');
    mysqli_set_charset($mysql, 'utf8');

    $id = $_POST['id'];

    if ($_POST['form-type'] == 'autopark'){
        if ($_POST['button'] == 'Машина приехала'){
            mysqli_query($mysql, "UPDATE `reg_car` SET `status` = 'На парковке' WHERE `reg_car`.`id` = '$id'");
            header('Location: Security.php');

        } else if ($_POST['button'] == 'Отмена'){
            mysqli_query($mysql, "UPDATE `reg_car` SET `status` = 'Отменена' WHERE `reg_car`.`id` = '$id'");
            header('Location: Security.php');
            

        } else if ($_POST['button'] == 'Завершить заявку'){
            mysqli_query($mysql, "UPDATE `reg_car` SET `status` = 'Завершена' WHERE `reg_car`.`id` = '$id'");
            header('Location: carter.php');
            
        }
    }

    // header('Location: Security.php');
?> 
