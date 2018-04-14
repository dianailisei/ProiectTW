<?php
session_start();
if(isset($_POST['submit'])) {
    
    include_once 'db.inc.php';
    
    $first=mysqli_real_escape_string($conn, $_POST['first']);
    $last=mysqli_real_escape_string($conn, $_POST['last']);
    echo $first . $last;
    $id = $_SESSION['id'];
    $query="UPDATE users SET first = '$first', last='$last' WHERE id='$id'";
    $result = mysqli_query($conn, $query); 
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error()); 
    }
    else {
        header("Location: ../profile.php");
        exit();
    }
}

?>
