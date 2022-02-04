<?php
    
    $mysql = new mysqli('localhost','root','','pass_system');

    $id_user = $_POST['id_user'];

    if ($_POST['form-type'] == 'addusers'){

        if ($_POST['button'] == 'Добавить'){
            mysqli_query($mysql, "UPDATE `users` SET `approved` = '1' WHERE `users`.`id_user` =  '$id_user'");
            

        } else if ($_POST['button'] == 'Бан'){
            mysqli_query($mysql, "UPDATE `users` SET `approved` = '2' WHERE `users`.`id_user` =  '$id_user'");  
                     
        }
        
    }

    header('Location: addusers.php');
    
?> 
