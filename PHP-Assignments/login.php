<?php
 session_start();
$username="admin";
$password="admin";

if(isset($_POST['login']) && $_POST['username'] == $username && $_POST['password'] == $password){
    $_SESSION['username']=$username;
    
    header('Location: php-assignment-4.php');
}
else{
    $msg="Username or password not valid";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
</head>
<body>
  <form action="" enctype="multipart/form-data" method="post">
      <input type="text" name="username" placeholder="Hint: admin" required>
      <input type="password" name="password" placeholder="Hint: admin" required>
      <input type="submit" value="Login" name="login">
     <!--<input type="submit" value="Logout" name="logout">-->
      <?php
      if(isset($_POST['login'])){
          echo $msg;
      }
      ?>
  </form>  
</body>
</html>