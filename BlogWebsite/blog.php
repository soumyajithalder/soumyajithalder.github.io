<?php
    use User\User;
    use Blogs\Blogs;

    include_once ("./User/User.php");
    include_once ("./Blogs/Blogs.php");

    session_start();
    $user=new User();
    $session=$user->get_session();
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
      <div class="w3-bar w3-top w3-xlarge w3-black w3-mobile">
          <a href="my_post.php" class="w3-bar-item w3-button w3-left w3-padding-16 w3-mobile w3-padding-large">MY BLOGS</a>
          <?php if($session){?>
            <a href="my_post.php?q=logout" class="w3-bar-item w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGOUT</a>
        <?php } else{ ?>
            <a href="login.php" class="w3-bar-item w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGIN</a>
        <?php } ?>
      </div>
      <div class="w3-content" style="margin-top:4em;max-width:1150px">
      <header class="w3-container w3-center w3-padding-24"> 
      <h1><b>BLOG HOME</b></h1>
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
                
                
                $var='<img src="data:image/png;base64,'.base64_encode($imgData).'" style="padding-top:4em;width:100%" />';
                  
                
$posts.="
<div class='w3-row-padding'>
    <div class='w3-col s12'>
        <div class='w3-card-4 w3-white'>
            <div class='w3-container'>
                <div class='w3-col m4 l3'>
                    <div class='w3-container w3-padding-16'>
                        $var
                    </div>    
                </div>
                <div class='w3-col m8 l9'>
                    <div class='w3-container'>
                        <h1>$title</h1>
                        <h5>$author, <span class='w3-opacity'>$date</span></h5>
                    </div>
                    <div class='w3-container'>
                        <p>$content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><hr>
";          
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
        </div>
    </div>
    <hr>
    </div>
    
    
    
</body>
</html>