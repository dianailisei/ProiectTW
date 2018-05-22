<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <title>Sofy</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <div class="wrapper">
        <section class="description">
            <h1>Online Software Repository</h1>
            <p>Sofy is a software repository where you can find a lot of very useful apps, from basic office tools which increase your productivity to entertaining apps, games and so on.
The web application is available on every device, so, besides apps designed for Windows, you can find here executables both for Android or Linux. 
Feel free to navigate through categories, tops, download different apps, or, why not, register in order to vote and upload your own applications!</p>
        </section>
        <section class="main">
             <h1>Some of our choices</h1>
            <div id="app-list-index">
                <ul class="app-list">
                     <?php getAppsPreview("All","rating",12); ?>
                </ul>
            </div>
        </section>
        <aside>
            <h2>Statistics</h2><br>
            <p>Lorem ipsum dolor sit amet, te mea debet mentitum placerat, at nam sint voluptatibus. Pro atqui perfecto ut, eam ex malorum necessitatibus. Ut discere consetetur eum, ius errem feugait ne. </p>
        </aside>
    </div>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
