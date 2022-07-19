<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/Reg_Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/function.php";
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
    <link rel="stylesheet" href="/front_end/premium_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
     include $_SERVER['DOCUMENT_ROOT'] . "/front_end/navbar.php";
     ?>
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