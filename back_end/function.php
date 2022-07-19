<?php
session_write_close();
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/Reg_Database.php";

function destroy_session()
{
    session_unset();
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
}
function destroy_cookie()
{
    if (isset($_COOKIE['username']) && isset($_COOKIE['email'])) {
        setcookie('username', '', time() - 86400);
        setcookie('email', '', time() - 86400);
    }
}
function premium_user_query($premium_user_email)
{
    global $connection;
    $query = "SELECT * FROM premium_users WHERE email LIKE ('%$premium_user_email%')";
    $result = mysqli_query($connection, $query);
    $num_of_rows = mysqli_num_rows($result);

    if ($num_of_rows == 1) {
        echo '  <div class="dropdown-content">
    <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
    <button type="submit" class="dc-btn" name="logout">Log Out</button></button><br>
    <button type="submit" class="dc-btn" name="library">Library</button></button><br>
    </form>
    </div>';
    } else {
        echo '  <div class="dropdown-content">
            <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
            <button type="submit" class="dc-btn" name="logout">Log Out</button></button><br>
            </form>
            </div>';
    }
}
function nav_username_validation()
{
    // global $connection;
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {

        $premium_user_email_sesh = $_SESSION['email'];
        premium_user_query($premium_user_email_sesh);
    } else if (isset($_COOKIE['email']) && isset($_COOKIE['username'])) {

        $premium_user_email_cook = $_COOKIE['email'];
        premium_user_query($premium_user_email_cook);
    } else if (isset($_SESSION['admin-username']) && isset($_SESSION['admin-email'])) {

        echo '  <div class="dropdown-content">
        <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
        <button type="submit" class="dc-btn" name="logout">Log Out</button></button><br>
        <button type="submit" class="dc-btn" name="library">Library</button></button><br>
        </form>
        </div>';
    } else {

        echo '  <div class="dropdown-content">
    <button type="submit" class="dc-btn" onclick="login_page()">Log in</button></button><br>
</div> ';
    }
}
function checkout()
{
    global $connection;
    if (
        $_POST['cardname'] != null && $_POST['cardnumber'] != null && $_POST['expmonth'] != null
        && $_POST['expyear'] != null && $_POST['cvv'] != null
    ) {
        $premium_user = $_SESSION['premium-user'];
        $premium_user_email = $_SESSION['premium-user_email'];
        $query = "INSERT IGNORE INTO premium_users(id,username,email)
         VALUES('',' $premium_user',' $premium_user_email')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('Query failed' . mysqli_error($connection));
        }
        echo  '<script>var url = "/back_end/homepage.php";
        window.location.assign(url);</script>';
    }
}
