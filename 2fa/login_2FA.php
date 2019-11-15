<?php
require 'vendor/autoload.php';

$google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();  

$user =  "admin";
//echo $user.'<br>'.$pass;

$google2fa_key = $google2fa->generateSecretKey(32);

$inlineUrl = $google2fa->getQRCodeInline('SecureCode',$user,$google2fa_key);

echo "<img src='".$inlineUrl."'><br>";
echo $google2fa_key;
