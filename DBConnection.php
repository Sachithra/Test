<?php

//DBConnection
error_reporting(0);
    $server="localhost";
    $username= "root";
    $password="";
    $dbconnection="productsales";

    $con=mysqli_connect($server,$username,$password,$dbconnection);

    if($con){
       // echo "Connection ok";
    }else{
        echo "Connection Fail".mysqli_connect_error();
    }
?>