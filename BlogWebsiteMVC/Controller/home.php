<?php

/**
 * @file
 * Provides Adding Post controller for adding post.
 */

require_once './vendor/autoload.php';

use User\User;

use Blogs\Blogs;

session_start();
$user = new User();
$session = $user->get_session();
$blog = new Blogs();

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
}
else {
  $pageno = 1;
}

// Stores number of posts to show in each page.
$no_of_records_per_page = 3;
// Keeps track of last page to detect missing last page record.
$offset = ($pageno - 1) * $no_of_records_per_page;
// Determine page count.
$total_pages = $blog->total_pages($no_of_records_per_page);
// Stores User Id in $uid variable.
$uid = $_SESSION['uid'];
$res = $blog->show_posts($offset, $no_of_records_per_page);
$posts = array();

if ($res) {
  while ($row = mysqli_fetch_assoc($res)) {
    $posts[] = $row;
  }
}
else {
  $err = 'Nothing to display';
}
require_once "./View/blog.php";

?>
