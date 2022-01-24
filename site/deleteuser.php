<?php
     $mysql = new mysqli('localhost','root','','pass_system');

     $id_user = $_GET['id_user'];

     mysqli_query($mysql, "DELETE FROM `users` WHERE `users`.`id_user` = '$id_user'");

     header('Location: allusers.php')
?>