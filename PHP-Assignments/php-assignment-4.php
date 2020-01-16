<!DOCTYPE html>

<?php
    $message="";
    $fullname="";
    $errmessage="";
    $text="";
    $phoneno="";
    if(isset($_POST['submitbtn'])){
        $firstname=$_POST['first'];
        
        $lastname=$_POST['last'];
        
        $text=$_POST['text'];
        
        $array_data=explode(PHP_EOL, $text);
        
        $final_data=array();
        
        $phoneno=$_POST['phoneno'];
        
        foreach ($array_data as $data){
            $format_data=explode('|',$data);
            $final_data[trim($format_data[0])]=trim($format_data[1]);
        }
        if(preg_match("/^[a-zA-Z]+$/", $_POST['first']) && preg_match("/^[a-zA-Z]+$/", $_POST['last']))
        {
            $GLOBALS ['fullname']=$firstname. " ".$lastname;
            $GLOBALS ['message']="Hello " .$firstname. " " .$lastname;
        }
        else{
            $GLOBALS ['errmessage'] = "Enter alphabets only";
        }   
    }
    
    function validate_phone($phoneno){
        $filtered_phone_number = filter_var($phoneno, FILTER_SANITIZE_NUMBER_INT);
        $phoneno_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phoneno_to_check) < 10 || strlen($phoneno_to_check) > 10) 
        {
            return false;
        } else {
            return true;
        }
    }
?>


<html>
<head>
	<title>PHP-ASSIGNMENT-4</title>
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
	<form action="php-assignment-4.php" enctype="multipart/form-data" method="post">
        <label for="first">First name:</label>
  		<input type="text" name="first" id="firstname" required>
  		<label for="last">Last name:</label>
  		<input type="text" name="last" id="lastname" required><br><br>
  		<label for="full">Full name:</label>
  		<input type="text" name="full" id="fullname" value="<?php echo $fullname?>" disabled>
        <label for="phone">Phone No: <span><b>+91</b></span></label>
  		<input type="text" name="phoneno"><?php
        if(isset($_POST['submitbtn'])){
            if (validate_phone($phoneno) == true) {
            $phoneno="+91".$phoneno;
            echo $phoneno;
            } else {
            echo "Invalid phone number";
            }
        }
        ?>
  		<br><br><input type="file" name="file"><br><br>
  		<textarea rows="10" cols="25" name="text"></textarea><br><br>
  		<input type="submit" value="Submit" name="submitbtn"><br><br>
    </form>
    
    <?php
    if(isset($_POST['submitbtn']))
    { 
        echo "<table border='1'>
                <tr>
                    <th>Subjects</th>
                    <th>Marks</th>
                </tr>";
        foreach ($final_data as $key => $value){
                  echo "<tr>";
                  echo "<td>" . $key . "</td>";
                  echo "<td>" . $value . "</td>";
          }
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
                echo "File either exist or did not upload";
            }
        }
        else{
            echo $errmessage;
        }
    }          
    ?>	
</body>
</html>