<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "sapa";



try{
    $conn=new mysqli($servername,$username,$password,$dbname);

}catch(mysqli_sql_exception $e){
    echo $e->getMessage();
}