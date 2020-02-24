<?php
    namespace Blogs;
    use Dbc\Dbc;

    class Blogs extends Dbc {
        
        public function add_posts($title,$post,$authorId,$date,$imgData){
            //date('l jS \of F Y h:i:s A');
            $sql="INSERT INTO blog_posts (title,post,author,date_posted,imageData) VALUES ('".$title."','".$post."',(SELECT fullname from users WHERE uid='".$authorId."'),'".$date."','{$imgData}');";
            if($title==""||$post==""){
                echo "Please complete your post";
                return;
            }
            $result=mysqli_query($this->db,$sql);
            return $result;
        }
        
        public function show_posts($offset,$pages){
            $sql2="SELECT * FROM blog_posts ORDER BY id DESC LIMIT $offset, $pages";
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
        
        public function edit_posts($id,$title,$post,$author,$date,$imgData){
            $sql4="UPDATE blog_posts SET title='".$title."', post='".$post."', author=(SELECT fullname from users WHERE uid='".$author."'), date_posted='".$date."', imageData='{$imgData}' WHERE id=$id;";   
            if($title==""||$post==""){
                echo "Please complete your post";
                return;
            }
            $result=mysqli_query($this->db,$sql4);
            return $result;
        }
        
        
        public function my_posts($uid){
            $sql5="SELECT * FROM blog_posts WHERE author=(SELECT fullname from users WHERE uid=".$uid.");";
            //echo $sql5;exit;
            $result=mysqli_query($this->db,$sql5);
            $row=$result->num_rows;
            if($row==0){
                return false;
            }
            else{
                return $result;
            }
        }
        
        public function read_more($id){
            $sql6="SELECT * from blog_posts WHERE id='".$id."';";
            $result=mysqli_query($this->db,$sql6);
            return $result;
        }
        
        public function total_pages($pages){
            $total_pages_sql = "SELECT COUNT(*) FROM blog_posts";
            $result = mysqli_query($this->db,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $pages);
            return $total_pages;
        }
    }
?>