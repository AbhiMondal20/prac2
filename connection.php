<?php
    $_SERVER = "localhost";
    $username = "root";
    $password = "";
    $database = "note";

    $con = mysqli_connect($_SERVER, $username, $password, $database);
    if(!$con){
        die("Connection Faild's".mysqli_connect_error($con));
    }

?>