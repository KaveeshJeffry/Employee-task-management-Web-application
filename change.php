<?php
//error_reporting(0);
SESSION_START();

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
$id = $_SESSION["id"];



?>


<!DOCTYPE html>
<html>

<head>
    <title>Employee</title>
    <link rel="stylesheet" href="css/change.css" type="text/css">
    <style>
            
        body {
            background-image: url(images/img19.jpg);
            background-color: hsl(221, 93%, 21%);

        }
    </style>
</head>
    
<body>
    
    
    
    <div class="div1">        
        <h1 >Change</h1>
        <table>
        <th>Username</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Access Level</th>
        
        <?php
         $data = mysqli_query($conn , "SELECT * FROM users where Username = '$id' ");
            
            
         while ($row = mysqli_fetch_assoc($data)){
             $usernames = $row['Username'];
             $fullname = $row['FullName']; 
             $email = $row['Email']; 
             $access =$row['AccessL'];

             echo 
             '<tr>
                 <td name="ID" >'.$usernames.'</td>
                 <td>'.$fullname.'</td>
                 <td>'.$email.'</td>
                 <td>'.$access.'</td>
                 
             </tr>';
         }
        ?>
       </table>

       <table class="tab1">
        <form method="POST">
        <tr>
            <td>
                <label for="access"> Access Level</label>
            </td>
            <td>
                <select name="access" id="access">
                    <option value=1>Level 1</option>
                    <option value=2>Level 2</option>
                    <option value=3>Level 3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><a href="AccessChanger.php">Back</a></td>
            <td><input type="submit" name="submit" id="submit"></td>
        </tr>
       </table>
       </form>         
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit'])){
        $id = $_SESSION["id"];
        $access = $_POST['access'];

        $query = "UPDATE users
        SET AccessL = $access
        WHERE Username = '$id'";

        
        //echo "<script type='text/javascript'>alert($id);</script>";
        
        $update = mysqli_query($conn, $query); 
        $_SESSION["id"]  = null;
        header("location: AccessChanger.php");
    }
    



?>