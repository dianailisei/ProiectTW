<div class="logo">
    <a href="index.php">
                <img src="images/logo.png" alt="Sofy logo" title="Sofy">
            </a>
</div>
<nav class="navigation">
    <ul>
        <li>
            <a href="index.php">HOME</a>
        </li>
        <li class="categories-father">
            <a href="categories.php">CATEGORIES</a>
            <div id="drop-down">
                <a href="all.php">Entertaiment</a>
                <a href="all.php">Network</a>
                <a href="all.php">Office</a>
                <a href="all.php">Utility</a>
            </div>
        </li>
        <li class="categories-father">
            <a href="tops.php">TOPS</a>
            <div id="drop-down">
                <a href="all.php">Most downloaded apps</a>
                <a href="all.php">Most popular apps</a>
                <a href="all.php">Most recent apps</a>
            </div>
        </li>
        <li>
            <?php
            if(isset($_SESSION['username'])) {
                    echo '<a href="profile.php">ACCOUNT</a>'; 
            }
                 else{
                    echo '<a href="login.php">ACCOUNT</a>';
            }
            ?>
        </li>
        <li>
            <a href="contact.php">CONTACT</a>
        </li>
    </ul>
</nav>
<span class="search-container">
            <form action="all.php">
                <input type="text" placeholder="Search app.." name="search">
                <button type="submit" class="fa fa-search"></button>
            </form>
        </span>
