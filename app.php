<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/showApp.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <title>Sofy</title>
</head>


<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full" id="display">
        <?php showIcon(); ?>
        <div id="app-name">
            <?php showName(); ?>
            <?php showUploader(); ?>
            <?php showRating(); ?>
        </div>
        <?php showDownloadButton() ?>

    </section>

    <section class="main-full">
        <div id="app-statistics">
            <div><span class="fa fa-download"></span>
                <span> &#8470; Downloads: <?php showDownloadsNumber(); ?> </span></div>
            <div>
                <span class="fa fa-check-square"></span>
                <span> Category: <?php showCategory(); ?></span></div>
            <div>
                <?php showTags(); ?>
            </div>
        </div>
        <div class="app-description-container">
            <div class="app-info-container">
                <h1> About </h1>
                <pre><?php showDescription(); ?></pre>
                <p> Version History:<br>
                    <?php showVersionHistory(); ?>
                </p>
            </div>
            <div class="app-section" id="related-apps-container">
                <h1> Related Apps</h1>
                <div id="app-list-container">
                    <ul class="app-list" id="columns">
                        <?php getRelatedApps($id); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
