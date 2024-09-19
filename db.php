<?php
    $server= "localhost";
    $user= "root";
    $password= "";
    $dbname= "register";

    $conn = mysqli_connect($server,$user,$password,$dbname);

    if(!$conn){
        die("Connection error: ".mysqli_connect_error());
    }
?>