<?php
SESSION_START();
$r=$_SESSION["AccessPass"];

if(!($r>=3)){
    
    echo "<script type='text/javascript'>
    alert('You dont have an access');
    window.location.href='Navigate.php';
    </script>";
    
}
error_reporting(0);


$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="css/AccessChanger.css" type="text/css">
    <style>
            
        body {
            background-image: url(images/img16.jpg);
            background-repeat: no-repeat;
            
            background-color: hsl(221, 93%, 21%);
            
        }
    </style>
</head>
    
<body>
    <div>
    <div class=navi>
        <ul>
        <li><a href="Navigate.php">Home page</a></li>
        <li><a href="emp.html">Employee</a></li>
        <li><a href="task.html">Register tasks</a></li>
        <li><a href="Activity.php">Activities</a></li>
        <li><a href="Assign.php">Assign Tasks</a></li>
        <li ><a  href="AccessChanger.php">Admin</a></li>
        <li class="logout"><a class= "logout" href="logout.php">Log out</a></li>
        </ul>
    </div>
    
    <div class="div1">        
        <h1 > Change Access Levels</h1>
        <table>
            <form method="POST" action="AR.php" >

                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Access Level</th>
                    <th>Change Access</th>

                </tr>
            
            <?php
            
            $data = mysqli_query($conn , "SELECT * FROM users");
            
            
            while ($row = mysqli_fetch_assoc($data)){
                $username = $row['Username'];
                $fullname = $row['FullName']; 
                $access =$row['AccessL'];

                echo 
                '<tr>
                    <td name="ID" >'.$username.'</td>
                    <td>'.$fullname.'</td>
                    <td>'.$access.'</td>
                    
                    
                    <td> <button type = "submit" name ="ID" id="ID" value ='.$username.'>  Change  </button> </td>
                </tr>';
                
            }
            
            ?>
            
            
        </form>
    
        </table>
       
                
    </div></div>
</body>
</html>

