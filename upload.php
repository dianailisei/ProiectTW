<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/sessionCheck.inc.php" ?>
    <title>Upload</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section id="upload-form-container">
        <form id="upload-form" action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
            <h1>Choose a file</h1><br>
            <input type="file" placeholder="Enter File" id="appToUpload" name="appToUpload" required>
            <br><br>
            <h1>Choose a picture</h1><br>
            <input type="file" id="app_pic" name="iconToUpload" accept=".jpg, .jpeg, .png">
            <br><br>
            <input type="text" placeholder="Enter Name" class="input-box" name="appName" required>
            <br><br>
            <input type="text" placeholder="Enter Description" class="input-box" name="appDescription" required>
            <br><br>
            <h1>Choose a category</h1>
            <br>
            <select name="categories" class="input-box">
                    <option value="Entertainment">Entertainment</option>
                    <option value="Utility">Utility</option>
                    <option value="Network">Network</option>
                    <option value="Office">Office</option>
            </select><br><br>


            <h1>Add tags</h1><br>
                <input type="text" placeholder="Enter Tag" class="input-box" name="appTags" required><br><br>
                <button type="submit" name="submit" type="button">Upload</button>
        </form>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
