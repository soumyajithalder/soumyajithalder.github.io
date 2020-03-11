<?php

/**
 * @file
 * Provides Ajax controller for edit post using Ajax.
 */

require_once './vendor/autoload.php';

use Blogs\Blogs;

session_start();
$blog = new Blogs();

// Stores Post Id in $pid.
$pid = $_GET['pid'];

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
    echo "Post Updated";
  }
  else {
    $_SESSION['edit'] = 0;
  }
}

?>
