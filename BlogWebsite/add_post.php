<?php
    use Blogs\Blogs;
        
    session_start();
    include_once ("./Blogs/Blogs.php");
    include_once ("logout.php");
    $blog=new Blogs();
    //$date=date('l jS \of F Y h:i:s A');
    if(count($_FILES) > 0) {
        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        }
    }

    $date=date('Y-m-d, H:i:s');
    $authorId=$_SESSION['uid'];
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $add_post=$blog->add_posts($title,$post,$authorId,$date,$imgData);
        if($add_post){
           $_SESSION['add']=1;
        }
        else
        {
            $_SESSION['add']=0;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Blog Posts</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
   <div id="formContent">
       <h2>Add Blog Post</h2>
    <form enctype="multipart/form-data" method="post">
        <input type="text" name="title" placeholder="Title"><br>
        <textarea name="post" id="post" cols="34" rows="10" placeholder="Content"></textarea><br>
        <input type="file" name="userImage">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php if(isset($_SESSION['add'])&&($_SESSION['add']==1)) {?>
        Post Added. <a href="my_post.php">Show Blog</a>
    <?php } unset($_SESSION['add']);
       ?>
            <div>
                <a href="blog.php"><input type="submit" class="fourth" value="Go To Homepage"></a>
            </div>
        </div>
    </div>
</body>
</html>