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

function getAppsPreview($category, $order, $number){
    include("db.inc.php");
    $query = "SELECT MAX(a.id) as id, a.icon, a.name, a.downloads, ROUND(AVG(r.rating)) AS rating FROM apps a LEFT JOIN ratings r ON a.id=r.id_app ";
    if($category!="All")
    {
        $query = $query . "WHERE a.category='$category' ";
    }
    
    $query = $query . "GROUP BY name, uploader ";
    
    if($order!="none")
    {
        if($order == "rating")
            $query = $query . "ORDER BY 5 desc ";
        else    
            $query = $query . "ORDER BY a.$order desc ";
    }
    
    $query = $query . "LIMIT 0,$number";
    //echo $query . "<br>";
    if($result = mysqli_query($conn, $query))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //echo $row["name"] . "  " . $row["downloads"] . "  " . $row["rating"] . "<br>";
            echo "<li class=\"app-list-child\">
                        <a href=\"app.php?id=".$row["id"]."\">
                            <div class=\"app-list-child-img-container\"> <img src=\"".$row['icon']."\"> </div>
                            <div class=\"app-list-child-title\">".$row["name"]."</div>
                            <div class=\"app-list-child-rating\">".getAppsPreviewRating($row["rating"])."</div>
                            <div class=\"app-list-child-downloads\"> <span class=\"fa fa-download\"></span> ".$row["downloads"]."</div>
                        </a>
                    </li>";
        }
        mysqli_free_result($result);
    }
    else
    {
        echo mysqli_error($conn);
    }
}


function getUserApps($id) {
    include("db.inc.php");
    $query = "SELECT MAX(a.id) as id, a.name, a.icon, a.downloads, ROUND(AVG(r.rating)) AS rating FROM apps a LEFT JOIN ratings r ON a.id = r.id_app WHERE a.uploader = '$id' GROUP BY a.name, a.uploader";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error($conn)); 
        exit();
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li class=\"app-list-child\">
                        <a href=\"app.php?=".$row["id"]."\">
                            <div class=\"app-list-child-img-container\"> <img src=\"".$row['icon']."\"> </div>
                            <div class=\"app-list-child-title\">".$row["name"]."</div>
                            <a href=\"includes/deleteUserApp.inc.php?id=".$row['id']."\">
                            <div class=\"fa fa-close fa-2x delete-button\"></div>
                            </a>
                            <div class=\"app-list-child-rating\">".getAppsPreviewRating($row["rating"])."</div>
                            <div class=\"app-list-child-downloads\"> <span class=\"fa fa-download\"></span> ".$row["downloads"]."</div>
                        </a>
                    </li>";
    }
}

function getRelatedApps($appId) {
    include("db.inc.php");
    $query = "SELECT MAX(a.id) as id, a.name, a.icon, a.downloads, ROUND(AVG(r.rating)) AS rating, COUNT(*) as matches FROM apps a LEFT JOIN tags t ON a.id = t.id_app LEFT JOIN ratings r ON r.id_app=a.id WHERE a.id!=".$appId." AND t.tag IN (SELECT tag FROM tags WHERE id_app = ".$appId.") GROUP BY a.name, a.uploader ORDER BY matches desc, rating desc LIMIT 3";
    $result = mysqli_query($conn, $query);
    if($result = mysqli_query($conn, $query))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //echo $row["name"] . "  " . $row["downloads"] . "  " . $row["rating"] . "<br>";
            echo "<li class=\"app-list-child\">
                        <a href=\"app.php?id=".$row["id"]."\">
                            <div class=\"app-list-child-img-container\"> <img src=\"".$row['icon']."\"> </div>
                            <div class=\"app-list-child-title\">".$row["name"]."</div>
                            <div class=\"app-list-child-rating\">".getAppsPreviewRating($row["rating"])."</div>
                            <div class=\"app-list-child-downloads\"> <span class=\"fa fa-download\"></span> ".$row["downloads"]."</div>
                        </a>
                    </li>";
        }
        mysqli_free_result($result);
    }
    else
    {
        echo mysqli_error($conn);
    }
}

?>
