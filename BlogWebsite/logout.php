<?php
    session_start();
    include 'class.user.php';
    $user = new User(); 
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
        header('Location: login.php');
    }

    if (isset($_GET['q'])){
        $user->logout();
        header('Location:login.php');
    }
?>