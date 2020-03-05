<?php

/**
 * @file
 * Provides Edit Post controller for editing post.
 */

require_once './vendor/autoload.php';

use Blogs\Blogs;

session_start();
include_once "logout.php";
$blog = new Blogs();
// Stores Post Id in $pid variable.
$pid = $_GET['pid'];
$content_post = $blog->read_more($pid);
$cp = array();

if ($content_post) {
  while ($row = mysqli_fetch_assoc($content_post)) {
    $cp[] = $row;
  }
}
else {
  header("Location: 404page.php");
}

if (count($_FILES) > 0) {
  if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
  }
}

// Stores date in a format.
$date = date('Y-m-d, H:i:s');
// Stores User Id in $authorId variable.
$authorId = $_SESSION['uid'];
if (isset($_REQUEST['update'])) {
  extract($_REQUEST);
  $edit_post = $blog->edit_posts($pid, $title, $post, $authorId, $date, $imgData);
  if ($edit_post) {
    $_SESSION['edit'] = 1;
  }
  else {
    $_SESSION['edit'] = 0;
  }
}
require_once "./View/edit_post.php";
?>
