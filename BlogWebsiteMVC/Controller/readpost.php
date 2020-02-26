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
    else{
        echo "<div class='w3-container'><div class='w3-row'>Nothing to display</div></div><hr>";
    }
?>