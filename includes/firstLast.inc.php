<?php
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    
    include_once 'db.inc.php';
    
    $first=mysqli_real_escape_string($conn, $_POST['first']);
    $last=mysqli_real_escape_string($conn, $_POST['last']);
    
    $username = $_SESSION['username'];
    $query="UPDATE users SET first = '$first', last='$last' WHERE username='$username'";
    $_SESSION['first'] = $first;
    $_SESSION['last'] = $last;
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
