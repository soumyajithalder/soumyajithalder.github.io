<?php
    /**
    *
    * @file
    * Contains \phpoop\rps.class.php
    */


    $cpu="";

    $status="";

    include ('rps.class.php');

    //Instantiate Class Rock_Paper_Scissors with Object $rpsObj

    $rpsObj=new Rock_Paper_Scissors;

    if(isset($_GET['submit'])){
        
        $cpu=$rpsObj->cpu();
        $user=$_GET['rps'];
        
        //call game_status() function using $rpsObj of the class Rock_Paper_Scissors
        
        $status=$rpsObj->game_status($user,$cpu);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rock Paper Scissors</title>
</head>
<body>
    <form action="rps.php" method="get">
        <input type="radio" name="rps" value="Rock"> Rock <br>
        <input type="radio" name="rps" value="Paper"> Paper<br>
        <input type="radio" name="rps" value="Scissors"> Scissors<br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <h2>Result</h2>
    <?php
    if(isset($_GET['submit'])){
        echo "<h4>".$status."</h4>";
        $status="";
    }
    ?>
</body>
</html>