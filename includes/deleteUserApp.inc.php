<?php 
if(isset($_GET["id"])){
    include("db.inc.php");
    $id = $_GET["id"];
    $query = "SELECT id FROM apps WHERE name = (SELECT name FROM apps WHERE id = $id) AND uploader = (SELECT uploader FROM apps WHERE id = $id)";
    
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error($conn)); 
        exit();
    }
    else
    {
        while($row = mysqli_fetch_assoc($result)){
            $query = "DELETE FROM apps WHERE id = " . $row["id"];
            $deleteResult = mysqli_query($conn, $query);
            if(!$deleteResult) {
                die("Query FAILED.<br>" . mysqli_error($conn)); 
                exit();
            }
        }
        $query = "DELETE FROM apps WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            die("Query FAILED.<br>" . mysqli_error($conn)); 
            exit();
        }
        else {
            header("Location: ../profile.php");
            exit();
        }
    }
}
else {
    header("Location: ../profile.php");
    exit();
}
?>
