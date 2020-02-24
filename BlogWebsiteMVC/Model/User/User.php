<?php
    namespace User;
    use Dbc\Dbc;

    class User extends Dbc{
        
        public function signup_user($name,$username,$password){
            $username=$username;
            $password=$password;
            
            $sql="SELECT * FROM users WHERE uname='".$username."'";
            
            $check= $this->db->query($sql);
            $row=$check->num_rows;
            
            if($row == 0){
                $sql1="INSERT INTO users (uname,password,fullname) VALUES ('".$username."','".$password."','".$name."')";
                $result=mysqli_query($this->db,$sql1);
                //echo "Signed Up Successfully";
                return $result;
            }
            else{
                return false;
            }
        }
        
        public function login_check($username,$password){
            $username=$username;
            $password=$password;
            $sql2="SELECT uid from users WHERE uname='".$username."' and password='".$password."'";
//            echo $sql2;
//            exit;
            $result=mysqli_query($this->db,$sql2);
            $data=mysqli_fetch_array($result);
            $row=$result->num_rows;
            
            if($row==1){
                $_SESSION['login']=true;
                $_SESSION['uid']=$data['uid'];
                return true;
            }
            else
            {
                return false;
            }
        }
        
        public function get_session(){
            return $_SESSION['login'];
        }
        
        public function logout(){
            $_SESSION['login']=false;
            session_destroy();
        }
        
//        public function get_fullname($uid){
//        $sqlname="SELECT fullname FROM users WHERE uid=$uid";
//	       $result=mysqli_query($this->db,$sqlname);
//	       $data=mysqli_fetch_array($result);
//	       echo $data['fullname']."'s BLOGS";
//        }
    }
?>