<?php
    include("dbconn.php");
    if(isset($_POST) && !empty($_POST)){
        $username=$_POST['username'];
        $password=$_POST['password'];
    
    $sql="INSERT INTO login (username,password) VALUES ('".$username."','".$password."')";
   /* echo $password;
    echo $sql;
exit;*/
    session_start();

    if($conn->query($sql)) {
            
            $_SESSION['signup']=1;
        } 
        else {
                $_SESSION['signup']=0;  
        }    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <!--<form action="" enctype="multipart/form-data" method="post">
      <input type="text" name="username" placeholder="Enter Username">
      <input type="password" name="password" placeholder="Enter Password">
      <input type="submit" value="Sign Up" name="signup">
      <?php if(isset($_SESSION['signup'])&&($_SESSION['signup']==1)) {?>
     Signed Up Successfully.<a href="login.php"> Click to Login</a>
                       <?php } elseif(isset($_SESSION['signup'])&&($_SESSION['signup']==0)){ ?>
                       You Have not Signed Up Successfully.
                       <?php }
                       //unset($_SESSION['signup']);
                        ?>
    <br><br>Already Registered? <a href="login.php"> Login </a>
     <input type="submit" value="Logout" name="logout">
  </form>  -->
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <form enctype="multipart/form-data" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password">
      <input type="submit" name="signup" class="fadeIn fourth" value="Sign Up">
    </form>
        <?php if(isset($_SESSION['signup'])&&($_SESSION['signup']==1)) {?>
         Signed Up Successfully.<a href="login.php"> Click to Login</a>
                       <?php } elseif(isset($_SESSION['signup'])&&($_SESSION['signup']==0)){ ?>
                       You Have not Signed Up Successfully.
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

