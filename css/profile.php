<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/sessionCheck.inc.php" ?>
    <?php include_once "includes/profileInfo.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <title>Profile</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full" id="profile-container">
        <div id="basic-info-container">
            <?php showPicture(); ?>
            <article id="info">
                <p><span class="fa fa-address-book"></span> NAME:
                    <?php showName(); ?>
                </p><br>
                <p><span class="fa fa-envelope"></span> E-MAIL:
                    <?php showEmail(); ?>
                </p><br>
                <p><span class="fa fa-map-marker"></span> COUNTRY:
                    <?php showCountry(); ?>
                </p><br>
                <p><span class="fa fa-download"></span> DOWNLOADS:
                    <?php showDownloadsNumber(); ?>
                </p><br>
                <div class="profile-rating-container">
                    <p class="profile-rating-text"><span class="fa fa-thumbs-up"></span> YOUR RATING:</p>
                    <div class="app-list-child-rating profile-rating-stars" id="profile-star-center">
                        <?php showProfileRating(); ?>
                    </div>
                </div>
            </article>
        </div>
        <div id="options-container">
            <ul>
                <li class="option"><a href="upload.php">Upload File</a></li>
                <li class="option"><a href="settings.php">Settings</a></li>
                <li class="option"><a href="includes/sessionDestroy.inc.php">Logout</a></li>
            </ul>
        </div>

        <div class="app-section" id="app-section-small">
            <h1>Your apps</h1>

            <div id="app-list-container">
                <ul class="app-list">
                    <?php getUserApps($_SESSION['id']); ?>
                </ul>
            </div>

        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
