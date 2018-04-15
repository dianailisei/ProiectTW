<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <title>Categories</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full">
        <div class="app-section">
            <h1>Entertainment</h1>
            <a href="all.php?category=Entertainment&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                   <?php getAppsPreview("Entertainment","none",6); ?>
                </ul>
            </div>
        </div>

        <div class="app-section">
            <h1>Network</h1>
            <a href="all.php?category=Network&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getAppsPreview("Network","none",6); ?>
                </ul>
            </div>
        </div>

        <div class="app-section">
            <h1>Office</h1>
            <a href="all.php?category=Office&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getAppsPreview("Office","none",6); ?>
                </ul>
            </div>
        </div>

        <div class="app-section">
            <h1>Utility</h1>
            <a href="all.php?category=Utility&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getAppsPreview("Utility","none",6); ?>
                </ul>
            </div>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
