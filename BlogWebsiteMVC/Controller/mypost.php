<?php
    require './vendor/autoload.php';

    use Blogs\Blogs;

    session_start();
    require_once ("logout.php");
    $blog=new Blogs();
    $uid=$_SESSION['uid'];
    //echo $id;
        $res=$blog->my_posts($uid);
        $posts=array();
        if($res){
            while($row=mysqli_fetch_assoc($res)){
                $posts[]=$row;
            }
        }
        else{
            $err='Nothing to display';
            echo "<div class='w3-container'><div class='w3-row'>Nothing to display</div></div><hr>";
        }
    require_once ("./View/my_post.php");
?>