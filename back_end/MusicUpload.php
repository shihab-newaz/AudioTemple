<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/Reg_Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/function.php";
global $connection2;

if (isset($_POST['logout'])) {
    destroy_session();
    destroy_cookie();
    echo  '<script>var url = "/back_end/homepage.php";
    window.location.assign(url);</script>';
}

if (isset($_POST['upload'])) {
    $maxsize = 15728640;
    if (isset($_FILES['musicFile']['name']) && $_FILES['musicFile']['name'] != '') {
        $fileName = $_FILES['musicFile']['name'];
        $directory = "audio/";
        $targetFile = $directory . $fileName;

        $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $audioExtension = array("mp3", "flac", "ogg", "aac", "m4a", "wma", "webm");

        if (in_array($extension, $audioExtension)) {
            if ($_FILES['musicFile']['size'] > $maxsize) {
                $_SESSION['message'] = "File size too large.Must be less than 15 MiB";
            } else {

                if (move_uploaded_file($_FILES['musicFile']['tmp_name'], $targetFile)) {
                    $query = "INSERT into songs(id,file_name,file_location) VALUES ('','$fileName','$targetFile')";
                    mysqli_query($connection2, $query);
                    $_SESSION['message'] = "Uploaded to database";
                }
            }
        } else {
            $_SESSION['message'] = "Invalid file extension";
        }
    }
    // header('location:MusicUpload.php');
    // exit;
}
$_SESSION['default'] = "Please select an file to upload to database";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/front_end/music_upload.css">
    <link rel="stylesheet" href="/front_end/premium_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/57c5dcc0a7.js" crossorigin="anonymous"></script>
    <script src="/front_end/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
   include $_SERVER['DOCUMENT_ROOT'] . "/front_end/navbar.php";
    ?>
    <div class="container">
        <h1 class="container-header">Database Admin</h1>
        <div class="form-container">
            <header>
                <h3 class="header-1">
                    <?php
                    if (isset($_SESSION['default'])) {
                        echo $_SESSION['default'];
                    } ?>
                </h3>
            </header>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" class="upload-form">
                <label for="chooseFile">Choose an audio file
                    <input type="file" class="file_choose" id="chooseFile" name="musicFile">
                </label>
                <br>
                <input type="submit" class="upload-btn" name="upload" id="fileupload" value="Upload">
            </form>
            <h3 class="header-1">
                <?php
                if (isset($_POST['upload'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                } else {
                    echo "";
                } ?>
        </div>
    </div>
</body>

</html>