<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/Reg_Database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/function.php";
if (isset($_POST['admin-login'])) {
    global $connection;
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($password) && isset($email)) {
        $query = "select * from admin where email='$email' and password='$password' ";
        $result = mysqli_query($connection, $query);
        $num_of_rows = mysqli_num_rows($result);
        if ($num_of_rows == 1) {
            $row_data=mysqli_fetch_assoc($result);
            $username=$row_data['username'];
            if (isset($_POST['check-box'])) {
                setcookie('username',$username,time()+30*86400);
                setcookie("email",$email,time()+30*86400);
            }
            $_SESSION['admin-email'] = $email;
            $_SESSION['admin-username'] = $username;
            $_SESSION['admin-password'] = $password;
            header("Location:Delete.php");
        }else{
            echo '<script type="text/javascript">
            alert("Please enter the correct email and password");
          </script>';
          
        }
    }  
}
