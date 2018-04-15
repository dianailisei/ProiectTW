<?php
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    include_once 'db.inc.php';
    $username = $_SESSION['username'];
    $query = "DELETE FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if($result < 1) {
        die("Query FAILED.<br>" . mysqli_error());
        exit();
    }
    else {
        header("Location: ../login.php");
        exit();
    }
}
else
{
    header("Location: ../settings.php");
    exit();
}
?>
