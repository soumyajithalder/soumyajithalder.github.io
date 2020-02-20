<?php
    use Blogs\Blogs;

    session_start();
    include_once ("./Blogs/Blogs.php");
    include_once ("logout.php");
    $blog=new Blogs();
    $pid=$_GET['pid'];
    
    if(count($_FILES) > 0) {
        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        }
    }
    
    $date=date('Y-m-d, h:i:s');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog Posts</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
   <div id="formContent">
   <h2>Edit Blog Post</h2>
    <form enctype="multipart/form-data" method="post">
        <input type="text" name="title" placeholder="Title"><br>
        <textarea name="post" id="post" cols="34" rows="10" placeholder="Content"></textarea><br>
        <input type="file" name="userImage">
        <input type="submit" name="update" value="Update">
    </form>
        <?php if(isset($_SESSION['edit'])&&($_SESSION['edit']==1)){?>
            Post Updated <a href="my_post.php">Show Blog</a>
        <?php } 
            unset($_SESSION['edit']);?>
            <div>
                <a href="blog.php"><input type="submit" class="fourth" value="Go To Homepage"></a>
            </div>
        </div>
    </div>
</body>
</html>