<?php
    class Blogs{
        
        public $db;
        
        function __construct(){
            require_once ("db_config.php");
            $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        }
        
        //date('l jS \of F Y h:i:s A');
        
        public function add_posts($title,$post,$authorId,$date){
            $sql="INSERT INTO blog_posts (title,post,author,date_posted) VALUES ('".$title."','".$post."',(SELECT fullname from users WHERE uid='".$authorId."'),'".$date."');";
            if($title==""||$post==""){
                echo "Please complete your post";
                return;
            }
            $result=mysqli_query($this->db,$sql);
            return $result;
        }
        
        public function show_posts(){
            $sql2="SELECT * FROM blog_posts ORDER BY id DESC";
            $result=mysqli_query($this->db,$sql2);
            $row=$result->num_rows;
            if($row==0){
                return false;
            }
            else{
                return $result;
            }
        }
        
        public function delete_posts($id){
            $sql3="DELETE FROM blog_posts WHERE id='".$id."';";
            mysqli_query($this->db,$sql3);
        }
        
        public function edit_posts($id,$title,$post,$author,$date){
            $sql4="UPDATE blog_posts SET title='".$title."', post='".$post."', author='".$author."', date_posted='".$date."' WHERE id=$id;";   
            if($title==""||$post==""||$author==""){
                echo "Please complete your post";
                return;
            }
            $result=mysqli_query($this->db,$sql4);
            return $result;
        }
    }
?>