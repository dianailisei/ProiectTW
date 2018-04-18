<?php

function getPage()
{
    include "db.inc.php";
    if(isset($_GET["page"]) && $_GET["page"] > 0)
    {
        return $_GET["page"];
    }
    else
    {
        return 1;
    }
}

function printPage(){
    echo getPage();
}

function previousPage($cPage){
    include "db.inc.php";
    $allUrl = "../all.php?";
    if(isset($_GET["category"]))
        $allUrl = $allUrl . "category=" . mysqli_real_escape_string($conn, $_GET["category"]) . "&";
    if(isset($_GET["order"]))
        $allUrl = $allUrl . "order=" . mysqli_real_escape_string($conn, $_GET["order"]) . "&";
    if(isset($_GET["search"]))
        $allUrl = $allUrl . "search=" . mysqli_real_escape_string($conn, $_GET["search"]) . "&";
    if($cPage > 1)
        $cPage--;
    
    $allUrl = $allUrl . "page=" . $cPage;
    echo "<a href=\"".$allUrl."\" class=\"fa fa-arrow-left all-app-button\"></a>";
}

function nextPage($cPage){
    include "db.inc.php";
    $allUrl = "../all.php?";
    if(isset($_GET["category"]))
        $allUrl = $allUrl . "category=" . mysqli_real_escape_string($conn, $_GET["category"]) . "&";
    if(isset($_GET["order"]))
        $allUrl = $allUrl . "order=" . mysqli_real_escape_string($conn, $_GET["order"]) . "&";
    if(isset($_GET["search"]))
        $allUrl = $allUrl . "search=" . mysqli_real_escape_string($conn, $_GET["search"]) . "&";
    if($GLOBALS["resultsNumber"] == 10)
        $cPage++;
    
    $allUrl = $allUrl . "page=" . $cPage;
     echo "<a href=\"".$allUrl."\" class=\"fa fa-arrow-right all-app-button\"></a>";
}
?>