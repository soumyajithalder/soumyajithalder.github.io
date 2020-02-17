<?php
    include_once 'class.blog.php';
    include_once 'logout.php';
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $blog=new Blogs($title,$post,$author);
        $add_post=$blog->add_posts($title,$post,$author);
        if($add_post){
           echo "Success";
        }
        else
        {
            echo "fail";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Blog Posts</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <form enctype="multipart/form-data" method="post">
        <input type="text" name="title" placeholder="Enter Title of Post"><br>
        <input type="text" name="author" placeholder="Enter Author Name"><br>
        <textarea name="post" id="post" cols="112" rows="10">Enter text here...</textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php if(isset($_SESSION['add'])&&($_SESSION['add']==1)) {?>
        Post Added. <a href="blog.php">Show Blog Post</a>
    <?php } ?>
    <div>
        <a href="blog.php?q=logout"><input type="submit" class="fourth" value="LogOut"></a>
    </div>
</body>
</html>