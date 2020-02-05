<?php
    include "dbconn.php";
    
    if(isset($_POST) && !empty($_POST)){
        $username=$_POST['username'];
        $message=$_POST['message'];
        
        $sql="SELECT username from login WHERE username='".$username."' and message='".$message."'";
        
        $result = $conn->query($sql);
        session_start();
        
        if($result->num_rows>0){
            $user=$result->fetch_assoc();
            $_SESSION['user']=$user["username"];
            
            //print_r($_SESSION['user']); exit;
            header('Location: passwordreset.php');
        }
        else{
            $_SESSION['user']="0";
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Question</title>
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
      <input type="text" id="message" class="fadeIn third" name="message" placeholder="Enter secret message" required>
      <input type="submit" name="submit" class="fadeIn fourth" value="Submit">
    </form>
        <?php
            if(isset($_SESSION['user'])){?>
            <strong>Enter correct username or message</strong>    
        <?php }?>
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