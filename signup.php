<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

?>


<html>
    <head>
        <link rel="stylesheet" href="css/signup.css">
        <title>Sign up</title>
        <style>
            
            body {
                background-color: linen;
                background-image: url(images/img9.jpg);
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
                <h1>Sign up</h1>

                <div class="div3">
                    <table>
                        <form method="POST">
                            
                        
                        <tr>
                            <td>
                                <label for="username"> User name</label>
                            </td>
                            <td>
                                <input type="text" name="usernames" id="username" minlength="7" maxlength="15"  required>
                                
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label for="FName"> Full name</label>
                            </td>
                            <td>
                                <input type="text" name="FName" id="FName" minlength="6" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="emails"> Email</label>
                            </td>
                            <td>
                                <input type="email" name="emails" id="emails" required>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label for="passwords"> Password</label>
                            </td>
                            <td>
                                <input type="text" name="passwords" id="passwords" minlength="8" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one upper case lover case and 8 character">
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                            <a href="home.php">Login</a>
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

        
        

        $usernames = $_POST['usernames'];
        $FName = $_POST['FName'];
        $emails = $_POST['emails'];
        $passwords = $_POST['passwords'];
        $access = 1;

        
            mysqli_query($conn, "INSERT INTO users VALUES( '$usernames', '$FName','$emails', '$passwords', '$access' )");
            mysqli_close($conn);
            header("Location:Home.php");
        }
        

        
        
    
?>

