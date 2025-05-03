<?php

$servername = "localhost";
$usename = "root";
$password = "";
$database = "weather_app";


$conn = mysqli_connect($servername,$usename,$password,$database);

if(!$conn){
    die("sorry we failed to connect" . mysqli_connect_error());
}

?>