<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/showApp.inc.php" ?>
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
                <?php showDescription(); ?>
                <p> Version History:<br>
                    <?php showVersionHistory(); ?>
                </p>
                <p> About Author: Name</p>
            </div>
            <div class="app-section" id="related-apps-container">
                <h1> Related Apps</h1>
                <div id="app-list-container">
                    <ul class="app-list" id="columns">
                        <li class="app-list-child">
                            <a href="#">
                                <div class="app-list-child-img-container">
                                    <img src="images/logo.png"> </div>
                                <div class="app-list-child-title">Skype</div>
                                <div class="app-list-child-rating">
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="app-list-child-downloads">
                                    <span class="fa fa-download"></span> 1234</div>
                            </a>
                        </li>
                        <li class="app-list-child">
                            <a href="#">
                                <div class="app-list-child-img-container">
                                    <img src="images/logo.png"> </div>
                                <div class="app-list-child-title">Skype</div>
                                <div class="app-list-child-rating">
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="app-list-child-downloads">
                                    <span class="fa fa-download"></span> 1234</div>
                            </a>
                        </li>
                        <li class="app-list-child">
                            <a href="#">
                                <div class="app-list-child-img-container">
                                    <img src="images/logo.png"> </div>
                                <div class="app-list-child-title">Skype</div>
                                <div class="app-list-child-rating">
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star rating-checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="app-list-child-downloads">
                                    <span class="fa fa-download"></span> 1234</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
