<?php 
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    include_once 'db.inc.php';
    $actualPwd = mysqli_real_escape_string($conn, $_POST['password']);
    $pwd1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username ='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    if(!password_verify($actualPwd, $row['password'])) {
        header("Location: ../settings.php?set=failed");
        exit();
    }
    else {
        if($pwd1 != $pwd2) {
            header("Location: ../settings.php?set=failed");
            exit();
        }
        else {
            $hashedPwd = password_hash($pwd1, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password='$hashedPwd' WHERE username='$username'";
            if(!mysqli_query($conn, $query)) {
                die("Query FAILED.<br>" . mysqli_error()); 
                exit();
            }
            else {
                header("Location: ../profile.php");
                exit();
            }
        }
    }
        
}
else
{
    header("Location: ../settings.php");
    exit();
}

?>
