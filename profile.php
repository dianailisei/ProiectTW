<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/sessionCheck.inc.php" ?>
    <title>Profile</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="main-full" id="profile-container">
        <div id="basic-info-container">
            <img src="images/profile-icon.png" alt="Profile Picture" title="Profile Picture" id="pic">
            <article id="info">
                <p><span class="fa fa-address-book"></span> NAME: Harry Potter </p><br>
                <p><span class="fa fa-envelope"></span> E-MAIL: pp@jsfnd</p><br>
                <p><span class="fa fa-map-marker"></span> ADDRESS: fnwifnWPOE</p><br>
                <p><span class="fa fa-download"></span> DOWNLOADS: 1234</p><br>
                <div class="profile-rating-container">
                    <p class="profile-rating-text"><span class="fa fa-thumbs-up"></span> YOUR RATING:</p>
                    <div class="app-list-child-rating profile-rating-stars" id="profile-star-center">
                        <span class="fa fa-star rating-checked"></span>
                        <span class="fa fa-star rating-checked"></span>
                        <span class="fa fa-star rating-checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </article>
        </div>
        <div id="options-container">
            <ul>
                <li class="option"><a href="upload.php">Upload File</a></li>
                <li class="option"><a href="settings.php">Settings</a></li>
                <li class="option">
                    <a href="index.php">Logout</a></li>
            </ul>
        </div>

        <div class="app-section" id="app-section-small">
            <h1>Your apps</h1>

            <div id="app-list-container">
                <ul class="app-list">
                    <li class="app-list-child">
                        <a href="app.html">
                            <div class="app-list-child-img-container">
                                <img src="images/logo.png"> </div>
                            <div class="app-list-child-title bigger-title">Skype</div>
                        </a>
                        <a href="">
                            <div class="fa fa-close fa-2x delete-button"></div>
                        </a>
                    </li>
                    <li class="app-list-child">
                        <a href="app.html">
                            <div class="app-list-child-img-container">
                                <img src="images/logo.png"> </div>
                            <div class="app-list-child-title bigger-title">Skype</div>
                        </a>
                        <a href="">
                            <div class="fa fa-close fa-2x delete-button"></div>
                        </a>
                    </li>
                    <li class="app-list-child">
                        <a href="app.html">
                            <div class="app-list-child-img-container">
                                <img src="images/logo.png"> </div>
                            <div class="app-list-child-title bigger-title">Skype</div>
                        </a>
                        <a href="">
                            <div class="fa fa-close fa-2x delete-button"></div>
                        </a>
                    </li>
                    <li class="app-list-child">
                        <a href="app.html">
                            <div class="app-list-child-img-container">
                                <img src="images/logo.png"> </div>
                            <div class="app-list-child-title bigger-title">Skype</div>
                        </a>
                        <a href="">
                            <div class="fa fa-close fa-2x delete-button"></div>
                        </a>
                    </li>
                    <li class="app-list-child">
                        <a href="app.html">
                            <div class="app-list-child-img-container">
                                <img src="images/logo.png"> </div>
                            <div class="app-list-child-title bigger-title">Skype</div>
                        </a>
                        <a href="">
                            <div class="fa fa-close fa-2x delete-button"></div>
                        </a>
                    </li>
                    <li class="app-list-child">
                        <a href="app.html">
                            <div class="app-list-child-img-container">
                                <img src="images/logo.png"> </div>
                            <div class="app-list-child-title bigger-title">Skype</div>
                        </a>
                        <a href="">
                            <div class="fa fa-close fa-2x delete-button"></div>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
