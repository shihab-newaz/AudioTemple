<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/Reg_Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/function.php";
function insert($username, $email, $password)
{
    global $connection;
    $query = "INSERT INTO registration_data(id,username,email,password) VALUES ('','$username','$email','$password')";
    $_result = mysqli_query($connection, $query);
    if (!$_result) {
        die('Query failed' . mysqli_error($connection));
    }
}
if (isset($_POST['register'])) {
    global $connection;
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($username) && isset($password) && isset($email)) {
        $query = "select * from registration_data where email='$email' ";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            echo '<script type="text/javascript">
        alert("Email Address must be unique");
            </script>';
        } else {
            if ($username == null || $email == null || $password == null) {
                echo '<script type="text/javascript">
                alert("Please fill up all the fields");
                    </script>';
            } else {
                insert($username, $email, $password);
                header("Location:/front_end/login.html");
            }
        }
    }
}
?>
<script type="text/javascript">

</script>;