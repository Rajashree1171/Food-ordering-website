<?php
   //start session
   session_start();


   //create constant to store non repeating values
   define('SITEURL','http://localhost/food-order/');
   define('LOCALHOST','localhost');
   define('DB_USERNAME','root');
   define('DB_PASSWORD','');
   define('DB_NAME','food-order');



    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//try to connect to database and default username is root and password is blank space
    $db_select = mysqli_select_db($conn,DB_NAME)  or die(mysqli_error());//select database

?>