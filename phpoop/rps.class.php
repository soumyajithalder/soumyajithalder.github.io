<?php

    /**
    *
    * Class Rock_Paper_Scissors
    */
    class Rock_Paper_Scissors{
        
        /**
        * The CPU Choice for Rock,Paper or Scissors
        *
        * @var $CPUChoice
        */
        public $CPUChoice;
        
        
        
        /**
        * 
        * @return
        * CPU choice at [0] after shuffling.
        *
        */
        public function cpu(){
            
            $CPUChoice=array("Rock","Paper","Scissors");
            shuffle($CPUChoice);
            return $CPUChoice[0];
            
        }
        
        
        /**
        *
        * @param $user 
        * The parameter user that takes user choice
        *
        * @param $cpu
        * The parameter user that takes cpu choice
        */
        public function game_status($user,$cpu){
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