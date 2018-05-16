<?php
session_start();
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    
    include_once 'db.inc.php';
    
    $pic_name = $_FILES['image']['name'];
    $pic_size = $_FILES['image']['size'];
    $pic_tmp = $_FILES['image']['tmp_name'];
    $pic_ext = explode('.',$_FILES['image']['name']);
    $pic_extension=strtolower(end($pic_ext));
    $picture_path = "../users/" . $_SESSION['username'] . "/profilePic." . $pic_extension;
    $id = $_SESSION['id'];
    if($pic_size >10000000) {
        header("Location: settings.php");
        exit();
    }
   /* $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if ($result){
        $row = mysqli_fetch_assoc($result);
        print_r($row);
        if($row['picture'] && !unlink('../users/'.$row['picture'])){
            echo("There has been an error while deleting old profile picture.<br>");
            exit();  
        }
    }*/
    $profile_pic = $_SESSION['username'] . '/profilePic.' . $pic_extension;
    $query = "UPDATE users SET picture='$profile_pic' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    $_SESSION['picture'] = $profile_pic;
    if (!file_exists("../users/" . $_SESSION["username"])) {
        mkdir("../users/" . $_SESSION["username"], 0777, true);
    }
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $picture_path)){
        header("Location: ../profile.php");
        exit();
    }
    else {
        echo "Upload error.";
        exit();
    }
}
else
{
    header("Location: ../settings.php");
    exit();
}

?>
