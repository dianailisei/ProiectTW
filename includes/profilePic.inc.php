<?php
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    
    include_once 'db.inc.php';
    
    $picture=mysqli_real_escape_string($conn, $_POST['profile_pic']);
    
    $username = $_SESSION['username'];
    $pictureName = "users/" . $username . "_" . $picture;
    $query="UPDATE users SET picture = '$pictureName' WHERE username='$username'";
    
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
