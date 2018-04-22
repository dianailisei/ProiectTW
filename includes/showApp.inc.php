<?php
if(!isset($_GET["id"])){
    header("Location: ../all.php");
}
include "db.inc.php";

$id=mysqli_real_escape_string($conn, $_GET["id"]);
$query = "SELECT * FROM apps a JOIN users u ON a.uploader=u.id WHERE a.id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$query = "SELECT MAX(a.id), ROUND(AVG(r.rating)) AS rating FROM apps a LEFT JOIN ratings r ON a.id=r.id_app WHERE a.name=(SELECT name FROM apps WHERE id='$id') AND a.uploader=(SELECT uploader FROM apps WHERE id='$id') GROUP BY a.name, a.uploader";
$result = mysqli_query($conn, $query);
$calculatedRating = mysqli_fetch_assoc($result);

function getIcon(){
    global $row;
    echo "<img src=\"".$row["icon"]."\" id=\"app-logo\">";
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

function getRating(){
    global $calculatedRating;
    global $id;
    echo "<form class=\"app-list-child-rating\" id=\"app-rating-stars\" action=\"includes/rating.inc.php?id=".$id."\" method=\"POST\">";
    echo showStars($calculatedRating["rating"]);
    echo "</form>";
}

function getName(){
    global $row;
    echo "<h1>".$row["name"]."</h1>";
}

function getUploader(){
    global $row;
    echo "<p>by ".$row["username"].", uploaded a ".$row["upload_date"]."</p>";
}

function getDownload(){
    global $row;
    echo "<a href=\"".$row["location"]."\"><img src=\"images/download-button.png\" id=\"download-button\"></a>";
}
?>