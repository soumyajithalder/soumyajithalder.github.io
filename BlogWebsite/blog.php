<?php
    include 'logout.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <h1>Hello World</h1>
    <div>
       <div>
            <a href="add_post.php"><input type="submit" class="fourth" value="Add Blog"></a>
            <a href="blog.php?q=logout"><input type="submit" class="fourth" value="LogOut"></a>
        </div>
    </div>
</body>
</html>