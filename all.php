<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/allApps.inc.php" ?>
    <?php include_once "includes/page.inc.php" ?>
    <title>All Apps</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="all-app-section">
        <aside class="all-app-aside">
            <form method="GET" action="all.php" class="all-app-container">
                <h1>Order by</h1>
                <div class="all-app-sub">
                <div><input type="radio" name="order" value="rating">Rating</div><br>
                <div><input type="radio" name="order" value="downloads">Downloads</div><br>
                <div><input type="radio" name="order" value="upload_date">Newest</div><br>
                </div>
                <br><br>
                <h1>Category</h1>
                <div class="all-app-sub">
                <div><input type="radio" name="category" value="Entertaiment"> Entertaiment</div><br>
                <div><input type="radio" name="category" value="Network"> Network</div><br>
                <div><input type="radio" name="category" value="Office"> Office</div><br>
                <div><input type="radio" name="category" value="Utility"> Utility</div><br>
                </div>
                <h1>Tags</h1>
                <input type="text" placeholder="Type tags here" name="tags"><br>
                <button type="submit" name="tags">Apply</button>
            </form>
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
