<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>

    <title>Upload</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section id="upload-form-container">
        <form id="upload-form">
            <h1>Choose a file</h1><br>
            <input type="file" placeholder="Enter File" name="file" required>
            <br><br>
            <h1>Choose a picture</h1><br>
            <input type="file" id="app_pic" name="app_pic" accept=".jpg, .jpeg, .png" required>
            <br><br>
            <input type="text" placeholder="Enter Name" class="input-box" name="app-name" required>
            <br><br>
            <input type="text" placeholder="Enter Description" class="input-box" name="app-info" required>
            <br><br>
            <h1>Choose a category</h1>
            <br>
            <select name="Categories" class="input-box">
                    <option value="Entertainment">Entertainment</option>
                    <option value="Utility">Utility</option>
                    <option value="Network">Network</option>
                    <option value="Office">Office</option>
                </select><br><br>

            <h1>Choose tags</h1><br>
            <form action="">
                <label for="games">Games</label>
                <input type="checkbox" name="tag" id="games" value="games">
                <label for="fun">Fun</label>
                <input type="checkbox" name="tag" id="fun" value="fun">
                <label for="windows">Windows</label>
                <input type="checkbox" name="tag" id="windows" value="windows">
                <label for="linux">Linux</label>
                <input type="checkbox" name="tag" id="linux" value="linux">
                <label for="iOS">iOS</label>
                <input type="checkbox" name="tag" id="iOS" value="iOS">
                <label for="android">Android</label>
                <input type="checkbox" name="tag" id="android" value="android"><br>
                <br>

                <h1>Or add tags</h1><br>
                <form action="">
                    <input type="text" placeholder="Enter Tag" class="input-box" name="new-tag" required><br><br>
                    <button type="submit" type="button">Upload</button>
                </form>
            </form>
        </form>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
