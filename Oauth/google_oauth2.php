<?php

require_once '/vendor/autoload.php';

session_start();

$client = new Google_Client();

$client->setAuthConfigFile('client_secrets.json');

$folder = "/web/secore-coding/Oauth";

$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . $folder . '/google_oauth2.php');
//$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
// https://developers.google.com/identity/protocols/googlescopes?hl=en_US
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
if (! isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $folder . '/login_ok.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}