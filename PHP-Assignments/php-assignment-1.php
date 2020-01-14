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
</head>
<body>
	<form action="" method="get">
         <label for="first">First name:</label><br>
  		<input type="text" name="first" required><br>
  		<label for="last">Last name:</label><br>
  		<input type="text" name="last" required><br><br>
  		<label for="full">Full name:</label><br>
  		<input type="text" name="full" value="<?php echo $fullname?>" disabled><br><br>
  		<input type="submit" value="Submit" name="submitbtn"></form><br>
  		
  		<?php echo $message;
        echo $errmessage;
        ?>
  		
  		
</body>
</html>