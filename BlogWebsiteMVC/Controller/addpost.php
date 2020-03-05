<?php

/**
 * @file
 * Provides Adding Post controller for adding post.
 */

require_once './vendor/autoload.php';

use Blogs\Blogs;

session_start();
include_once "logout.php";
$blog = new Blogs();
if (count($_FILES) > 0) {
  if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
  }
}
// Stores date in a format.
$date = date('Y-m-d, H:i:s');
// Stores User Id in $authorId variable.
$authorId = $_SESSION['uid'];
if (isset($_REQUEST['submit'])) {
  extract($_REQUEST);
  $add_post = $blog->add_posts($title, $post, $authorId, $date, $imgData);
  if ($add_post) {
    $_SESSION['add'] = 1;
  }
  else {
    $_SESSION['add'] = 0;
  }
}

require_once "./View/add_post.php";

?>
