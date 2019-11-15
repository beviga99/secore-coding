<?php
require 'vendor/autoload.php';
$servername = "localhost";
$username = "phpmyadmin";
$password = "Admin1234!";
$dbname = "web";
$conn = new mysqli($servername, $username, $password,$dbname);

$google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();

$user =  $_POST['user'];
$twofactor = $_POST['twofactor'];

$sql = "SELECT twofactor FROM users WHERE user = '$user';";
//echo $sql;

$result = $conn->query($sql);

$row = $result->fetch_row();
//echo $row[0];

$valid = $google2fa->verifyKey($row[0], $twofactor);

if (($row) && ($valid)) {
    session_start();
    $_SESSION['user'] = $user;
    echo 'OK';
  
} else{    
    header('location: login_2FA.html');
}

$conn->close();
