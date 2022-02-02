<?php
     $mysql = mysqli_connect('localhost','root','','pass_system');
     mysqli_set_charset($mysql, 'utf8');

     $id_user = $_GET['id_user'];

     mysqli_query($mysql, "DELETE FROM `users` WHERE `users`.`id_user` = '$id_user'");

     header('Location: allusers.php')
?>