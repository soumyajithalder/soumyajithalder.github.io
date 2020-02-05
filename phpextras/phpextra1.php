<html>
    <body>
            <?php
                session_start();

                $_SESSION['username'] = true;

                if(!isset($_POST['user'])){
                    if(!isset($_SESSION['username'])){
                        header('location:login.php');
                    }
                    else{
                        $_SESSION['secondPage'] = true;
                        echo '<form action="" method="post" />
                        <input type="radio" name="user" value="Rock" title="Rock" />Rock <br /><br />
                        <input type="radio" name="user" value="Paper" title="Paper" />Paper <br /><br />
                        <input type="radio" name="user" value="Scissors" title="Scissors" />Scissors <br /><br />
                        <input type="submit" name="submit" value="submit"/> 
                        </form> ';
                    }
                }
            ?>
            <?php
                if(!isset($_SESSION['username'])) {
                    header('location:login.php');
                } else {
                    if(isset($_POST['user'])) {
                        $CPUChoice = array('Rock', 'Paper', 'Scissors');
                        shuffle($CPUChoice);

                        $CPU = $CPUChoice[0];
                        $User = $_POST['user'];

                        echo 'Player: '.$User.' <br>CPU: '.$CPU;

                        if($User === $CPU){
                            echo '<br><br>Result: Tie!';
                        }
                        else if($User === "Rock"){
                            if($CPU === "Scissors") {
                                echo '<br><br>Result: User wins';
                            } else {
                                echo '<br><br>Result: CPU wins';
                            }
                        }
                        else if($User === "Paper") {
                            if($CPU === "Rock") {
                                echo '<br>Result: User wins';
                            }else {
                                if($CPU === "Scissors") {
                                    echo '<br>Result: Computer wins';
                                }
                            }
                        }
                        else if($User === "Scissors") {
                            if($CPU === "Rock") {
                                echo '<br>Result: CPU wins';
                            } else {
                                if($CPU === "Paper") {
                                    echo '<br><br>Result: User wins';
                                }
                            }
                        }
                   }
                }
            ?>

        </body>
    </html>