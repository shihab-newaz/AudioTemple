<?php
session_start();
$dbName='login_data';
$host='localhost';
$dbUser='root';
$dbPassword='';
$connection = mysqli_connect($host, $dbUser, $dbPassword, $dbName);
if ($connection) {
    // echo "connected";
} else {
    die("database connection failed");
}
$dbName2 = 'musicdb';
$host2 = 'localhost';
$dbUser2 = 'root';
$dbPassword2 = '';
$connection2 = mysqli_connect($host2, $dbUser2, $dbPassword2, $dbName2);
if ($connection2) {
    // echo "connected";
} else {
    die("database connection failed");
}

