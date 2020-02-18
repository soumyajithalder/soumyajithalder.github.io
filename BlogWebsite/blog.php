<?php
    session_start();
    include_once ("class.blog.php");
    include_once ("logout.php");
    $blog=new Blogs();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
</head>
<body>
    <?php
        $res=$blog->show_posts();
        $posts="";
        if($res){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $content=$row['post'];
                $author=$row['author'];
                $date=$row['date_posted'];
                
                $admin="<div><a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='delete_post.php?pid=$id'>Delete</a></div>";
                
                $posts .="<div><h1>$title</h1><p>$content</p><h6>$author</h6><h6>Date Posted:$date</h6>$admin<hr/></div>"; 
            }
            echo $posts;
        }
        else{
            echo "Nothing to display";
        }
    ?>
    <div>
       <div>
            <a href="add_post.php"><input type="submit" class="fourth" value="Add Blog Post"></a>
            <a href="blog.php?q=logout"><input type="submit" class="fourth" value="Logout"></a>
        </div>
    </div>
</body>
</html>