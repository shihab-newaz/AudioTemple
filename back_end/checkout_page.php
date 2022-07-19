<?php
include "Reg_Database.php";
include "function.php";
global $connection;

if (isset($_POST['library'])) {
    // header("Location:/back_end/songLibrary.php");
    echo  '<script>var url = "/back_end/songLibrary.php";
    window.location.assign(url);</script>';
}
if (isset($_POST['logout'])) {
    destroy_session();
    destroy_cookie();
    echo  '<script>var url = "/back_end/homepage.php";
   window.location.assign(url);</script>';
}
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    if (isset($_POST['buy-btn'])) {

        if (
            $_POST['cardname'] != null && $_POST['cardnumber'] != null && $_POST['expmonth'] != null
            && $_POST['expyear'] != null && $_POST['cvv'] != null
        ) {
            $_SESSION['premium-user'] = $_SESSION['username'];
            $_SESSION['premium-user_email'] = $_SESSION['email'];
            $premium_user = $_SESSION['premium-user'];
            $premium_user_email = $_SESSION['premium-user_email'];
            $query = "INSERT IGNORE INTO premium_users(id,username,email)
             VALUES('',' $premium_user',' $premium_user_email')";
            $result = mysqli_query($connection, $query);

            setcookie('premium-user', $_SESSION['username'], time() + 12 * 30 * 86400);
            setcookie('premium-user_email',  $_SESSION['email'], time() + 12 * 30 * 86400);
            echo  '<script>var url = "/back_end/homepage.php";
            window.location.assign(url);</script>';
        }
    }
}
if (!isset($_SESSION['username']) && !isset($_SESSION['email'])) {
    echo '<script type="text/javascript">
        alert("You must login first");</script>';
    echo  '<script>var url = "/back_end/checkout.php";
        window.location.assign(url);</script>';
    // header("Location:checkout_page.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout_page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/front_end/checkout_page.css">
    <link rel="stylesheet" href="/front_end/premium_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
    <script src="/front_end/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include "/xampp/htdocs/WEB/front_end/navbar.php";
    ?>

    <div class="header-text">
        <h2>Every Song You Need. For an Unbeatable Price.</h2>
        <p>For more information visit our
            <a href="premium_page.php" style="color:blue;">pricing</a> page
        </p>
    </div>
    <div class="row">
        <div class="column-1">
            <div class="container">
                <form method="POST">
                    <div class="column-2">
                        <h3>Payment</h3>
                        <label for="acc_card">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Name on the Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="Cardname" required>
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="Cardnumber" required>
                        <label for="expmonth">Expiration Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="MM" required>
                        <div class="row">
                            <div class="column-2">
                                <label for="expyear">Expiration Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="YY" required>
                            </div>
                            <div class="column-2">
                                <label for="cvc">CVC</label>
                                <input type="text" id="cvv" name="cvv" placeholder="CVC" required>
                            </div>
                        </div>
                    </div>
            </div>
            <input type="submit" value="Buy Now" class="buy-btn" name="buy-btn">
            </form>
        </div>
    </div>
</body>

</html>