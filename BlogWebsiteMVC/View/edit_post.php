<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog Posts</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
   <div id="formContent">
   <h2>Edit Blog Post</h2>
    <form enctype="multipart/form-data" method="post">
        <input type="text" name="title" placeholder="Title" style="text-align:left"><br>
        <textarea name="post" id="post" cols="34" rows="10" placeholder="Content"></textarea><br>
        <input type="file" name="userImage">
        <input type="submit" name="update" value="Update">
    </form>
        <?php if(isset($_SESSION['edit'])&&($_SESSION['edit']==1)){?>
                Post Updated <a href="index.php?page=my_post">Show Blog</a>
        <?php } 
            unset($_SESSION['edit']);?>
            <div>
                <a href="index.php"><input type="submit" class="fourth" value="Go To Homepage"></a>
            </div>
        </div>
    </div>
</body>
</html>