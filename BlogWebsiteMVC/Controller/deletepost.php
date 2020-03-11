<?php

/**
 * @file
 * Provides Delete Post controller for deleting post.
 */

require_once './vendor/autoload.php';

use Blogs\Blogs;

session_start();
$blog = new Blogs();
if (!isset($_GET['pid'])) {
  header("Location: /");
}
else {
  $pid = $_GET['pid'];
  $blog->delete_posts($pid);
  header("Location: /index/my_post");
}

?>
