<?php
session_start();
/*
echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete the app?');\" href='delete.php?id=".$query2['id']."'>x</a></td><tr>"; 
*/
include_once "sessionCheck.inc.php";
if(isset($_POST['submit'])) {
    
    if($_FILES["appToUpload"]["size"] > 128000000){
        header("Location: ../upload.php?upd=tooLarge");
        exit();
    }
    
    include_once("db.inc.php");
    
    $targetFile = "../users/" . $_SESSION["username"] . "/apps/" . basename($_FILES["appToUpload"]["name"]);
    $targetIcon = "../users/" . $_SESSION["username"] . "/icons/" . basename($_FILES["iconToUpload"]["name"]);
    $appName = mysqli_real_escape_string($conn,$_POST["appName"]);
    $appUploader = $_SESSION["id"];
    $appDescription = mysqli_real_escape_string($conn,$_POST["appDescription"]);
    $appCategory = mysqli_real_escape_string($conn,$_POST["categories"]);
    $appTags = explode(" ",mysqli_real_escape_string($conn,$_POST["appTags"]));
    
    if (!file_exists("../users/" . $_SESSION["username"])) {
        mkdir("../users/" . $_SESSION["username"], 0777, true);
    }
    
    if (!file_exists("../users/" . $_SESSION["username"]. "/apps")) {
        mkdir("../users/" . $_SESSION["username"] . "/apps", 0777, true);
    }
    
    if (!file_exists("../users/" . $_SESSION["username"]. "/icons")) {
        mkdir("../users/" . $_SESSION["username"] . "/icons", 0777, true);
    }
    
    $i=0;
    $getFileName = explode(".", $targetFile);
    while (file_exists($targetFile)) {
        $targetFile = ".." . $getFileName[count($getFileName)-2] . "_" . $i . "." . $getFileName[count($getFileName)-1];
        $i++;
    }

    $i=0;
    $getIconName = explode(".", $targetIcon);
    while (file_exists($targetIcon)) {
        $targetIcon = ".." . $getIconName[count($getIconName)-2] . "_" . $i . "." . $getIconName[count($getIconName)-1];
        $i++;
    }
    
    if (move_uploaded_file($_FILES["appToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["appToUpload"]["name"]). " has been uploaded.";
        echo "<br>";
        if (move_uploaded_file($_FILES["iconToUpload"]["tmp_name"], $targetIcon)) {
            echo "The icon ". basename( $_FILES["iconToUpload"]["name"]). " has been uploaded.";
            echo "<br>";
            $query = "INSERT INTO apps (name, uploader, category, downloads, description, icon, location, upload_date) VALUES ('$appName','$appUploader','$appCategory',0,'$appDescription','$targetIcon','$targetFile',NOW())";
            $result = mysqli_query($conn, $query);
            
            if(!$result){
                die("Querry faild... No app was added to the server.<br>" . mysqli_error()); 
                exit();
            }
            else
            {
                echo "All done! <a href='../profile.php'>Click here to go back!</a>";
            }
        } 
        else 
        {
            echo "Sorry, there was an error uploading your app icon.";
        }
    } else {
        echo "Sorry, there was an error uploading your app.";
    }
    
}
else
{
    header("Location: ../upload.php");
    exit();
}
?>