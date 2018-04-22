<?php
if(!isset($_GET["id"])){
    header("Location: ../all.php");
}
include "db.inc.php";

$id=mysqli_real_escape_string($conn, $_GET["id"]);
$query = "SELECT * FROM apps where id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

function getIcon(){
    global $row;
    echo "<img src=\"".$row["icon"]."\" id=\"app-logo\">";
}

?>