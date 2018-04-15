<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/allApps.inc.php" ?>
    <title>All Apps</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section class="all-app-section">
        <aside class="all-app-aside">
            <div class="order-contariner">
                <h1>Order by</h1>
                <form action="">
                    <input type="radio" name="gender" value="male"> Rating<br>
                    <input type="radio" name="gender" value="female"> Download<br>
                    <input type="radio" name="gender" value="other"> Newest
                </form>
            </div>
            <h1>Category</h1>
            <div class="category-container">
                <form action="/action_page.php" method="get">
                    <input type="checkbox" name="Entertaiment" value="Bike"> Entertaiment<br>
                    <input type="checkbox" name="Network" value="Bike"> Network<br>
                    <input type="checkbox" name="Office" value="Bike"> Office<br>
                    <input type="checkbox" name="Utility" value="Bike"> Utility<br>
                </form>
            </div>
        </aside>
        <div class="main app-main">
            <div class="all-app-list">
               <?php showAllApps(10); ?>
            </div>
            <div class="all-app-pages">
                <a href="#" class="fa fa-arrow-left all-app-button"></a>
                <p href="#" class="all-app-button"><?php getPage();?></p>
                <a href="#" class="fa fa-arrow-right all-app-button"></a>
            </div>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
