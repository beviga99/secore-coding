<?php
require 'composer/vendor/autoload.php';
$servername = "localhost";
$username = "phpmyadmin";
$password = "Admin1234!";
$dbname = "web";

$google2fa = new \PragmaRX\Google2FA\Google2FA();    

$user =  strtolower($_POST['user']);
$pass = $_POST['password'];
//echo $user.'<br>'.$pass;

$google2fa_key = $google2fa->generateSecretKey();

$qrCodeUrl = $google2fa->getQRCodeUrl(
    $user,
    $google2fa_key
);

echo '<img src="{{$qrCodeUrl}}"><br>'.$google2fa_key;
