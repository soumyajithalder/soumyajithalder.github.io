<?php
    session_start();
    include_once ("class.blog.php");
    include_once ("logout.php");
    $blog=new Blogs();
    $pid=$_GET['pid'];
    $date=date('Y-m-d, h:i:s');
    if(isset($_REQUEST['update'])){
        extract($_REQUEST);
        $edit_post=$blog->edit_posts($pid,$title,$post,$author,$date);
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
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
   <div id="formContent">
    <form enctype="multipart/form-data" method="post">
        <input type="text" name="title" placeholder="Title"><br>
        <input type="text" name="author" placeholder="Author"><br>
        <textarea name="post" id="post" cols="34" rows="10" placeholder="Content"></textarea><br>
        <input type="submit" name="update" value="Update">
    </form>
        <?php if(isset($_SESSION['edit'])&&($_SESSION['edit']==1)){?>
            Post Updated <a href="blog.php">Show Blog</a>
        <?php } 
            unset($_SESSION['edit']);?>
            <div>
                <a href="blog.php?q=logout"><input type="submit" class="fourth" value="LogOut"></a>
            </div>
        </div>
    </div>
</body>
</html>