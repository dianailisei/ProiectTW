<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/allApps.inc.php" ?>
    <?php include_once "includes/page.inc.php" ?>
    <?php include_once "includes/filter.inc.php" ?>
    <title>All Apps</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="all-app-section">
        <aside class="all-app-aside">
            <?php showFilter(); ?>
        </aside>
        <div class="main app-main" id="all-app-container">
            <div class="all-app-list">
                
                <?php showAllApps(12); ?>
            </div>
            <div class="all-app-pages">
                <?php previousPage(getPage()); ?>
                <p href="#" class="all-app-button"><?php printPage();?></p>
                <?php nextPage(getPage()); ?>
            </div>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
