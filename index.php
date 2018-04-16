<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/appsPreview.inc.php" ?>
    <title>Sofy</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <div class="wrapper">
        <section class="description">
            <h1>Online Software Repository</h1>
            <p>Lorem ipsum dolor sit amet, te mea debet mentitum placerat, at nam sint voluptatibus. Pro atqui perfecto ut, eam ex malorum necessitatibus. Ut discere consetetur eum, ius errem feugait ne. Vis ex bonorum admodum constituam. At habemus insolens mel, pro aliquid imperdiet in. Ex inermis accusamus definitiones has, in nec movet recteque dignissim, quod postea albucius te eum. In labores scaevola percipitur est, id numquam principes pro, cibo alterum epicurei id eam.</p>
        </section>
        <section class="main">
            <div id="app-list-container">
                <ul class="app-list">
                     <?php getAppsPreview("All","rating",6); ?>
                </ul>
            </div>
        </section>
        <aside>
            <h2>Statistics</h2><br>
            <p>Lorem ipsum dolor sit amet, te mea debet mentitum placerat, at nam sint voluptatibus. Pro atqui perfecto ut, eam ex malorum necessitatibus. Ut discere consetetur eum, ius errem feugait ne. </p>
        </aside>
    </div>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
