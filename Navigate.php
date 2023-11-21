<?php
SESSION_START();
$r=$_SESSION["AccessPass"];

if(!($r>=1)){
    
    echo "<script type='text/javascript'>
    alert('Login first');
    window.location.href='Home.php';
    </script>";
    
}



$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

?>



<html>
    <head>
        <link rel="stylesheet" href="css/Navigate.css">
        <title>Home</title>
        <style>
            
            body {
                background-color: linen;
                background-image: url(images/img15.jpg);
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

            <div class=div2>

            <h1>Wellcome to the employee task manager</h1>
            <?php
            //display results
            $query = "SELECT * FROM assign";
            $result = mysqli_query($conn,$query);
            ?>

            <table class ="table1">
                <td colspan="5">
                    Activities that have been assigned to the employee
                </td>
                <tr>
                    
                    <th>
                        Eid
                    </th>
                    <th>
                        Tid
                    </th>
                    <th>
                        Dateassign
                    </th>
                    <th>
                        Acivity id
                    </th>
                    <th>
                        Remarks
                    </th>
                    
                
                </tr>
            <?php
            

            if( mysqli_num_rows($result)>0 ){
                while($data = mysqli_fetch_assoc($result)){ 
                ?>
                    <tr>
                        
                        <td><?php echo $data['Eid']; ?> </td>
                        <td><?php echo $data['Tid'];?> </td>
                        <td><?php echo $data['Dateassign'];?> </td>
                        <td><?php echo $data['Acivityid'];?> </td>
                        <td><?php echo $data['Remarks'];?> </td>

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
                <button type="button" onclick="window.location.href='PDFgenarator.php'">Print report</button>
            </div>

            

    </body>
</html>