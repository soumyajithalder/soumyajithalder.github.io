<?php
    require 'vendor/autoload.php';
    use User\User;
    use Blogs\Blogs;

    session_start();
    $user=new User();
    $session=$user->get_session();
    //$profile_name=$user->get_fullname($uid);
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
<body class="w3-light-grey w3-animate-bottom"> 
      <div class="w3-bar w3-top w3-xlarge w3-black w3-mobile">
          <a href="my_post.php" class="w3-bar-item w3-animate-left w3-button w3-left w3-padding-16 w3-mobile w3-padding-large">MY BLOGS</a>
          <?php if($session){?>
            <a href="my_post.php?q=logout" class="w3-bar-item w3-animate-right w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGOUT</a>
        <?php } else{ ?>
            <a href="login.php" class="w3-bar-item w3-animate-right w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGIN</a>
        <?php } ?>
      </div>
      <div class="w3-content" style="margin-top:4em;max-width:1150px">
      <header class="w3-container w3-center w3-padding-24"> 
      <h1><b>BLOG HOME</b></h1>
    </header>
    <?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
          
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page;
        
        $total_pages=$blog->total_pages($no_of_records_per_page);
          
        $uid=$_SESSION['uid'];
        $res=$blog->show_posts($offset,$no_of_records_per_page);
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
                
//                $admin="<div><a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='delete_post.php?pid=$id'>Delete</a></div>";
                
                
                $var='<img src="data:image/png;base64,'.base64_encode($imgData).'" style="padding-top:0.5em;width:100%" />';
                  
                
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
                    <div class='w3-container w3-col m8 s12'>
                        <p><a href='read_post.php?pid=$id' class='w3-button w3-padding-large w3-light-grey w3-border'><b>READ MORE »</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><hr>
";}
            echo $posts;
        }
        else{
            echo "<div class='w3-container'><div class='w3-row'>Nothing to display</div></div><hr>";
        }
    ?>
    <div class="w3-container">
       <div class="w3-row">
            <b><a href="add_post.php"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="ADD BLOG POST"></a></b>
        </div>
    </div>
    <hr>
    </div>
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <a href="?pageno=<?php if($pageno <= 1){echo '1';} else { echo $pageno-1;} ?>" class="w3-button w3-black w3-padding-large w3-margin-bottom <?php if($pageno<=1){echo 'w3-disabled';} ?>">Previous</a>
  <a href="?pageno=<?php if($pageno <=1) {echo $pageno+1;} else {echo $total_pages;} ?>" class="w3-button w3-black w3-padding-large w3-margin-bottom <?php if($pageno >= $total_pages){ echo 'w3-disabled';} ?>">Next »</a>
</footer>
</body>
</html>