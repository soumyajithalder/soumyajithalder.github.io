<?php
include "connect.php";
if (isset($_POST) && !empty($_POST)) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    
	$sql= "SELECT * FROM login WHERE username = '".$username."' and password = '".$password."'";

	$result = $conn->query($sql);
    
    session_start();
    
    if ($result->num_rows > 0) 
    {
        $user=$result->fetch_assoc();
        $_SESSION['user']=$user;
        header("Location: dashboard.php");
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
</head>
<body>
  <form enctype="multipart/form-data" method="post">
      <input type="text" name="username" placeholder="Hint: admin">
      <input type="password" name="password" placeholder="Hint: admin">
      <input type="submit" value="Login" name="login">
      <?php 
    if(isset($_SESSION['user'])){ ?>
     <strong>Sorry !</strong> Email/Password is wrong.
    <?php }?>
      <br><br>Not Registered? <a href="signup.php"> Sign Up </a>
      
     <!--<input type="submit" value="Logout" name="logout">-->
  </form>  
</body>
</html>