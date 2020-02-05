<?php
    include "dbconn.php";
    
    if(isset($_POST) && !empty($_POST)){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="UPDATE login SET password='".$password."' WHERE username='".$username."'";
        
        session_start();
        
        if($conn->query($sql)){
            $_SESSION['reset']=1;
        }
        else{
            $_SESSION['reset']=0;
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <form enctype="multipart/form-data" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter new password" required>
      <input type="submit" name="reset" class="fadeIn fourth" value="Reset">
    </form>
        <?php if(isset($_SESSION['reset']) && ($_SESSION['reset']==1)) {?>
        Password Reset Successfully. <a href="login.php">Click to Login</a>
        <?php }
      elseif(isset($_SESSION['reset'])&&($_SESSION['reset']==0)){?>
      Username Wrong.
      <?php }
      ?>
      <br>
    <div class="form-group">
        Not Registered? <a class="underlineHover" href="signup.php">Sign Up</a>
    </div>
    <div class="form-group">
        Already Registered? <a class="underlineHover" href="login.php"> Login </a>
    </div>
  </div>
</div>
</body>
</html>