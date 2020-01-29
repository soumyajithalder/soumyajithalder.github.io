<?php
 include"dbconn.php";

    if(isset($_POST) && !empty($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];
        
    $sql= "SELECT * FROM login WHERE username = '".$username."' and password = '".$password."'";
        
    $result= $conn->query($sql);
    
    session_start();
        
    if($result->num_rows>0){
        $user=$result->fetch_assoc();
        $_SESSION['user']=$user;
        header('Location: php-assignment-4.php');
    }
    else
    {
        $_SESSION['user']="0";
    }
}

?>
        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <form enctype="multipart/form-data" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Hint:admin" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Hint:admin" required>
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
    </form>
        <?php 
            if(isset($_SESSION['user'])){ ?>
             <strong>Sorry !</strong> Email/Password is wrong. SIGN UP or re-enter details.
            <?php }?>
    <div class="form-group">
        Not Registered? <a class="underlineHover" href="signup.php">Sign Up</a>
    </div>

  </div>
</div>
</body>
</html>