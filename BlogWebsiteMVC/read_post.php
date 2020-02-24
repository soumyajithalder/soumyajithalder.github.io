<?php
    require_once 'vendor/autoload.php';
    use Blogs\Blogs;

    $blog=new Blogs();
    $pid=$_GET['pid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Full Post</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-grey">
   <div class="w3-bar w3-top w3-xlarge w3-black w3-mobile">
          <a href="my_post.php" class="w3-bar-item w3-animate-left w3-button w3-left w3-padding-16 w3-mobile w3-padding-large">MY BLOGS</a>
            <a href="my_post.php?q=logout" class="w3-bar-item w3-animate-right w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGOUT</a>
    </div>
    <div class="w3-content" style="margin-top:4em;max-width:1150px">
      <header class="w3-container w3-center w3-padding-24"> 
      <h1><b>FULL POST</b></h1>
    </header>
    <?php
        $res=$blog->read_more($pid);
        $posts="";
        if($res){
            while($row=mysqli_fetch_assoc($res)){
                $title=$row['title'];
                $content=$row['post'];
                $author=$row['author'];
                $tmp=$row['date_posted'];
                $date=date('M jS, Y h:i A',strtotime($tmp));
                $imgData=$row['imageData']; 
                
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
                    </div>$admin;
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
            <b><a href="my_post.php"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="MY BLOG POST"></a></b>
            <b><a href="blog.php"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="GO BACK HOME"></a></b>
        </div>
    </div>
    <hr>
    </div>
</body>