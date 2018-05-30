<?php
if(!isset($_GET["id"])){
    header("Location: ../all.php");
}
include "db.inc.php";

$id=mysqli_real_escape_string($conn, $_GET["id"]);
$query = "SELECT a.id, a.name, a.location, a.icon, a.uploader, u.username, getDownloads(a.id) as downloads, getRating(a.id) as rating, a.category, a.description, a.upload_date FROM apps a JOIN users u ON a.uploader=u.id WHERE a.id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

/*
$query = "SELECT MAX(a.id), ROUND(AVG(r.rating)) AS rating FROM apps a LEFT JOIN ratings r ON a.id=r.id_app WHERE a.name=(SELECT name FROM apps WHERE id='$id') AND a.uploader=(SELECT uploader FROM apps WHERE id='$id') GROUP BY a.name, a.uploader";
$result = mysqli_query($conn, $query);*/
$calculatedRating = $row["rating"];

function showIcon(){
    global $row;
    echo "<div class=\"app-icon\"><img src=\"".$row["icon"]."\"></div>";
}

function showStars($rating){
    $code = "<button type=\"submit\" value=\"1\" name=\"rating\">
                    <i class=\"fa fa-star rating";
    if($rating >= 1)
        $code = $code . "-checked";
    
    $code = $code . " fa-3x\"></i>
                </button>
                <button type=\"submit\" value=\"2\" name=\"rating\">
                    <i class=\"fa fa-star rating";
    if($rating >= 2)
        $code = $code . "-checked";
    
    $code = $code . " fa-3x\"></i>
                </button>
                <button type=\"submit\" value=\"3\" name=\"rating\">
                    <i class=\"fa fa-star rating";
    if($rating >= 3)
        $code = $code . "-checked";
    
    $code = $code . " fa-3x\"></i>
                </button>
                <button type=\"submit\" value=\"4\" name=\"rating\">
                    <i class=\"fa fa-star rating";
    
    if($rating >= 4)
        $code = $code . "-checked";
    
    $code = $code . " fa-3x\"></i>
                </button>
                <button type=\"submit\" value=\"5\" name=\"rating\">
                    <i class=\"fa fa-star rating";
    if($rating >= 5)
        $code = $code . "-checked";
    
    $code = $code . " fa-3x\"></i>
                </button>";
    
    return  $code;   
}

function showRating(){
    global $calculatedRating;
    global $id;
    echo "<form class=\"app-list-child-rating\" id=\"app-rating-stars\" action=\"includes/rating.inc.php?id=".$id."\" method=\"POST\">";
    echo showStars($calculatedRating);
    echo "</form>";
}

function showName(){
    global $row;
    echo "<h1>".$row["name"]."</h1>";
}

function showFileSize()
{
    global $row;
    $location = substr($row['location'], 3);
    $bytes = filesize(trim($location));
    if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }
    echo $bytes;
}
function showUploader(){
    global $row;
    echo trim($row["username"]);
}

function showUploadDate(){
    global $row;
    echo $row["upload_date"];
}

function showDownloadButton(){
    global $row;
    echo "<a href=\"includes/downloadsIncrement.inc.php?id=".$row["id"]."\"><img src=\"images/download-button.png\" id=\"download-button\"></a>";
}

function showDownloadsNumber(){
    global $row;
    echo $row["downloads"];
}

function showCategory(){
    global $row;
    echo $row["category"];
}

function showTags(){
    include "db.inc.php";
    global $row;
    global $id;
    $query = "SELECT tag FROM tags WHERE id_app = '$id' LIMIT 5";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        while($rowTags = mysqli_fetch_assoc($result)){
            echo "<span class=\"tag\">".$rowTags["tag"]."</span>";
        }
    }
    else{
        echo "<span class=\"tag\">No tags chosen.</span>";
    }
}

function showDescription(){
    global $row;
    echo "<p>" . $row["description"] . "</p>";
}

function showVersionHistory(){
    include "db.inc.php";
    global $row;
    $name = $row["name"];
    $query = "SELECT id, DAY(upload_date) \"day\", MONTH(upload_date) \"month\", YEAR(upload_date) \"year\", location FROM apps WHERE name = '$name' AND uploader = " . $row["uploader"] . " ORDER BY upload_date ASC";
    $counter = 1;
    $result = mysqli_query($conn, $query);
    while($dates = mysqli_fetch_assoc($result)){
        echo "<a href=\"app.php?id=".$dates["id"]."\"> Version $counter</a> (" . $dates["day"] ."-" . $dates["month"] ."-" . $dates["year"] . ")<br>";
            $counter++;
    }
}
?>
