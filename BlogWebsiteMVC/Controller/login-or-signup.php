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

if (isset($_REQUEST['login-submit'])) {
  session_start();
  extract($_REQUEST);
  $login = $user->login_check($username, $password);
  if ($login) {
    header('Location: /index/my_post');
  }
  else {
    $_SESSION['login'] = "0";
    $err = 'Not Signed Up Successfully. Username or Password might be wrong! Please Sign Up';
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
