<?php
include_once "appsPreview.inc.php";
$resultsNumber;

function showAllApps($number)
{
    include("db.inc.php");
    $category="All";
    
    $order="none";
    $page=1;
    $searchWords = [];
    $tags = [];
    if(isset($_GET["category"]))
    {
        $category = mysqli_real_escape_string($conn, $_GET["category"]);
    }
    
    if(isset($_GET["order"]))
    {
        $order = mysqli_real_escape_string($conn, $_GET["order"]);
    }
    
    if(isset($_GET["page"]))
    {
        $page = mysqli_real_escape_string($conn, $_GET["page"]);
        if($page < 1)
            $page = 1;
    }
    $page *= $number;
    
    if(isset($_GET["search"]))
    {
        if(strlen($_GET["search"]) > 0 ){
        $searchString = mysqli_real_escape_string($conn, $_GET["search"]);
        $searchString = urldecode($searchString);
        $searchWords = explode(" ",$searchString);
        }
    }
    
    if(isset($_GET["tags"]))
    {
        if(strlen($_GET["tags"]) > 0 ){
        $tagsString = mysqli_real_escape_string($conn, $_GET["tags"]);
        $tagsString = urldecode($tagsString);
        $tags = explode(" ",$tagsString);
        }
    }
    
    
    $query = "(SELECT MAX(a.id) AS id_aux FROM apps a LEFT JOIN tags t ON a.id=t.id_app ";
    
    if($category!="All")
    {
        $query = $query . "WHERE a.category='".$category."' ";
    }
    
    $numItems = count($searchWords);
    $i = 0;
    if($numItems > 0)
    {
        if($category=="All")
        {
            $query = $query . "WHERE (";
        }
        else
        {
            $query = $query . "AND (";
        }
        
        foreach($searchWords as $word)
        {
            if(++$i === $numItems) 
                $query = $query . "LOWER(a.name) like LOWER('%".$word."%') OR LOWER(t.tag) like LOWER('%".$word."%')) ";
            else
                $query = $query . "LOWER(a.name) like LOWER('%".$word."%') OR LOWER(t.tag) like LOWER('%".$word."%') OR ";
        }
    }
    
    $query = $query . "GROUP BY name, uploader)";
    
    $numItems = count($tags);
    $i=0;
    
    if($numItems > 0)
    {
        
        foreach($tags as $word)
        {
            $query = "(SELECT ids.id_aux FROM " . $query . " ids JOIN tags t on ids.id_aux = t.id_app WHERE LOWER(t.tag) like LOWER('%".$word."%'))";
        }
    }
    
    $query = "SELECT a.id AS id, a.icon, a.name,getDownloads(a.id) as downloads, getRating(a.id) AS rating FROM apps a LEFT JOIN ratings r ON a.id=r.id_app LEFT JOIN tags t ON a.id=t.id_app WHERE a.id IN ". $query. " GROUP BY name, uploader ";
    
    
    if($order!="none")
    {
        if($order == "rating")
            $query = $query . "ORDER BY 5 desc ";
        else    
            $query = $query . "ORDER BY a.$order desc ";
    }

    $lowerPage = $page-$number;
    $query = $query . " LIMIT ".$lowerPage.", ".$number;
    //echo $query;
    
    if($result = mysqli_query($conn, $query))
    {
        $GLOBALS["resultsNumber"] = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result))
        {
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
        mysqli_free_result($result);
    }
    else
    {
        echo mysqli_error($conn);
    }
}


?>