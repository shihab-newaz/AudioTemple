<?php
session_write_close();
include "Reg_Database.php";

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
function nav_username_validation()
{
    global $connection;
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
        $premium_user_email = $_SESSION['email'];
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
    } else if (isset($_COOKIE['email']) && isset($_COOKIE['username'])) {
        echo '  <div class="dropdown-content">
    <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
    <button type="submit" class="dc-btn" name="logout">Log Out</button></button><br>
    </form>
    </div>';
    } else if (isset($_COOKIE['premium-user']) && isset($_COOKIE['premium-user_email'])) {
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
