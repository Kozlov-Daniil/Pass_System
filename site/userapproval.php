<?php
    
    $mysql = new mysqli('localhost','root','','pass_system');

    $id_user = $_POST['id_user'];

    if ($_POST['form-type'] == 'addusers'){

        if ($_POST['button'] == 'Добавить'){
            mysqli_query($mysql, "UPDATE `users` SET `approved` = 'Одобрено' WHERE `users`.`id_user` =  '$id_user'");
            

        } else if ($_POST['button'] == 'Отменить'){
            mysqli_query($mysql, "DELETE FROM `users` WHERE `users`.`id_user` = '$id_user'");  
                     
        }
        
    }

    header('Location: addusers.php');
    
?> 
