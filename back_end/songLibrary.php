<?php
include "Reg_Database.php";
$query = "SELECT * FROM songs ORDER BY id";
$fetchAudio = mysqli_query($connection2, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="/front_end/songLibrary.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <ul class="navbar-list">
            <li class="logo"><img src="/front_end/logos/3.png" alt="No image">AudioTemple</li>
            <li><a href="/front_end/homepage.php">Home</a></li>
            <li><a href="#">About</a></li>
        </ul>
        <div class="nav-username">
            <button class="dropbtn" name="dropbtn">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<i class="fa-solid fa-user"></i> ' . $_SESSION['username'];
                } else {
                    echo ' <i class="fa-brands fa-spotify"></i> <i class="fa-solid fa-user"></i>';
                }
                ?>
                <i class="fa fa-caret-down"></i>
            </button>
            <?php
            if (isset($_SESSION['username'])) {
                echo '  <div class="dropdown-content">
            <form action=" ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' "method="POST">
            <button type="submit" class="dc-btn" name="logout">Log Out</button></button><br>
            <button type="submit" class="dc-btn" name="library">Library</button></button><br>
            </form>
            </div>';
            } else {
                echo '  <div class="dropdown-content">
            <a href="/front_end/login.html">   Log in</a>
            </div> ';
            }
            ?>
        </div>
    </nav>
    <div class="songLibrary">
        <div class="song-list">
            <h1>Song Library</h1>
            <div class="song-container">
                <?php
                while ($row = mysqli_fetch_assoc($fetchAudio)) {
                    $file_name = $row['file_name'];
                    $file_location = $row['file_location'];
                    $x = substr($file_name, 0, strpos($file_name, ".mp3"));
                    $name = str_replace("_", " ", $x);
                    echo '<div class="song">
                    <img src="/front_end/logos/3.jpg" alt="no image" srcset="">
                    <p>' . "$name" . '</p>
                    <audio controls loop>
                    <source src =' . $file_location . ' type = "audio/mp3" />
                    Your browser does not support the <audio> element.
                    </audio></div>';
                }
                ?>

            </div>
        </div>
</body>

</html>