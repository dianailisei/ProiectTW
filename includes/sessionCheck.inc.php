<?php
if(session_id() == '' || !isset($_SESSION["id"])) {
    header("Location: ../login.php?log=noSession");
    exit();
}

?>