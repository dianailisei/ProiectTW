<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <title>Tops</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full">
        <div class="app-section">
            <h1>Most downloaded apps</h1>
            <a href="all.php?order=downloads&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getAppsPreview("All","downloads",6); ?>
                </ul>
            </div>
        </div>

        <div class="app-section">
            <h1>Most popular apps</h1>
            <a href="all.php?order=rating&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getAppsPreview("All","rating",6); ?>
                </ul>
            </div>
        </div>

        <div class="app-section">
            <h1>Most recent apps</h1>
            <a href="all.php?order=upload_date&page=1" class="see-more-button">See more</a>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getAppsPreview("All","upload_date",6); ?>
                </ul>
            </div>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
