<?php
    require_once './vendor/autoload.php';
    use User\User;
    use Blogs\Blogs;

    session_start();
    $user=new User();
    $session=$user->get_session();
    //$profile_name=$user->get_fullname($uid);
    $blog=new Blogs();

    if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
          
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page;
        
        $total_pages=$blog->total_pages($no_of_records_per_page);
          
        $uid=$_SESSION['uid'];
        $res=$blog->show_posts($offset,$no_of_records_per_page);
        $posts=array();
        if($res){
            while($row=mysqli_fetch_assoc($res)){
                $posts[]=$row;
            }
        }
        else{
            //echo "<div class='w3-container'><div class='w3-row'>Nothing to display</div></div><hr>";
            $err='Nothing to display';
        }
?>