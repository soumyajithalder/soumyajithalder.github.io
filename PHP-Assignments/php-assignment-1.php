<!DOCTYPE html>

<?php
    $message="";
    $fullname="";
    $errmessage="";
    if(isset($_GET['submitbtn'])){
        $firstname=$_GET['first'];
        $lastname=$_GET['last'];
        if(preg_match("/^[a-zA-Z]+$/", $_GET['first']) && preg_match("/^[a-zA-Z]+$/", $_GET['last']))
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
	<title>PHP-ASSIGNMENT-1</title>
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
	<form action="php-assignment-1.php" method="get">
         <label for="first">First name:</label><br>
  		<input type="text" name="first" id="firstname" required><br>
  		<label for="last">Last name:</label><br>
  		<input type="text" name="last" id="lastname" required><br><br>
  		<label for="full">Full name:</label><br>
  		<input type="text" name="full" id="fullname" value="<?php echo $fullname?>" disabled><br><br>
  		<input type="submit" value="Submit" name="submitbtn"></form><br>
  		
  		<?php echo $message;
        echo $errmessage;
        ?>
  		
  		
</body>
</html>