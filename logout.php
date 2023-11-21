<?php

session_start();

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);


$level = $_SESSION["AccessPass"];
$nam = $_SESSION["AccessName"];

if($level >1){
    mysqli_query($conn, "DROP TABLE $nam;");
}

$_SESSION["AccessPass"] =0;
session_destroy();
header("location: Home.php");



?>