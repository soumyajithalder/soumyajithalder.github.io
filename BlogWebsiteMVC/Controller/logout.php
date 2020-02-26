<?php
    
    require_once './vendor/autoload.php';
    use User\User;

    $user = new User(); 
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
        header('Location: ?page=login');
    }

    if (isset($_GET['q'])){
        $user->logout();
        unset($_SESSION['login']);
        header('Location: index.php');
    }
?>