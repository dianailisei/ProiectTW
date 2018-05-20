<?php 
if(isset($_GET["id"])){
    include("db.inc.php");
    $id = $_GET["id"];
    $query = "SELECT id, location, icon FROM apps WHERE (name, uploader) = (SELECT name, uploader FROM apps WHERE id = $id)";
    
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error($conn)); 
        exit();
    }
    else
    {
        while($row = mysqli_fetch_assoc($result)){
            unlink($row["location"]);
            unlink($row["icon"]);
            $query = "DELETE FROM apps WHERE id = " . $row["id"];
            $deleteResult = mysqli_query($conn, $query);
            if(!$deleteResult) {
                die("Query FAILED.<br>" . mysqli_error($conn)); 
                exit();
            }
        }
        
        
        
        header("Location: ../profile.php");
    }
}
else {
    header("Location: ../profile.php");
    exit();
}
?>