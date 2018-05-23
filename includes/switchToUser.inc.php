<?php
session_start();
if(isset($_SESSION['username']))
{
    session_unset();
    session_destroy();
    if(isset($_GET['username']))
    {
        include_once 'db.inc.php';
        $query ="SELECT * FROM users WHERE username = '". $_GET['username'] . "'"; 
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            die("Query FAILED.<br>" . mysqli_error($conn));
            exit();
        }
        $row = mysqli_fetch_assoc($result);
        print_r($row);
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['first'] = $row['first'];
        $_SESSION['last'] = $row['last'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['picture'] = $row['picture'];
                    
        header("Location: ../profile.php");
        exit();
    }
    
    
}
else
{
    header("Location: ../login.php");
    exit();
}

?>
