<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <?php include_once "includes/uploader.inc.php" ?>
    <title>
        <?php showUploaderName();?>
    </title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full" id="profile-container">
        <div id="basic-info-container">
            <?php getInfo();?>
            <?php showUploaderPicture();?>
            <article id="info">
                <p><span class="fa fa-address-book"></span> NAME:
                    <?php showUploaderRealName(); ?>
                </p><br>

                <p><span class="fa fa-map-marker"></span> COUNTRY:
                    <?php showUploaderCountry(); ?>
                </p><br>
                <p><span class="fa fa-download"></span> DOWNLOADS:
                    <?php showUploaderDownloadsNumber(); ?>
                </p><br>
                <div class="profile-rating-container">
                    <p class="profile-rating-text"><span class="fa fa-thumbs-up"></span>
                        <?php showUploaderName();?>'s RATING:</p>
                    <div class="app-list-child-rating profile-rating-stars" id="profile-star-center">
                        <?php showUploaderRating(); ?>
                    </div>
                </div>
            </article>
        </div>
        <div class="app-section" id="app-section-small">
            <h1>
                <?php showUploaderName();?>'s apps </h1>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php showUploaderApps(); ?>
                </ul>
            </div>

        </div>
    </section>
