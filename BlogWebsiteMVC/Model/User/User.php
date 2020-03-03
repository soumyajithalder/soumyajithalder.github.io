<?php
    namespace User;
    use Dbc\Dbc;

    /**
     * Provides User model to signup and login users
     * 
     */

    class User extends Dbc{
        
      /**
       * Function handles signing up users
       *
       * @param VARCHAR $name, VARCHAR $username, VARCHAR $password
       *
       *
       */
        
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
        
      /**
       * Function handles logging in users and checks wrong username
       *
       * @param VARCHAR $username, VARCHAR $password
       *
       *
       */
        
        public function login_check($username,$password){
            $username=$username;
            $password=$password;
            $sql2="SELECT uid from users WHERE uname='".$username."' and password='".$password."'";
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
    }
?>