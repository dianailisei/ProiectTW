<?php

global $row;
function showUploaderName()
{
    if(isset($_GET["user"]))
    {
        $uploader = $_GET["user"];
        echo $uploader;
    }
    else
    {
        exit();
    }
}

function getInfo()
{
    if(isset($_GET["user"]))
    {
        include "db.inc.php";
        $uploader = $_GET["user"];
       
        $query = "SELECT id, first, last, country, picture FROM users where username = '$uploader'";
        
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query FAILED.<br>" . mysqli_error($conn));
            exit();
        }
        global $row;
        $row = mysqli_fetch_assoc($result);
    }
    else
    {
        exit();
    }
}

function showUploaderPicture()
{
    global $row;
    
    if(!isset($row["picture"])){
        echo "<div class=\"profile-pic\"><img src=\"images/profile-icon.png\" alt=\"Profile Picture\" title=\"Profile Picture\"></div>";
    }
    else{
        $path = "users/" . $row["picture"];
        echo "<div class=\"profile-pic\"><img src=\"" . $path ."\" alt=\"Profile sPicture\" title=\"Profile Picture\"></div>";
    }
}

function showUploaderRealName()
{
    global $row;
    if(!isset($row['first']) || !isset($row['last']))
         echo "Unknown";
      else
         echo $row['first'] . ' ' . $row['last']; 
}

function showUploaderCountry()
{
    global $row;
    if(!isset($row['country']))
         echo "Unknown";
      else
         echo $row['country']; 
}

function showUploaderDownloadsNumber()
{
    include 'db.inc.php';
    global $row;
    $id = $row['id'];
    $query = "SELECT SUM(downloads) FROM apps WHERE uploader='$id'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    else {
        $row_result = mysqli_fetch_assoc($result);
        echo $row_result['SUM(downloads)'];
    }
}

function showUploaderRating()
{
    include "db.inc.php";
    global $row;
    $id = $row['id'];
    $query = "SELECT CEIL(AVG(r.rating)) as rat from apps a LEFT JOIN ratings r on a.id=r.id_app WHERE a.uploader = '$id'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    $row_result = mysqli_fetch_assoc($result);
    echo getAppsPreviewRating($row_result['rat']);
}

function showUploaderApps()
{
    include("db.inc.php");
    global $row;
    $id = $row['id'];
    $query = "SELECT a.id AS id, a.icon, a.name, getDownloads(a.id) as downloads, getRating(a.id) AS rating FROM apps a LEFT JOIN ratings r ON a.id=r.id_app LEFT JOIN tags t ON a.id=t.id_app WHERE a.id IN (SELECT MAX(a.id) FROM apps a LEFT JOIN tags t ON a.id=t.id_app WHERE a.uploader = '$id' GROUP BY name, uploader, category)  GROUP BY name, uploader, category";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error($conn)); 
        exit();
    }
    
    while($row_result = mysqli_fetch_assoc($result)) {
        echo "<li class=\"app-list-child\">
                        <a href=\"app.php?id=".$row_result["id"]."\">
                            <div class=\"app-list-child-img-container\"> <img src=\"".$row_result['icon']."\"> </div>
                            <div class=\"app-list-child-title\">".$row_result["name"]."</div>
                            <div class=\"app-list-child-rating\">".getAppsPreviewRating($row_result["rating"])."</div>
                            <div class=\"app-list-child-downloads\"> <span class=\"fa fa-download\"></span> ".$row_result["downloads"]."</div>
                        </a>
                    </li>";
    }
}
?>
