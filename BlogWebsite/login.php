   <?php
    session_start();
    include_once ("includes/class.user.php");
    $user=new User();

    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $login=$user->login_check($username,$password);
        if($login){
            header('Location: my_post.php');
        }
        else{
            $_SESSION['login']="0";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <form enctype="multipart/form-data" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter Username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password" required>
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>
    <?php 
        if(isset($_SESSION['login'])){ ?>
             <strong>Sorry !</strong> Email/Password is wrong. SIGN UP or re-enter details.
    <?php }?>
    <div class="form-group">
        Not Registered? <a class="underlineHover" href="signup.php">Sign Up</a>
    </div>

  </div>
</div>
</body>
</html>