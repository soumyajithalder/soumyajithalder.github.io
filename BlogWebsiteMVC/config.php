<?php

session_start();
require_once "vendor/autoload.php";
$google_client = new Google_Client();
$google_client->setClientId("384652496594-vh054ge8u2f5h6sen38m4qd4msk24php.apps.googleusercontent.com");
$google_client->setClientSecret("a2xrpzFuEala4SG_fBCVgkNa");
$google_client->setApplicationName("Blogsite");
$google_client->setRedirectUri("http://blogsite.com/index/my_post");
$google_client->addScope('email');
$google_client->addScope('profile');
$login_url = $google_client->createAuthUrl();

echo $login_url;


?>
