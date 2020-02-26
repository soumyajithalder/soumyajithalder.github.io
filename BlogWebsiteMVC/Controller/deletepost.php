<?php
    require_once './vendor/autoload.php';
    use Blogs\Blogs;

    session_start();
    $blog=new Blogs();
    if(!isset($_GET['pid'])){
        header("Location: index.php");
    }else{
        $pid=$_GET['pid'];
        $blog->delete_posts($pid);
        header("Location: index.php?page=my_post");
    }
?>