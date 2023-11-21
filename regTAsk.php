<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";



$tid = $_POST['tid']; 
$name = $_POST['name'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];	
$nature = $_POST['nature'];
$submit = $_POST['submit'];


//build connection

$conn = mysqli_connect($servername, $username, $password, $dbname);


/*
//check connection (Testing purpose only)
if (!$conn){
    die("Connection failled!".mysqli_connect_error());
}else{
    echo "success";
}
echo $tid ,$name ,$startdate ,$enddate ,$nature ,$submit;
*/

// Add values to database table
$sql = "INSERT INTO task(Tid,Name,Start_date,End_date,Nature)
        VALUES('$tid', '$name', '$startdate', '$enddate', '$nature')";

mysqli_query($conn,$sql); // if you test comment this

/*
// check data add or not (Testing purpose only)
if(mysqli_query($conn,$sql)){
    $last = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted is ".$last;
}else{

    echo"error";
}
*/

mysqli_close($conn);
header("location: task.html");

?>