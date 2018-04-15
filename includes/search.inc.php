<?php
include_once "db.inc.php";
if(!isset($_POST['search']))
{
    header("Location: ../index.php");
    exit();
}

$searchString = mysqli_real_escape_string($conn, $_POST["search"]);
$searchString = urlencode($searchString);
header("Location: ../all.php?search=".$searchString);
exit();
?>