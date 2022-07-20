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
if (isset($_POST['library'])) {
    header("Location:songLibrary.php");
}

if (isset($_POST['upload'])) {
    $maxsize = 15728640;
    if (isset($_FILES['musicFile']['name']) && $_FILES['musicFile']['name'] != '') {
        $fileName = $_FILES['musicFile']['name'];
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/back_end/audio/";
        $targetFile = $directory . $fileName;

        $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $audioExtension = array("mp3", "flac", "ogg", "aac", "m4a", "wma", "webm");

        if (in_array($extension, $audioExtension)) {
            if ($_FILES['musicFile']['size'] > $maxsize) {
                $_SESSION['message'] = "File size too large.Must be less than 15 MiB";
            } else {

                if (move_uploaded_file($_FILES['musicFile']['tmp_name'], $targetFile)) {
                    $insert_query = "INSERT IGNORE into songs(id,file_name,file_location) VALUES 
                    ('','$fileName','$targetFile')";
                    mysqli_query($connection2, $insert_query);
                    $_SESSION['message'] = "Uploaded to database";
                    $x=$_SESSION['message'];
                    echo "<script>
                    alert('$x');
                    </script>";
                }
            }
        } else {
            $_SESSION['message'] = "Invalid file extension";
        }
    }
}
$_SESSION['insertion'] = "Please select a file to upload to database";
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
    <section class="admin-panel">
        <div class="container">
            <h1 class="container-header">Database Admin</h1>
            <div class="form-container">
                <header>
                    <h3 class="header-1">
                        <?php
                        if (isset($_SESSION['insertion'])) {
                            echo $_SESSION['insertion'];
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
                <h3 class="header-1">To delete an audio file <a href="/back_end/Delete.php">click here</a></h3>

            </div>
    </section>
</body>

</html>
