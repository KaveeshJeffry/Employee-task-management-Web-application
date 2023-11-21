<?php
SESSION_START();

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

?>


<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
        <title>Login</title>
        <style>
            
            body {
                background-color: linen;
                background-image: url(images/img8.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;

            }
        </style>
    </head>
    <body>
            

            <div class=div2>
                <h1>Login</h1>

                <div class="div3">
                    <table>
                        <form method="POST" action="">
                        
                        <tr>
                            <td>
                                <label for="username"> User name</label>
                            </td>
                            <td>
                                <input type="text" name="username" id="username">
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>
                                <label for="password"> Password</label>
                            </td>
                            <td>
                                <input type="password" name="password" id="password">
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <a href="signup.php">Sign up</a>
                            </td>
                            <td>
                                <input type="submit" id="submit" name="submit">
                            </td>
                        </tr>
                        

                        </form>
                    </table>
                </div>

            </div>

            

    </body>
</html>

<?php

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = mysqli_query($conn, "Select * FROM users WHERE Username = '$username' AND Password = '$password'" );
            $find = mysqli_fetch_array($result);

            if(isset($find)) {
                $level=$find[4];
                $nam = $find[0];
                $_SESSION["AccessPass"]  = $level;
                $_SESSION["AccessName"]  = $nam;

                
            
                if($level >1){
                    mysqli_query($conn, "CREATE TABLE $nam (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY , taskid VARCHAR(20), act VARCHAR(250))");
                }

                header("Location: Navigate.php");
            }else{
                echo "<script type='text/javascript'>alert('Wrong password or user name');</script>";
            }
        }

?>