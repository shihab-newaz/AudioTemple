<nav class="navbar" id="navbar">
    <ul class="navbar-logo">
        <li class="logo">
            <a href="/back_end/homepage.php"><img src="/front_end/logos/3.png" alt="No image">AudioTemple</a>
        </li>
    </ul>
    <ul class="navbar-list">
        <li><a href="/back_end/premium_page.php">Premium</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="#">About</a></li>
        <li> |</li>
    </ul>
    <ul class="nav-username">
        <button class="dropbtn" name="dropbtn">
            <?php
            if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
                echo '<i class="fa-solid fa-user"></i> ' . $_SESSION['username'];
            } 
            else if (isset($_SESSION['admin-email']) && isset($_SESSION['admin-username'])) {
                echo '<i class="fa-solid fa-screwdriver-wrench"></i>  
                ' . $_SESSION['admin-username'];
            }
            else if (isset($_COOKIE['email']) && isset($_COOKIE['username'])){
                echo '<i class="fa-solid fa-user"></i> ' . $_COOKIE['username'];
            }
             else {
                echo ' <i class="fa-brands fa-spotify"></i> <i class="fa-solid fa-user"></i>';
            }
            ?>
            <i class="fa fa-caret-down"></i>
        </button>
        <?php
        nav_username_validation();
        ?>
    </ul>
</nav>