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

function showIcon(){
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

function showRating(){
    global $calculatedRating;
    global $id;
    echo "<form class=\"app-list-child-rating\" id=\"app-rating-stars\" action=\"includes/rating.inc.php?id=".$id."\" method=\"POST\">";
    echo showStars($calculatedRating["rating"]);
    echo "</form>";
}

function showName(){
    global $row;
    echo "<h1>".$row["name"]."</h1>";
}

function showUploader(){
    global $row;
    echo "<p>by ".$row["username"].", uploaded a ".$row["upload_date"]."</p>";
}

function showDownloadButton(){
    global $row;
    echo "<a href=\"".$row["location"]."\"><img src=\"images/download-button.png\" id=\"download-button\"></a>";
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
    $id_app = $row["id"];
    $query = "SELECT tag FROM tags WHERE id_app = '$id_app'";
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
?>