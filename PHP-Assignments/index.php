<?php
include("logincheck.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
  <form action="" method="post">
  <?php    
      for($page=1;$page<=6;$page++){
    echo '<a href="php-assignment-' . $page . '.php">' . $page . '</a> ';
}
echo '<input type="submit" name="logout" value="Logout">';
if(isset($_POST['logout'])){
        session_destroy();
    session_unset();
        header('Location: login.php');
    }
?>
  </form>  
</body>
</html>