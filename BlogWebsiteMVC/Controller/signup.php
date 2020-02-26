<?php
    require_once './vendor/autoload.php';
    use Dbc\Dbc;
    require_once './vendor/autoload.php';
    use User\User;
    $db=new Dbc();
    $user=new User();
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $signup=$user->signup_user($fullname,$username,$password);
        if($signup){
            $_SESSION['signup']=1;
        }
        else{
            $_SESSION['signup']=0;
        }
    }
?>
