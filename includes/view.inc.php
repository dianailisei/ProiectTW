<?php

function getAppsPreviewRating($rating){
    switch($rating){
        case 0:
            return "
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span>";
            break;
        case 1:
            return "
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span>";
            break;
        case 2:
            return "
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span>";
            break;
        case 3:
            return "
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span>";
            break;
        case 4:
            return "
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star\"></span>";
            break;
        case 5:
            return "
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span> 
                <span class=\"fa fa-star rating-checked\"></span>";
            break;
        default:
            return "
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span> 
                <span class=\"fa fa-star\"></span>";
            break;
    }
}

function printAllApp($row){
     echo "<div class=\"all-app-child\">
                    <a href=\"app.php?id=".$row["id"]."\">
                        <div class=\"all-app-icon\">
                            <img src=\"".$row["icon"]."\" alt=\"App logo\" title=\"Icon\">
                        </div>
                        <p class=\"all-app-title\">
                            ".$row["name"]."
                        </p>
                        <div clas=\"all-app-rating\">
                        ".getAppsPreviewRating($row["rating"])."
                        </div>

                        <div class=\"all-app-downloads\">
                            <span class=\"fa fa-download\"></span> ".$row["downloads"]."
                        </div>
                    </a>
                </div>";
}

function printPreviewApp($row){
        echo "<li class=\"app-list-child\">
                <a href=\"app.php?id=".$row["id"]."\">
                    <div class=\"app-list-child-img-container\"> <img src=\"".$row['icon']."\"> </div>
                    <div class=\"app-list-child-title\">".$row["name"]."</div>
                    <div class=\"app-list-child-rating\">".getAppsPreviewRating($row["rating"])."</div>
                    <div class=\"app-list-child-downloads\"> <span class=\"fa fa-download\"></span> ".$row["downloads"]."</div>
                </a>
            </li>";
}

function printPreviousPage($allUrl){
    echo "<a href=\"".$allUrl."\" class=\"fa fa-arrow-left all-app-button\"></a>";
}

function printNextPage($allUrl){
    echo "<a href=\"".$allUrl."\" class=\"fa fa-arrow-right all-app-button\"></a>";
}

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