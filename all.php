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
            <form method="GET" action="" class="all-app-container">
                <h1>Order by</h1>
                <div class="all-app-sub">
                <div><input type="radio" name="order" value="rating">Rating</div><br>
                <div><input type="radio" name="order" value="downloads">Downloads</div><br>
                <div><input type="radio" name="order" value="upload_date">Newest</div><br>
                </div>
                <br><br>
                <h1>Category</h1>
                <div class="all-app-sub">
                <div><input type="checkbox" name="Entertaiment" value="Bike"> Entertaiment</div><br>
                <div><input type="checkbox" name="Network" value="Bike"> Network</div><br>
                <div><input type="checkbox" name="Office" value="Bike"> Office</div><br>
                <div><input type="checkbox" name="Utility" value="Bike"> Utility</div><br>
                </div>
                <h1>Tags</h1>
                <input type="text" placeholder="Type tags here" name="tags"><br>
                <button type="submit" name="filter">Apply</button>
            </form>
        </aside>
        <div class="main app-main" id="all-app-container">
            <div class="all-app-list">
                
                <script type="text/javascript">
                    function populate() {
                    var containerSize = document.getElementById('all-app-container').offsetWidth;
                    var elementsNumber = (containerSize - containerSize % 180) / 180;
                    //elementsNumber *= 3;
                    var cod = "<?php showAllApps(6); ?>";
                    alert(cod);
                    }
                    console.debug(containerSize);
                </script>
                
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
