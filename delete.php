<?php
     $mysql = mysqli_connect('localhost','root','','pass_system');
     mysqli_set_charset($mysql, 'utf8');

     $id = $_GET['id'];

     mysqli_query($mysql, "DELETE FROM `reg_car` WHERE `reg_car`.`id` = '$id'" );

     header('Location: mypasses.php')



?>