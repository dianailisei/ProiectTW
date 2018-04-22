<?php
session_start();
include_once "sessionCheck.inc.php";
include_once "db.inc.php";

if(isset($_POST['rating']) && isset($_GET["id"])){
    $rating = mysqli_real_escape_string($conn, $_POST["rating"]);
    $appId = mysqli_real_escape_string($conn, $_GET["id"]);
    $userId = $_SESSION["id"];
    
    $query = "SELECT * FROM ratings WHERE id_app='$appId' AND id_user='$userId'";
    echo $query."<br>";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result)<=0)
    {
        $query = "INSERT INTO ratings (id_app, id_user, rating) VALUES ('".$appId."','".$userId."','".$rating."')";
        $result = mysqli_query($conn, $query);
    }
    else
    {
        $query = "UPDATE ratings SET rating='".$rating."' WHERE id_app='".$appId."' AND id_user='".$userId."'";
        $result = mysqli_query($conn, $query);
    }
    header("Location: ../app.php?id=".$appId."&rating=".$rating);
    exit();
}
else
{
    header("Location: ../index.php");
    exit();
}
?>