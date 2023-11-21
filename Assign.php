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
    <head> <title> Assign </title>

    <link rel="stylesheet" href="css/Assign.css" type="text/css">
    <style>
            body {
            
            background-image: url(images/img17.jpg);
            background-repeat: no-repeat;
            background-size: cover;
    
        }
        </style>


        <!-- Internet is required -->
        <script   src="https://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous">  
    </script>
    <script>
        function getId(val){

            //test  alert(val); 
            
            $.ajax({
                type: "POST",
                url: "getdata.php",
                data: "tid="+val,
                success: function(data){
                    $("#act").html(data);
                }
            });
        }
    </script>

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

<div class="div1">
    <h1>Assign tasks to employee</h1>
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

$eid =$_POST['eid'];
$tid =$_POST['tid'];
$dateassign =$_POST['dateassign'];
$acivityid =$_POST['acivityid'];
$remarks =$_POST['remarks'];

//create form with options
?>



<table>
<form method="POST" >
    <!-- Eid drop down-->
        <tr>
            <td>
                <label for="eid">Eid</label>
            </td>
            <td>
                <select name="eid" id="eid" required>
                    <option value=""></option>
                   <?php 
                    $categoris1 = mysqli_query($conn, "SELECT * FROM employee");
                    while ($row = mysqli_fetch_array($categoris1)){
                   ?> 
                   <option value="<?php echo $row['Eid']?>"><?php echo $row['Eid'] ?> </option>
                    <?php } ?>
                </select>

            </td>
        </tr>
        <tr>
            <td>
                <label for="tid">Tid</label>
            </td>
            <td>
                
                

            
                <!-- Tid drop down dynamic-->
                
                <select name="tid" id="tid" onchange="getId(this.value); required">
                <option value=""></option>
                
                <?php
                    $query = "SELECT * FROM task";
                    $results=mysqli_query($conn, $query);
                    
                    foreach ($results as $data){
                ?>
                        <option value="<?php echo $data["Tid"];?>"><?php echo $data["Tid"];?></option>
                <?php
                    }
                ?>
            </select>
                


            </td>
        </tr>
        <tr>
            <td>
                <label for="dateassign">Dateassign</label>
            </td>
            <td>
                <input type="date" id="dateassign" name="dateassign" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="act">Acivityid </label>
            </td>
            <td>
                
                <!-- Acivityid drop down dynamic-->
                <select name="acivityid" id="act" required>
                    <option value=""></option>
                </select>

            </td>
        </tr>
        <tr>
            <td>
                <label for="remarks">Remarks</label>
            </td>
            <td>
                <input type="text" id="remarks" name="remarks">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" id="submit" name="submit" value="submit" required>
            </td>
        </tr>

    </form>

    

</table>
<?php

$sql = "INSERT INTO assign(Eid ,Tid ,Dateassign ,Acivityid ,Remarks)
VALUES('$eid', '$tid','$dateassign','$acivityid','$remarks')";
mysqli_query($conn,$sql);

mysqli_close($conn);
?>
<div>
</body>
</html>