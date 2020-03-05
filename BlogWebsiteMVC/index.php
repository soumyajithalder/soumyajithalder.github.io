<?php

/**
 * @file
 * Provides deafult index page for the Blog Website..
 */

require_once 'vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($uri) {
  case "/":
    require_once 'Controller/home.php';
    break;

  case "/index/login-or-signup":
    require_once 'Controller/login-or-signup.php';
    break;

  case "/index":
    require_once 'Controller/home.php';
    break;

  case "/index/my_post":
    require_once 'Controller/mypost.php';
    break;

  case "/index/read":
    require_once 'Controller/readpost.php';
    break;

  case "/index/add":
    require_once 'Controller/addpost.php';
    break;

  case "/index/edit":
    require_once 'Controller/editpost.php';
    break;

  case "/index/delete":
    require_once 'Controller/deletepost.php';
    break;

  default:
    header("Location: /404page.php");
}

?>
