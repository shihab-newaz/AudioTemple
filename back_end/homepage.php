<?php
include "Reg_Database.php";
include "function.php";
if (isset($_POST['library'])) {
    header("Location:/back_end/songLibrary.php");
}
if (isset($_POST['logout'])) {
    destroy_session();
    destroy_cookie();
    header("Location:homepage.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>AudioTemple Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/front_end/premium_page.css">
    <link rel="stylesheet" href="/front_end/homepage.css">
    <link href="https://fonts.googleapis.com/css2?
    family=DM+Sans:ital,wght@0,400;0,500;0,700;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
    <script src="/front_end/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include "/xampp/htdocs/WEB/front_end/navbar.php";
    ?>
    <div class="home">
        <div class="home-container">
            <div class="home-content">
                <h1 class="home-title">Listen to the songs you want to hear.</h1><br>
                <h2 class="home-title">Get AudioTemple Premium.</h2><br>
                <button class="home-button" onclick="premium_page()">Get Started</button>
            </div>
        </div>
    </div>
    <section class="album">
        <div class="album-container">
            <div class="album-content">
                <h1 class="album-title">Looking for music?</h1><br>
                <p>Take a look at all the best album releases</p>
            </div>
            <div class="album-arts-container-1">
                <div class="album-arts">
                    <img src="/front_end/logos/i.jpg" alt="no image">
                    <div class="album-info">
                        <h2>Meteora</h2>
                        <h4>Linkin Park</h4>
                    </div>
                </div>

                <div class="album-arts">
                    <img src="/front_end/logos/b.jpg" alt="no image">
                    <div class="album-info">
                        <h2>Starboy</h2>
                        <h4>The weekend</h4>
                    </div>
                </div>

                <div class="album-arts">
                    <img src="/front_end/logos/e.jpg" alt="no image">
                    <div class="album-info">
                        <h2>American Idiot</h2>
                        <h4>Green Day</h4>
                    </div>
                </div>
            </div>
            <div class="album-arts-container-2">
                <div class="album-arts">
                    <img src="/front_end/logos/f.jpg" alt="no image">
                    <div class="album-info">
                        <h2>Music To Be Murdered By</h2>
                        <h4>Eminem</h4>
                    </div>
                </div>

                <div class="album-arts">
                    <img src="/front_end/logos/g.png" alt="no image">
                    <div class="album-info">
                        <h2>The Beatles Second Album</h2>
                        <h4>The Beatles</h4>
                    </div>
                </div>
                <div class="album-arts">
                    <img src="/front_end/logos/jb.jpg" alt="no image">
                    <div class="album-info">
                        <h2>Justice</h2>
                        <h4>Justin Bieber</h4>
                    </div>
                </div>
            </div>
            <div class="album-arts-container-3">
                <div class="album-arts">
                    <img src="/front_end/logos/j.jpg" alt="no image">
                    <div class="album-info">
                        <h2>The Chronic</h2>
                        <h4>Dr.dre</h4>
                    </div>
                </div>
                <div class="album-arts">
                    <img src="/front_end/logos/ed.jpg" alt="no image">
                    <div class="album-info">
                        <h2>The Divide</h2>
                        <h4>Ed Sheeran</h4>
                    </div>
                </div>
                <div class="album-arts">
                    <img src="/front_end/logos/tw.jpg" alt="no image">
                    <div class="album-info">
                        <h2>Dawn FM</h2>
                        <h4>The Weekend</h4>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>
<footer>
    <ul class="social">
        <li><a href="https://www.facebook.com/">
                <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
        <li><a href="https://twitter.com/?lang=en">
                <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
        <li><a href="https://www.pinterest.com/">
                <ion-icon name="logo-pinterest"></ion-icon>
            </a></li>
        <li><a href="https://www.instagram.com/">
                <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
    </ul>
    <ul class="email">
        <li>Contact: AudioTemple@gmail.com</li>

    </ul>
    <p>@2022 AudioTemple | All Rights Reserved</p>
</footer>
<script type="text/javascript">
    function colorChange() {
        var navbar = document.getElementById("navbar");
        var scroll_val = window.scrollY;
        if (scroll_val < 150) {
            navbar.classList.remove('background-color')
        } else {
            navbar.classList.add('background-color')
        }
    }
    window.addEventListener('scroll', colorChange);
</script>