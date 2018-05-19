<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once "includes/head.inc.php" ?>

    <title>Login</title>
</head>

<body>
    <header>
        <?php include_once "includes/header.inc.php" ?>
    </header>

    <section id="login-window">
        <div class="connection-container">
            <form class="login-container" action="includes/login.inc.php" method="POST">
                <h1>Login</h1>
                <input type="text" placeholder="Enter Username/E-mail" name="username" required>
                <br>
                <br>
                <input type="password" placeholder="Enter Password" name="password" required>

                <p> Press the login button!</p>
                <button type="submit" name="submit">Login</button>
            </form>

            <div class="separator"></div>

            <form class="register-container" action="includes/register.inc.php" method="POST">
                <h1>Register</h1>
                <input type="text" placeholder="Enter Username" name="username" required>
                <br>
                <br>
                <input type="text" placeholder="Enter Email Address" name="email" required>
                <br>
                <br>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>
                <br>
                <input type="password" placeholder="Re-enter Password" name="password2" required><br><br>

                <button type="submit" name="submit">Register</button>
            </form>
        </div>
    </section>

    <?php include_once "includes/footer.inc.php" ?>
</body>

</html>
