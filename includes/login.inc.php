<?php
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
