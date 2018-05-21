<?php

function computeDownloads($appId){
    include("db.inc.php");
    $query = "SELECT SUM(donloads) as downloads FROM apps WHERE (nume,uploader) = (SELECT nume, uploader FROM apps WHERE id=".$appId.")";
    if($result = mysqli_query($conn, $query))
    {
        if($row = mysqli_fetch_assoc($result))
        {
            return $row["downloads"];
        }
    }
    return 0;
}


function computeRating($appId){
    include("db.inc.php");
    $query = "SELECT ROUND(AVG(r.rating)) as rating FROM apps LEFT JOIN rating r on id=r.id_app WHERE (nume,uploader) = (SELECT nume, uploader FROM apps WHERE id=".$appId.")";
    if($result = mysqli_query($conn, $query))
    {
        if($row = mysqli_fetch_assoc($result))
        {
            return $row["rating"];
        }
    }
    return 0;
}

?>