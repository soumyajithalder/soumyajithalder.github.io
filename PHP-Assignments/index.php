<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php Assignment List</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
    <?php
    for($page=1;$page<=10;$page++){
        echo '<a href="php-assignment-' . $page . '.php">' . $page . '</a> ';
    }
    ?>
    <input type="submit" name="logout" value="Logout">
    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
    }
    ?>
    </form>
</body>
</html>