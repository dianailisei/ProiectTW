<?php
session_start();
if(isset($_POST['submit'])) {
    
    include_once 'db.inc.php';
    
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $password2=mysqli_real_escape_string($conn, $_POST['password2']);
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../login.php?reg=invalid_username");
        exit();
    }
    elseif(strlen($username) < 5){
       header("Location: ../login.php?reg=short_username");
       exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../login.php?reg=invalid_email");
        exit();
    }
    elseif($password != $password2){
       header("Location: ../login.php?reg=different_password");
       exit();
    }
    else {
        $query = "SELECT username FROM users WHERE username ='$username' OR email = '$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
            header("Location: ../login.php?reg=taken_username");
            exit();
        }
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query="INSERT INTO users (username, email, password, joindate) ";
    $query .="VALUES('$username', '$email', '$hashedPassword', NOW())";
    
    $result = mysqli_query($conn, $query); 
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error()); 
    }
    else{
        header("Location: ../profile.php");
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
    }
}

else {
    header("Location: ../login.php");
    exit();
}


?>
