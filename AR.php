<?php
SESSION_START();
global $id;
$id = $_POST['ID'];
$_SESSION["id"]  = $id;
header("location: change.php");
?>