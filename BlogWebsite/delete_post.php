<?php
    session_start();
    include_once ("includes/class.blog.php");
    $blog=new Blogs();
    if(!isset($_GET['pid'])){
        header("Location: blog.php");
    }else{
        $pid=$_GET['pid'];
        $blog->delete_posts($pid);
        header("Location: my_post.php");
    }
?>