<?php
    require_once '../vendor/autoload.php';
    use Dbc\Dbc;
    use User\User;
    $db=new Dbc();
    $user=new User();
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $signup=$user->signup_user($fullname,$username,$password);
        if($signup){
            $_SESSION['signup']=1;
        }
        else{
            $_SESSION['signup']=0;
        }
    }
?>

<!--
/**
* Send this to View, should not be in Controller
*/

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
   <h2>Sign Up</h2>
    <form enctype="multipart/form-data" method="post">
      <input type="text" id="login" class="fadeIn third" name="fullname" placeholder="Enter Full Name" required>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter Username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password" required>
      <input type="submit" name="submit" class="fadeIn fourth" value="Sign Up">
    </form>
        <?php if(isset($_SESSION['signup'])&&($_SESSION['signup']==1)) {?>
             Signed Up Successfully.<a href="login.php"> Click to Login</a>
        <?php } elseif(isset($_SESSION['signup'])&&($_SESSION['signup']==0)){ ?>
                       User already exists.
        <?php }
                       //unset($_SESSION['signup']);
        ?>
    <div class="form-group">
        Already Registered? <a class="underlineHover" href="login.php"> Login </a>
    </div>
  </div>
</div>
</body>
</html>
-->