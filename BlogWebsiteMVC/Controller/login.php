   <?php
    require_once '../vendor/autoload.php';
    use Dbc\Dbc;
    require_once '../vendor/autoload.php';
    use User\User;
    
    $db=new Dbc();

    session_start();
    $user=new User();

    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $login=$user->login_check($username,$password);
        if($login){
            header('Location: my_post.php');
        }
        else{
            echo "Not Signed Up Successfully";
        }
    }
?>

