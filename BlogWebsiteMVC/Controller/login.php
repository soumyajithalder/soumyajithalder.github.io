   <?php
    require_once './vendor/autoload.php';
    use Dbc\Dbc;
    require_once './vendor/autoload.php';
    use User\User;
    
    $db=new Dbc();

    session_start();
    $user=new User();
    
    
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $login=$user->login_check($username,$password);
        if($login){
            header('Location: /index/my_post');
        }
        else{
            $_SESSION['login']="0";
            $err='Not Signed Up Successfully. Username or Password might be wrong! Please Sign Up';
        }
    }
    require_once ("./View/login_register.php");
?>

