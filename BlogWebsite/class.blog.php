<?php
    require_once 'db_config2.php';

    /*class Blogs{
        
        public $id,$title,$posts,$author,$date_posted,$image;
        
        function __construct($ID=null,$TITLE=null,$POSTS=null,$AUTHORID=null,$DATE=null){
            if(!empty($ID))
                $this->id=$ID;
            if(!empty($TITLE))
                $this->title=$TITLE;
            if(!empty($POSTS))
                $this->post=$POSTS;
            if(!empty($AUTHORID)){
                $sql = mysqli_query("SELECT fullname FROM users WHERE uid = ".$AUTHORID);
                $row = mysqli_fetch_array($sql);
                $this->author = $row["fullname"];   
            }
            if(!empty($DATE))
                $this->date_posted=$DATE;
        }
        
        
    }*/

    class Blogs{
        
        public $title,$post,$author,$db2;
        
        function __construct($title,$post,$author){
            
            $this->db2=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $this->title=$title;
            $this->author=$author;
            $this->post=$post;
        }
        
        public function add_posts($title,$post,$author){
            $sql="INSERT INTO blog_posts (title,post,author) VALUES ('".$title."','".$post."','".$author."')";
            $result=mysqli_query($this->db2,$sql);
            return $result;
        }
        
        public function show_posts(){
            $sql2="SELECT * FROM blog_posts";
            $result=mysqli_query($this->db2,$sql2);
            $data=mysqli_fetch_array($result);
        }
    }
?>