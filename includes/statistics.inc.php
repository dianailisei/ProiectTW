<?php

function getNumberOfApps(){
    include("db.inc.php");
    
    $query = "SELECT COUNT(DISTINCT(name)) as number FROM apps";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    return $row["number"];
}

function getNumberOfUsers(){
    include("db.inc.php");
    
    $query = "SELECT COUNT(*) as number FROM users WHERE username not like 'admin'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    return $row["number"];
}

function getNumberOfVotes(){
    include("db.inc.php");
    
    $query = "SELECT COUNT(*) as number FROM ratings";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    return $row["number"];
}

function getNumberOfDownloads(){
    include("db.inc.php");
    
    $query = "SELECT SUM(downloads) as number FROM apps";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query FAILED.<br>" . mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    return $row["number"];
}
?>
