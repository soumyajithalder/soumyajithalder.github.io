<!DOCTYPE html>

<?php
    $message="";
    $fullname="";
    $errmessage="";
    if(isset($_POST['submitbtn'])){
        $firstname=$_POST['first'];
        $lastname=$_POST['last'];
        if(preg_match("/^[a-zA-Z]+$/", $_POST['first']) && preg_match("/^[a-zA-Z]+$/", $_POST['last']))
        {
            $GLOBALS ['fullname']=$firstname. " ".$lastname;
            $GLOBALS ['message']="Hello " .$firstname. " " .$lastname;
        }
        else{
            $GLOBALS ['errmessage'] = "Enter alphabets only";
        }   
    }
?>


<html>
<head>
	<title>PHP-ASSIGNMENT-2</title>
	<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $("#firstname,#lastname").change(function(){
  	    var field1=$("#firstname").val();
        var field2=$("#lastname").val();
        $("#fullname").val(field1+" "+field2);
            });
        });
    </script>
</head>
<body>
	<form action="php-assignment-2.php" enctype="multipart/form-data" method="post">
         <label for="first">First name:</label><br>
  		<input type="text" name="first" id="firstname" required><br>
  		<label for="last">Last name:</label><br>
  		<input type="text" name="last" id="lastname" required><br><br>
  		<label for="full">Full name:</label><br>
  		<input type="text" name="full" id="fullname" value="<?php echo $fullname?>" disabled><br><br>
  		<input type="file" name="file"><br><br>
  		<input type="submit" value="Submit" name="submitbtn"><br><br>
    </form>
    <?php
    if(isset($_POST['submitbtn']))
    { 
        $filepath = "images/" . $_FILES["file"]["name"];
        if(!empty($message)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
            {
                echo "<img src=".$filepath." height=300 width=300 />";
                echo "<br><br>";
                echo $message;
            } 
            else 
            {
                echo "Error !!";
            }
        }
        else{
            echo $errmessage;
        }
    }          
    ?>	
</body>
</html>