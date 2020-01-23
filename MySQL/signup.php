<?php 
    include("connect.php");
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
</head>
<body>
  <form action="" enctype="multipart/form-data" method="post">
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
     <!--<input type="submit" value="Logout" name="logout">-->
  </form>  
</body>
</html>