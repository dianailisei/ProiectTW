<?php

if(!isset($_SESSION["username"])) {
    if($_SESSION["username"]!="admin")
    header("Location: ../login.php");
    exit();
}

function showUsers()
{
    include 'db.inc.php';
    $query = "SELECT username, email, joindate, COUNT(apps.id) as number FROM users LEFT JOIN apps ON users.id = apps.uploader WHERE username not like 'admin' GROUP BY username";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query FAILED.<br>" . mysqli_error());
        exit();
    }
    else {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td><a href=\"../includes/switchToUser.inc.php?username=".$row['username']."\">".$row['username']."</a></td><td>".$row['email']."</td><td>".$row['joindate']."</td><td>".$row['number']."</td></tr>";
        }
    }
}

?>
