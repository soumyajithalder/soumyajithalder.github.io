<?php
if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
  <form action="" method="post">
<?php echo '<input type="submit" name="logout" value="Logout">';
if(isset($_POST['logout'])){
        session_destroy();
    session_unset();
        header('Location: login.php');
    }
?>
  </form>  
</body>
</html>