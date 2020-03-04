<?php

/**
 * @file
 * Provides Ajax controller for add post using Ajax.
 */

require_once '../vendor/autoload.php';

use Blogs\Blogs;

session_start();
$blog = new Blogs();
if (count($_FILES) > 0) {
  if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    // Stores image file.
    $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
  }
}
// Stores date in a format.
$date = date('Y-m-d, H:i:s');
// Stores user id in $authorId variable.
$authorId = $_SESSION['uid'];

if (isset($_REQUEST['submit'])) {
  extract($_REQUEST);
  $add_post = $blog->add_posts($title, $post, $authorId, $date, $imgData);
  if ($add_post) {
    echo "Post Added";
  }
  else {
    $_SESSION['add'] = 0;
  }
}

?>
