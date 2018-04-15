<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>
    <?php include_once "includes/sessionCheck.inc.php" ?>
    <title>Settings</title>
</head>

<body>

    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section id="settings-container">
        <div class="settings">
            <form class="set-form" action="includes/firstLast.inc.php" method="POST">
                <h1>Set your personal info</h1>
                <input type="text" placeholder="Set First Name" class="input-box" name="first" required><br><br>
                <input type="text" placeholder="Set Last Name" class="input-box" name="last" required>
                <br><br>
                <button type="submit" name="submit">Save</button><br><br>
            </form>
        </div>

        <div class="settings">
            <form class="set-form" action="includes/country.inc.php" method="post">
                <h1>Set your location</h1>
                <input type="text" placeholder="Enter Country" class="input-box" name="country" required><br><br>
                <button type="submit" name="submit">Save</button><br><br>
            </form>
        </div>

        <div class="settings">
            <form class="set-form" action="includes/profilePic.inc.php" method="post">
                <h1>Set your profile picture</h1>
                <input type="file" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png" required><br><br>
                <button type="submit" name="submit">Save</button><br><br>
            </form>
        </div>

        <div class="settings">

            <form class="set-form" action="includes/password.inc.php" method="post">
                <h1>Change your password</h1>
                <input type="password" placeholder="Enter Actual Password" class="input-box" name="password" required><br><br>
                <input type="password" placeholder="Enter New Password" class="input-box" name="password1" required><br><br>
                <input type="password" placeholder="Re-Enter New Password" class="input-box" name="password2" required><br><br>
                <button type="submit" name="submit">Save</button><br><br>
            </form>
        </div>

        <div class="settings set-form">
            <h1>Delete account</h1>
            <form action="includes/delete_profile.inc.php" method="post">
                <button type="submit" name="submit">Delete</button><br><br>
            </form>
        </div>

    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>


</html>
