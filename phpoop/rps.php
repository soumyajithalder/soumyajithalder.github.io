<?php
    $cpu="";
    $status="";
    include ('rps.class.php');
    $rpsObj=new RockPaperScissors;
    if(isset($_GET['submit'])){
        $cpu=$rpsObj->CPU();
        $user=$_GET['rps'];
        $status=$rpsObj->gameStatus($user,$cpu);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Rock Paper Scissors</title>
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