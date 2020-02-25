<?php
    require_once '../vendor/autoload.php';
    use Blogs\Blogs;

    session_start();
    include_once ("logout.php");
    $blog=new Blogs();
    $pid=$_GET['pid'];
    
    if(count($_FILES) > 0) {
        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        }
    }
    
    $date=date('Y-m-d, H:i:s');
    $authorId=$_SESSION['uid'];
    if(isset($_REQUEST['update'])){
        extract($_REQUEST);
        $edit_post=$blog->edit_posts($pid,$title,$post,$authorId,$date,$imgData);
        if($edit_post){
           $_SESSION['edit']=1;
        }
        else
        {
            $_SESSION['edit']=0;
        }
    }
?>