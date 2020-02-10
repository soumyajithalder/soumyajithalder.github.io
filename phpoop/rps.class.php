<?php
    class RockPaperScissors{
        
        public $CPUChoice;
        
        public function CPU(){
            $CPUChoice=array("Rock","Paper","Scissors");
            shuffle($CPUChoice);
            return $CPUChoice[0];
        }
        public function gameStatus($user,$cpu){
             if($user === $cpu){
                    return "Tie";
                    }
                    else if($user === "Rock"){
                        if($cpu === "Scissors") {
                            return "User Wins";
                        } else {
                            return "Cpu Wins";
                        }
                    }
                    else if($user === "Paper") {
                        if($cpu === "Rock") {
                            return "User Wins";
                        }else {
                            if($cpu === "Scissors") {
                            return "Cpu Wins";
                            }
                        }
                    }
                    else if($user === "Scissors") {
                        if($cpu === "Rock") {
                            return "Cpu Wins";
                    } else {
                        if($cpu === "Paper") {
                            return "User Wins";
                    }
                }
            }
        }
    }
?>