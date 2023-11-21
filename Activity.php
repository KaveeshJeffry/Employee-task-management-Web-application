<?php

SESSION_START();
$r=$_SESSION["AccessPass"];

if(!($r>=2)){
    
    echo "<script type='text/javascript'>
    alert('You dont have an access');
    window.location.href='Navigate.php';
    </script>";
    
}
?>
<html>
    <head> <title> Register tasks </title>
    <link rel="stylesheet" href="css/Activity.css" type="text/css">
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <style>
            body {
            
            background-image: url(images/img18.jpg);
            background-repeat: no-repeat;
            background-size: cover;
    
        }
        </style>

    </head>

<body>
<div class=navi>
        <ul>
        <li><a href="Navigate.php">Home page</a></li>
        <li><a href="emp.php">Employee</a></li>
        <li><a href="task.php">Register tasks</a></li>
        <li><a href="Activity.php">Activities</a></li>
        <li><a href="Assign.php">Assign Tasks</a></li>
        <li ><a  href="AccessChanger.php">Admin</a></li>
        <li class="logout"><a class= "logout" href="logout.php">Log out</a></li>
        </ul>
    </div>

<?php
//hide errors and warnings
error_reporting(0);


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


//create form with options
?>


<div class="div1">
    <h1>Assign Activities</h1>
<table>
<form method="POST" action="Activity.php" >
        <tr>
            <td>
                <label for="taskid">Task ID</label>
            </td>
            <td>
                <select name="taskid" id="taskid" required>
                    <option value=""></option>
                   <?php 
                   
                    $categoris = mysqli_query($conn, "SELECT * FROM task");
                    while ($row = mysqli_fetch_array($categoris)){
                   ?> 
                   <option value="<?php echo $row['Tid']?>"><?php echo $row['Tid'] ?> </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="act">Activity</label>
            </td>
            <td>
                <input type="text" id="act" name="act" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" id="submit" name="submit" value="Add" required>
            </td>
        </tr>

        

    </form>

    

</table>



<?php
//add values to table
$nam = $_SESSION["AccessName"];

global $act;
global $taskid;
$taskid = $_POST['taskid'];
$act = $_POST['act'];

if (isset($_POST['submit'])) { 
    if(array_key_exists('submit', $_POST)) { 
        $sql = "INSERT INTO $nam(taskid,act)
            VALUES('$taskid', '$act')";
        mysqli_query($conn,$sql);
        

    } 
} 



?>


<?php
//display results
$nam = $_SESSION["AccessName"];

$nam = $_SESSION["AccessName"];
$query = "SELECT * FROM $nam";
$result = mysqli_query($conn,$query);
?>

<table class ="table1">
    <tr>
        
        <th>
            Tid
        </th>
        <th>
            Activity
        </th>
    
    </tr>
<?php


if( mysqli_num_rows($result)>0 ){
    while($data = mysqli_fetch_assoc($result)){ 
      ?>
        <tr>
            
            <td><?php echo $data['taskid']; ?> </td>
            <td><?php echo $data['act'];?> </td>

        </tr>
      <?php
    }
}else{ ?>
    <tr>
    <td colspan="5">No data found</td>
    </tr>
<?php
}

 ?>
</table>


<form method="POST" action="assgnTAsk.php">
    <input type="submit" name="sub" id="sub">
</form>
<form method="POST">
    <input type="submit" name="cleen" id="cleen" value="Cleen">
</form>


<?php
if (isset($_POST['cleen'])) { 
    $query = "DELETE FROM $nam;";
    $result = mysqli_query($conn,$query);
} 

mysqli_close($conn);
?>

</div>
</body>

</html>

