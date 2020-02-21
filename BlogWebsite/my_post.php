<?php
    use Blogs\Blogs;

    session_start();
    include_once ("./Blogs/Blogs.php");
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
    <script src="https://www.w3schools.com/lib/w3.js"></script>
</head>
<body class="w3-light-grey w3-animate-bottom">
  <div class="w3-bar w3-top w3-xlarge w3-black w3-mobile">
          <a href="blog.php" class="w3-bar-item w3-animate-left w3-button w3-left w3-padding-16 w3-mobile w3-padding-large">BLOG HOME</a>
          <a href="my_post.php?q=logout" class="w3-bar-item w3-animate-right w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGOUT</a>
      </div>
      <div class="w3-content" style="margin-top:4em;max-width:1150px">
      <header class="w3-container w3-center w3-padding-24"> 
      <h1><b>MY BLOG POSTS</b></h1>
    </header>
    <?php
        $res=$blog->my_posts($uid);
        $posts="";
        if($res){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $content=$row['post'];
                
                $content = strip_tags($content);
                    if (strlen($content) > 200) {

                    // truncate string
                    $stringCut = substr($content, 0, 200);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $content = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $content .= "<b>... </b>";
                }
                
                $author=$row['author'];
                $tmp=$row['date_posted'];
                $date=date('M jS, Y h:i A',strtotime($tmp));
                $imgData=$row['imageData'];
                
//              $admin="<div><a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='delete_post.php?pid=$id'>Delete</a>                       </div>";
                
                //$posts .="<div><h1>$title</h1><p>$content</p><h6>$author</h6><h6>Date Posted:$date</h6>$var$admin<hr/></div>"; 
                
                
                $admin="
                <div class='w3-container'>
                <hr>
                    <div class='w3-row'>
                        <a href='read_post.php?pid=$id' class='w3-button w3-padding-large w3-white w3-border'><b>READ MORE »</b></a>
                        <a class='w3-button w3-padding-large w3-white w3-border' href='edit_post.php?pid=$id'><b>EDIT</b></a>
                        <a class='w3-button w3-padding-large w3-white w3-border' href='delete_post.php?pid=$id' onclick='return checkDelete()'><b>DELETE</b></a>
                    </div>
                </div>
                ";
                
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
            <b><a href="add_post.php"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="ADD BLOG POST"></a></b>
        </div>
    </div>
    <hr>
    </div>
</body>
</html>