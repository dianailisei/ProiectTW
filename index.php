<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <?php include_once "includes/statistics.inc.php" ?>
    <title>Sofy</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <div class="wrapper">
        <section class="description">
            <h1>Online Software Repository</h1>
            <p>Sofy is a software repository where you can find numerous useful apps, from basic office tools to increase your productivity to entertaining apps, games and so on. The web application is available on every device, so, besides apps designed for Windows, you can find here executables both for Android or Linux. Feel free to navigate through categories, tops, download different apps, or, why not, register in order to vote and upload your own applications!</p>
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
            <br><br>
            <h1>Statistics</h1><br>
            <h2>Total Number of Downloads</h2><br>
            <h1>
                <?php echo getNumberOfDownloads(); ?>
            </h1><br>
            <h2>Total number of Apps</h2><br>
            <h1>
                <?php echo getNumberOfApps(); ?>
            </h1><br>
            <h2>Total number of Users</h2><br>
            <h1>
                <?php echo getNumberOfUsers(); ?>
            </h1><br>
            <h2>Total number of Votes</h2><br>
            <h1>
                <?php echo getNumberOfVotes(); ?>
            </h1><br>
        </aside>
    </div>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
