<?php

if(!isset($_GET["id"])){
    header("Location: ../all.php");
}

include "db.inc.php";

$id=mysqli_real_escape_string($conn, $_GET["id"]);

$query = "UPDATE apps SET downloads=downloads+1 WHERE id=".$id;
$result = mysqli_query($conn, $query);

$query = "SELECT location FROM apps WHERE id=".$id;
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
header("Location: ".$row["location"]);
?>