<?php

/**
 * @file
 * Provides Logout controller for Logging Out Users.
 */

require_once './vendor/autoload.php';

use User\User;

$user = new User();
// Stores User Id in $uid variable.
$uid = $_SESSION['uid'];
if (!$user->get_session()) {
  header('Location: /index/login-or-signup');
}
if (isset($_GET['q'])) {
  $user->logout();
  unset($_SESSION['login']);
  header('Location: /');
}

?>
