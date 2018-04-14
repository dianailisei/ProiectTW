<?php
if(session_id() == '' || !isset($_SESSION)) {
    header("Location: ../login.php?log=fail");
    exit();
}

session_start();

if(isset($_POST['submit'])) {
    if($_FILES["appToUpload"]["size"] > 128000000){
        header("Location: ../upload.php?upd=tooLarge");
        exit();
    }
    
    
    $targetFile = "apps/" . $_SESSION["username"] . "_" . basename($_FILES["appToUpload"]["name"]);
    $targetIcon = "icons/" . $_SESSION["username"] . "_" . basename($_FILES["iconToUpload"]["name"]);
    $appName = $_POST["appName"];
    $appDescription = $_POST["appDescription"];
    $appCategory = $_POST["categories"];
    $appTags = explode(" ",$_POST["appTags"]);
    
    echo $targetFile;
    echo "<br>";
    echo $appName;
    echo "<br>";
    foreach($appTags as $tag)
    {
        echo $tag;
        echo "<br>";
    }
}
?>