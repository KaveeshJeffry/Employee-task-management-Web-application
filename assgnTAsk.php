<?php

SESSION_START();
$nam = $_SESSION["AccessName"];

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

/*
//check connection (Testing purpose only)
if(!$conn){
    die("Connection failed". mysqli_connect_error());
}
else{
    echo "success";
}
*/


//Insert data into table


$sql  =  "INSERT INTO takactivitites(Tid,Activity)
        SELECT taskid,act FROM $nam;";  
    if ($conn->query($sql) === true)  
{  
    echo "Data Tranfer success";  
}  
else
{  
    echo "ERROR: Could not able to proceed $sql_query. "
        .$conn->error;  
}  
  

//cleen temp table
$query = "DELETE FROM $nam;";
$result = mysqli_query($conn,$query);

// Close the  connection  
$conn->close();  
header("location: Activity.php");
?> 


    



