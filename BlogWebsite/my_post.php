<?php
    session_start();
    include_once ("includes/class.blog.php");
    include_once ("logout.php");
    $blog=new Blogs();
    $uid=$_SESSION['uid'];
    //echo $id;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Posts</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey">
  <div class="w3-content" style="max-width:1150px">
   <header class="w3-container w3-center w3-padding-32"> 
      <h1><b>MY BLOG POSTS</b><h2 class="w3-center"><a class="w3-button" href="blog.php">Home</a></h2></h1>
    </header>
    <?php
        $res=$blog->my_posts($uid);
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
                
//              $admin="<div><a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='delete_post.php?pid=$id'>Delete</a>                       </div>";
                
                //$posts .="<div><h1>$title</h1><p>$content</p><h6>$author</h6><h6>Date Posted:$date</h6>$var$admin<hr/></div>"; 
                
                
                $admin="
                <div class='w3-container'>
                    <div class='w3-row'>
                        <a class='w3-button w3-padding-large w3-white w3-border' href='edit_post.php?pid=$id'>Edit</a>
                        <a class='w3-button w3-padding-large w3-white w3-border' href='delete_post.php?pid=$id'>Delete</a>
                    </div>
                </div>
                <hr>
                ";
                
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
    <!--<div class="w3-col s12">
        <div class="w3-card-4 w3-margin w3-white">
            <img src="/w3images/woods.jpg" alt="Nature" style="width:100%">
            <div class="w3-container">
                <h3><b>TITLE HEADING</b></h3>
                <h5>Title description, <span class="w3-opacity">April 7, 2014</span></h5>
            </div>

            <div class="w3-container">
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
                tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
                    </div>
                    <div class="w3-col m4 w3-hide-small">
                        <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr>
    -->
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