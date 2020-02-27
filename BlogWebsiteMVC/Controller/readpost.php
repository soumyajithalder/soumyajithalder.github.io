<?php
    require_once './vendor/autoload.php';
    use Blogs\Blogs;

    $blog=new Blogs();
    $pid=$_GET['pid'];

    $res=$blog->read_more($pid);
    $posts=array();
    if($res){
        while($row=mysqli_fetch_assoc($res)){
            $posts[]=$row;
        }
    }
require_once ("./View/read_post.php");
?>