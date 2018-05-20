<?php 
include_once 'appsPreview.inc.php';


function showDownloadsNumber(){
    include 'db.inc.php';
    
    $id = $_SESSION['id'];
    $query = "SELECT SUM(downloads) FROM apps WHERE uploader='$id'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error());
        exit();
    }
    else {
        $row = mysqli_fetch_assoc($result);
        echo $row['SUM(downloads)'];
    }
        
}

function showPicture(){
    if(!isset($_SESSION['picture'])){
        echo "<div class=\"profile-pic\"><img src=\"images/profile-icon.png\" alt=\"Profile Picture\" title=\"Profile Picture\"></div>";
    }
    else{
        $path = "users/" . $_SESSION['picture'];
        echo "<div class=\"profile-pic\"><img src=\"" . $path ."\" alt=\"Profile sPicture\" title=\"Profile Picture\"></div>";
    }
}

function showName(){
    if(!isset($_SESSION['first']) || !isset($_SESSION['last']))
         echo "Unknown";
      else
         echo $_SESSION['first'] . ' ' . $_SESSION['last']; 
}

function showEmail(){
    echo $_SESSION['email'];
}

function showCountry(){
    if(!isset($_SESSION['country']))
         echo "Unknown";
      else
         echo $_SESSION['country']; 
                    
}

function showProfileRating(){
    include 'db.inc.php';
    
    $id = $_SESSION['id'];
    $query = "SELECT CEIL(AVG(r.rating)) as rat from apps a LEFT JOIN ratings r on a.id=r.id_app WHERE a.uploader = $id";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error());
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    echo getAppsPreviewRating($row['rat']);
}

?>
