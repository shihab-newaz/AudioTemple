<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/Reg_Database.php";
include "function.php";

if (isset($_POST['logout'])) {
    session_unset();
    echo session_id();
    $cookie_par = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 86400,
        $cookie_par['path'],
        $cookie_par['domain'],
        $cookie_par['secure'],
        $cookie_par['httponly']
    );
    session_destroy();
    setcookie("username", "", time() - 86400);
    setcookie("email", "", time() - 86400);
    header("Location:premium_page.php");
}
if (isset($_POST['library'])) {
    header("Location:songLibrary.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AudioTemple Pricing</title>
    <link rel="stylesheet" href="/front_end/premium_page.css">
    <link href="https://fonts.googleapis.com/css2?
    family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
    <script src="/front_end/script.js"></script>
</head>

<body>
    <?php
    include "/xampp/htdocs/WEB/front_end/navbar.php";
    ?>

    <section class="section-1">
        <h1 class="header1">To start listening, just pick a plan</h1>
    </section>
    <div class="card-1">
        <section class="section-2">
            <h1 class="header2">AudioTemple Family</h1><br>
            <h4 class="header2">৳319.00/month after offer period<br>
                Up to 6 accounts</h4><br>
            <p id="line">_________________________________</p><br>
            <h5 class="header2"><i class="fa-solid fa-check"></i> 6 Premium accounts for family members
                <br>living under one roof<br>
            </h5>
            <h5 class="header2"><i class="fa-solid fa-check"></i> Block explicit music<br></h5>
            <h5 class="header2"><i class="fa-solid fa-check"></i> On-demand playback</h5><br>
            <button type="submit" class="subscribe-btn" name="subscribe-btn" onclick="checkout_page()">
                Get Started</button>
        </section>
        <section class="section-3">
            <h1 class="header2">AudioTemple Individual</h1><br>
            <h4 class="header2">৳199.00/month after offer period <br>
                1 account</h4>
            <p id="line">_________________________________</p><br>
            <h5 class="header2"><i class="fa-solid fa-check"></i> Ad-free music listening</h5>
            <h5 class="header2"><i class="fa-solid fa-check"></i> Play anywhere - even offline</h5>
            <h5 class="header2"><i class="fa-solid fa-check"></i> On-demand playback</h5><br><br>
            <button type="submit" class="subscribe-btn" name="subscribe-btn" onclick="checkout_page()">
                Get Started</button>
        </section>
        <section class="section-4">
            <h1 class="header2">AudioTemple Duo</h1><br>
            <h4 class="header2">৳260.00/month after offer period <br>
                2 accounts</h4>
            <p id="line">_________________________________</p><br>
            <h5 class="header2"><i class="fa-solid fa-check"></i> 2 Premium accounts for a <br> couple
                under one roof</h5>
            <h5 class="header2"><i class="fa-solid fa-check"></i> Ad-free music listening</h5>
            <h5 class="header2"><i class="fa-solid fa-check"></i> On-demand playback</h5><br>
            <button type="submit" class="subscribe-btn" name="subscribe" onclick="checkout_page()">Get Started
            </button>
        </section>
    </div>

</body>


</html>