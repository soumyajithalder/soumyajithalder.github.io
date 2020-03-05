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
          <a href="/" class="w3-bar-item w3-animate-left w3-button w3-left w3-padding-16 w3-mobile w3-padding-large">BLOG HOME</a>
          <a href="/index/my_post?q=logout" class="w3-bar-item w3-animate-right w3-button w3-right w3-padding-16 w3-mobile w3-padding-large">LOGOUT</a>
      </div>
      <div class="w3-content" style="margin-top:4em;max-width:1150px">
      <header class="w3-container w3-center w3-padding-24">
      <h1><b>MY BLOG POSTS</b></h1>
    </header>
    <?php foreach ($posts as $post) :?>
    <div class='w3-row-padding'>
        <div class='w3-col s12'>
            <div class='w3-card-4 w3-white'>
                <div class='w3-container'>
                    <div class='w3-col m4 l3'>
                        <div class='w3-container w3-padding-16'><img src="data:image/png;base64,<?php echo base64_encode($post['imageData'])?>" style="padding-top:1em;width:100%" />
                        </div>
                    </div>
                    <div class='w3-col m8 l9'>
                        <div class='w3-container'>
                            <h1><?php echo $post['title'] ?></h1>
                            <h5><?php echo $post['author'].", " ?> <span class='w3-opacity'>
                               <?php
                                // Stores date posted in $tmp variable.
                                $tmp = $post['date_posted'];
                                // Stores date in a format to display.
                                $date = date('M jS, Y h:i A', strtotime($tmp));
                                echo $date;
                                ?></span>
                            </h5>
                        </div>
                        <div class='w3-container'>
                            <p>
                               <?php
                                // Stores blog post in $content variable.
                                $content = $post['post'];
                                // Stores post content after removing html tags.
                                $content = strip_tags($content);
                                if (strlen($content) > 200) {
                                  // Truncate string.
                                  $stringCut = substr($content, 0, 200);
                                  $endPoint = strrpos($stringCut, ' ');
                                  // If the string doesn't contain any space.
                                  // Then it will cut without word basis.
                                  $content = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                  $content .= "<b>... </b>";
                                }
                                echo $content;
                                ?>
                            </p>
                        </div>
                        <div class='w3-container'>
                            <div class='w3-row'><p>
                                <a href="/index/read?pid=<?php echo $post['id'] ?>" class='w3-button w3-light-grey w3-padding-large w3-white w3-border'><b>READ MORE »</b></a>
                                <a href="/index/edit?pid=<?php echo $post['id'] ?>" class='w3-button w3-padding-large w3-white w3-border w3-light-grey'><b>EDIT</b></a>
                                <a class='w3-button w3-padding-large w3-white w3-border w3-light-grey' href="/index/delete?pid=<?php echo $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><b>DELETE</b></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><hr>
    <?php endforeach ?>
    <?php if (!$res) { ?>
        <div class='w3-container'><div class='w3-row'><?php echo $err ?></div></div><hr>
    <?php }?>
    <div class="w3-container">
       <div class="w3-row">
            <b><a href="/index/add"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="ADD BLOG POST"></a></b>
        </div>
    </div>
    <hr>
    </div>
</body>
</html>
