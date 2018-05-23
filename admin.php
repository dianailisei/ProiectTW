<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/admin.inc.php" ?>
    <title>Admin</title>
</head>


<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full" id="profile-container">
        <div>
            <table class="users-table">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Joindate</th>
                    <th>Number of uploaded apps</th>
                </tr>
                <?php showUsers(); ?>
            </table>
        </div>
        <div class="option"><a href="includes/sessionDestroy.inc.php">Logout</a></div>
    </section>
