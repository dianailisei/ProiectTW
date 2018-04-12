<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>

    <title>Settings</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section id="settings-container">

        <div class="settings">
            <form class="set-form">
                <h1>Change your profile picture</h1>
                <input type="file" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png" required>
            </form>
            <button type="submit" type="button">Save</button><br><br>
        </div>

        <div class="settings">

            <form class="set-form">
                <h1>Change your password</h1>
                <input type="password" placeholder="Enter Actual Password" class="input-box" name="password" required><br><br>
                <input type="password" placeholder="Enter New Password" class="input-box" name="password" required><br><br>
                <input type="password" placeholder="Re-Enter New Password" class="input-box" name="password" required>
            </form>
            <button type="submit" type="button">Save</button><br><br>
        </div>

        <div class="settings">
            <form class="set-form">
                <h1>Change your address</h1>
                <input type="text" placeholder="Enter New Address" class="input-box" name="address" required>
            </form>
            <button type="submit" type="button">Save</button><br><br>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
