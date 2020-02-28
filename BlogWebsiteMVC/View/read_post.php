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
<body class="w3-light-grey w3-animate-bottom">
   <div class="w3-bar w3-top w3-xlarge w3-black w3-mobile">
            <a href="/index/my_post" class="w3-bar-item w3-animate-left w3-button w3-left w3-padding-16 w3-mobile w3-padding-large">MY BLOGS</a>
    </div>
    <div class="w3-content" style="margin-top:4em;max-width:1150px">
      <header class="w3-container w3-center w3-padding-24"> 
      <h1><b>FULL POST</b></h1>
    </header>
    <?php foreach($posts as $post):?>
    <div class='w3-row-padding'>
        <div class='w3-col s12'>
            <div class='w3-card-4 w3-white'>
                <div class='w3-container'>
                    <div class='w3-col m4 l3'>
                        <div class='w3-container w3-padding-16'><img src="data:image/png;base64,<?php echo base64_encode($post['imageData'])?>" style="padding-top:4em;width:100%" />
                        </div>    
                    </div>
                    <div class='w3-col m8 l9'>
                        <div class='w3-container'>
                            <h1><?php echo $post['title'] ?></h1>
                            <h5><?php echo $post['author'].", " ?> <span class='w3-opacity'>
                               <?php 
                                    $tmp=$post['date_posted'];
                                    $date=date('M jS, Y h:i A',strtotime($tmp));
                                    echo $date;
                                ?></span>
                            </h5>
                        </div>
                        <div class='w3-container'>
                            <p><?php echo $post['post']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><hr>
    <?php endforeach ?>
    <div class="w3-container">
       <div class="w3-row">
            <b><a href="/"><input class="w3-button w3-padding-large w3-white w3-border" type="submit" class="fourth" value="GO BACK HOME"></a></b>
        </div>
    </div>
    <hr>
    </div>
</body>
</html>