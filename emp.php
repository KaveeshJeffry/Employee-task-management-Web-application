<?php

SESSION_START();
$r=$_SESSION["AccessPass"];

if($r>=2){
    header("Location: emp.html");
}
else{
    echo "<script type='text/javascript'>
    alert('You dont have an access');
    window.location.href='Navigate.php';
    </script>";
    
}
?>