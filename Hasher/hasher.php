<?php
$pass = 'Admin1234!';
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo $hash;