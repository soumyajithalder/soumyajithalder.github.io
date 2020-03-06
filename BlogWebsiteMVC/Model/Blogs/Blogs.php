<?php

namespace Blogs;

use Dbc\Dbc;

/**
 * Provides Blogs model to add, edit, show, read, and delete posts.
 */
class Blogs extends Dbc {

  /**
   * Function handles adding new post.
   *
   * @param string $title
   *   Title of the Post.
   * @param string $post
   *   Blog content.
   * @param int $authorId
   *   User ID.
   * @param DateTime $date
   *   Date of post.
   * @param base64 $imgData
   *   Takes image data in base64 format.
   *
   * @return result
   *   Returns mysqli_query result.
   */
  public function add_posts($title, $post, $authorId, $date, $imgData) {
    $sql = "INSERT INTO blog_posts (title,post,author,date_posted,imageData) VALUES ('".$title."','".$post."',(SELECT fullname from users WHERE uid='".$authorId."'),'".$date."','{$imgData}');";
    if ($title == "" || $post == "" || $imgData == "") {
      echo "Please complete your post";
      return;
    }
    $result = mysqli_query($this->db, $sql);
    return $result;
  }

  /**
   * Function handles showing all posts in homepage.
   *
   * @param int $offset
   *   Number of pots to show in a single page.
   * @param int $pages
   *   Pages required to show all post limiting posts to $offset.
   *
   * @return result
   *   Returns mysqli_query result.
   */
  public function show_posts($offset, $pages) {
    $sql2 = "SELECT * FROM blog_posts ORDER BY id DESC LIMIT $offset, $pages";
    $result = mysqli_query($this->db, $sql2);
    $row = $result->num_rows;
    if ($row == 0) {
      return FALSE;
    }
    else {
      return $result;
    }
  }

  /**
   * Function handles deleteng posts using selected $id.
   *
   * @param int $id
   *   Id of selected post to delete.
   */
  public function delete_posts($id) {
    $sql3 = "DELETE FROM blog_posts WHERE id='".$id."';";
    mysqli_query($this->db, $sql3);
  }

  /**
   * Function handles editing selected post.
   *
   * @param int $id
   *   Id of selected post to edit.
   * @param string $title
   *   Title of the Post.
   * @param string $post
   *   Blog content.
   * @param string $author
   *   Author fullname.
   * @param DateTime $date
   *   Date of post.
   * @param base64 $imgData
   *   Takes image data in base64 format.
   *
   * @return result
   *   Returns mysqli_query result.
   */
  public function edit_posts($id, $title, $post, $author, $date, $imgData){
    $sql4 = "UPDATE blog_posts SET title='".$title."', post='".$post."', author=(SELECT fullname from users WHERE uid='".$author."'), date_posted='".$date."', imageData='{$imgData}' WHERE id=$id;";
    if($title == "" || $post == "" || $imgData == "") {
      echo "Please complete your post";
      return;
    }
    $result = mysqli_query($this->db, $sql4);
    return $result;
  }

  /**
   * Function handles showing user posts only using user id $uid.
   *
   * @param int $uid
   *   Id of Users.
   *
   * @return result
   *   Returns mysqli_query results.
   */
  public function my_posts($uid) {
    $sql5 = "SELECT * FROM blog_posts WHERE author=(SELECT fullname from users WHERE uid=".$uid.");";
    $result = mysqli_query($this->db, $sql5);
    $row = $result->num_rows;
    if ($row == 0) {
      return FALSE;
    }
    else {
      return $result;
    }
  }

  /**
   * Function handles showing full post in a different page.
   *
   * @param int $id
   *   Id of selected post to read.
   *
   * @return result
   *   Returns mysqli_query results.
   */
  public function read_more($id) {
    $sql6 = "SELECT * from blog_posts WHERE id='".$id."';";
    $result = mysqli_query($this->db, $sql6);
    $row = $result->num_rows;
    if ($row == 0) {
      return FALSE;
    }
    else {
      return $result;
    }
  }

  /**
   * Function handles pagination of the blog page.
   *
   * @param int $pages
   *   Pages to show amount of post.
   */
  public function total_pages($pages) {
    $total_pages_sql = "SELECT COUNT(*) FROM blog_posts";
    $result = mysqli_query($this->db, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $pages);
    return $total_pages;
  }

}

?>
