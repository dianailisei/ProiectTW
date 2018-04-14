<?php
session_start();
 if(isset($_POST['submit'])) {

    include_once 'db.inc.php';
    
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
     
     if(empty($username) || empty($password)){
         header("Location: ../login.php?log=empty");
         exit();
     }
     else {
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)<1){
            header("Location: ../login.php?log=none");
            exit();
        }
        else {
            if($row = mysqli_fetch_assoc($result)) {
                if(password_verify($password,$row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['first'] = $row['first'];
                    $_SESSION['last'] = $row['last'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['country'] = $row['country'];
                    $_SESSION['picture'] = $row['picture'];
                    session_write_close();
                    header("Location: ../profile.php");
                    exit();
                }
                else {
                    header("Location: ../login.php?log=fail");
                    exit();
                }
            }
        }
     }
 }
?>
