<!DOCTYPE html>

<?php
    $message="";
    $fullname="";
    if(isset($_GET['submitbtn'])){
        $firstname=$_GET['first'];
        $lastname=$_GET['last'];
        $GLOBALS ['message']="Hello " .$firstname. " " .$lastname;
        $GLOBALS ['fullname']=$firstname. " ".$lastname;
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
  		<input type="submit" value="Submit" name="submitbtn"></form>
  		
  		<?php echo $message;?>
</body>
</html>