<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "project";
    
    // Create a connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    
    

    
   
    if (isset($_POST["tid"])) {

        //test
        ?><script>alert("bb");</script><?php

        $tid = $_POST["tid"];
        
        //test
        echo "<script type='text/javascript'>alert('$tid');</script>";
    
        $query = "SELECT * FROM takactivitites WHERE Tid ='$tid'";
        $results = mysqli_query($conn, $query);

        
    
        foreach ($results as $acivityid) {
    ?>
            <option value="<?php echo $acivityid["Acivityid"]; ?>"><?php echo $acivityid["Acivityid"]; ?></option>
    <?php
        }
    } else {

        //test
        ?><script>alert("aa");</script><?php
    }
?>  
