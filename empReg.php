<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";



$eid = $_POST['eid'];
$telephone = $_POST['telephone'];
$name = $_POST['name'];
$email = $_POST['email'];
$designator = $_POST['designator'];
$btn1 = $_POST['btn1'];




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
echo $eid,$telephone,$name,$email,$designator;

*/

//added values to table

$sql = "INSERT INTO employee(Eid, Telephone, Name, Email, Designation) 
        VALUES('$eid','$telephone','$name','$email','$designator')";

mysqli_query($conn,$sql); // if you test comment this

header("Location: emp.html");

/*
//check values add or not (Testing purpose only)
if(mysqli_query($conn,$sql)){
    $last = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted is ".$last;
}else{

    echo"error";
}
*/

mysqli_close($conn);



?>