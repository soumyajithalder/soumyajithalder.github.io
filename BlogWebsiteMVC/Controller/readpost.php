<?php

/**
 * @file
 * Provides Read Post controller for showing full post to read.
 */

require_once './vendor/autoload.php';

use Blogs\Blogs;

$blog = new Blogs();
// Stores Post Id in $pid variable.
$pid = $_GET['pid'];
$res = $blog->read_more($pid);

if ($res) {
  while ($row = mysqli_fetch_assoc($res)) {
    $posts[] = $row;
  }
}
else {
  header("Location: 404page.php");
}
require_once "./View/read_post.php";

?>
