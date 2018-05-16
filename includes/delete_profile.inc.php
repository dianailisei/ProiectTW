<?php
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    include_once 'db.inc.php';
    $username = $_SESSION['username'];
    $query = "DELETE FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if($result < 1) {
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    else {
        $id = $_SESSION['id'];
        $query = "DELETE FROM apps WHERE uploader = $id";
        $result = mysqli_query($conn, $query);
        if($result < 1) {
            die("Query FAILED.<br>" . mysqli_error($conn));
            exit();
        }
        $path = "../users/" . $_SESSION['username'];
        deleteFiles($path);
        header("Location: ../login.php");
        exit();
    }
}
else
{
    header("Location: ../settings.php");
    exit();
}

function deleteFiles($path){
    if(is_dir($path)){
        $files = glob($path . '*', GLOB_MARK);
        foreach($files as $file)
        {
            deleteFiles($file);
        }
        rmdir($path);
    }
    else
    {
        if(is_file($path)){
            unlink($path);
        }
    }
}
?>
