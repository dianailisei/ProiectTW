<?php
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    
    include_once 'db.inc.php';
    
    $country=mysqli_real_escape_string($conn, $_POST['country']);
    
    $username = $_SESSION['username'];
    $query="UPDATE users SET country = '$country' WHERE username='$username'";
    if(!mysqli_query($conn, $query)){
        die("Query FAILED.<br>" . mysqli_error());
        exit();
    }
    else {
        header("Location: ../profile.php");
        exit();
    }
}
else
{
    header("Location: ../settings.php");
    exit();
}

?>
