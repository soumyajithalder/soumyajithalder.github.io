<?php

/**
 * @file
 * Provides LogIn SignUp controller for logging in or signing up Users..
 */

require_once './vendor/autoload.php';

use Dbc\Dbc;

require_once './vendor/autoload.php';

use User\User;

$db = new Dbc();
$user = new User();

$google_client = new Google_Client();
$google_client->setClientId("384652496594-vh054ge8u2f5h6sen38m4qd4msk24php.apps.googleusercontent.com");
$google_client->setClientSecret("a2xrpzFuEala4SG_fBCVgkNa");
$google_client->setApplicationName("Blogsite");
$google_client->setRedirectUri("http://blogsite.com/index/my_post");
$google_client->addScope('email');
$google_client->addScope('profile');
$login_url = $google_client->createAuthUrl();

if (isset($_REQUEST['login-submit'])) {
  session_start();
  $secret_key = "6LdHLd8UAAAAAAQxzFhxoV3Z5ZPSvH6SAmI4Tx0F";
  $response_key = $_POST['g-recaptcha-response'];
  $user_ip = $_SERVER['REMOTE_ADDR'];

  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key&remoteip=$user_ip";
  $response = file_get_contents($url);
  $response = json_decode($response);

  extract($_REQUEST);
  $login = $user->login_check($username, $password);
  if ($login && $response->success) {
    header('Location: /index/my_post');
  }
  else {
    $_SESSION['login'] = "0";
    if (!$response->success) {
      $err = "You're probably a ROBOT";
    }
    else {
      $err = "Wrong credentials. Check your Username or Password";
    }
  }
}
elseif (isset($_REQUEST['signup-submit'])) {
  extract($_REQUEST);
  $signup = $user->signup_user($fullname, $username, $password);
  if ($signup) {
    $_SESSION['signup'] = 1;
  }
  else {
    $_SESSION['signup'] = 0;
  }
}
require_once "./View/login_register.php";
?>
