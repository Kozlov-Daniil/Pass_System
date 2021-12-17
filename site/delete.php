<?php
     $mysql = new mysqli('localhost','root','','pass_system');

     $id = $_GET['id'];

     mysqli_query($mysql, query: "DELETE FROM `reg_car` WHERE `reg_car`.`id` = '$id'" );

     header( string 'Location: mypasses.php')
?>