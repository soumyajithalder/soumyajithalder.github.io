<?php
    session_start();
    include_once ("includes/class.blog.php");
    include_once ("logout.php");
    $blog=new Blogs();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Home</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey">
  <div class="w3-content" style="max-width:1150px">
   <header class="w3-container w3-center w3-padding-32"> 
      <h1><b>Blogs</b><h2 class="w3-center"><a class="w3-button" href="my_post.php">My Posts</a></h2></h1>
    </header>
    <?php
        $uid=$_SESSION['uid'];
        $res=$blog->show_posts($uid);
        $posts="";
        if($res){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $content=$row['post'];
                $author=$row['author'];
                $tmp=$row['date_posted'];
                $date=date('M jS, Y h:i A',strtotime($tmp));
                $imgData=$row['imageData'];
                
//                $admin="<div><a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='delete_post.php?pid=$id'>Delete</a></div>";
                
                
                $var='<img src="data:image/png;base64,'.base64_encode($imgData).'" style="height:420px;width:100%" />';
                
                $posts .="
<div class='w3-row'>
    <div class='w3-col s12'>
        <div class='w3-card-4 w3-margin w3-white'>
            $var
            <div class='w3-container'>
                <h1>$title</h1>
                <h5>$author, <span class='w3-opacity'>$date</span></h5>
            </div>
            
            <div class='w3-container'>
                <p>$content</p>
            </div>
                $admin
        </div><hr>
    </div></div>";  
            }
            echo $posts;
        }
        else{
            echo "<div class='w3-container'><div class='w3-row'>Nothing to display</div></div><hr>";
        }
    ?>
    <div class="w3-container">
       <div class="w3-row">
            <a href="add_post.php"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="Add Blog Post"></a>
            <a href="blog.php?q=logout"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="Logout"></a>
        </div>
    </div>
    <hr>
    </div>
</body>
</html>