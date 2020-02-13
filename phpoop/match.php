<?php

    $match=
    [
        'match1'=>
        [
            'IND'=>
            [
                'IND_1'=>'45',
                'IND_2'=>'00',
                'IND_3'=>'45',
            ],
            'AUS'=>
            [
                'AUS_1'=>'26',
                'AUS_2'=>'33',
                'AUS_3'=>'880',
            ],
        ],
        'match2'=>
        [
            'IND'=>
            [
                'IND_1'=>'00',
                'IND_2'=>'1',
                'IND_3'=>'17',
            ],
            'WI'=>
            [
                'WI_1'=>'4',
                'WI_2'=>'7',
                'WI_3'=>'78',
            ],
        ],
        'match3'=>
        [
            'IND'=>
            [
                'IND_1'=>'5',
                'IND_2'=>'98',
                'IND_3'=>'17',
            ],
            'ENG'=>
            [
                'ENG_1'=>'54',
                'ENG_2'=>'52',
                'ENG_3'=>'99',
            ],
        ],
        'match4'=>
        [
            'AUS'=>
            [
                'AUS_1'=>'60',
                'AUS_2'=>'11',
                'AUS_3'=>'00',
            ],
            'ENG'=>
            [
                'ENG_1'=>'45',
                'ENG_2'=>'57',
                'ENG_3'=>'11',
            ],
        ],
        'match5'=>
        [
            'AUS'=>
            [
                'AUS_1'=>'17',
                'AUS_2'=>'68',
                'AUS_3'=>'10',
            ],
            'WI'=>
            [
                'WI_1'=>'4',
                'WI_2'=>'2',
                'WI_3'=>'69',
            ],
        ],
        'match6'=>
        [
            'WI'=>
            [
                'WI_1'=>'74',
                'WI_2'=>'47',
                'WI_3'=>'00',
            ],
            'ENG'=>
            [
                'ENG_1'=>'6',
                'ENG_2'=>'88',
                'ENG_3'=>'89',
            ],
        ],
    ];


//echo "<pre>";
//print_r($match);
//echo "</pre>";


    class Players{
        
        /**
        *
        * Class Players
        * @var $runs
        * 
        * Initialize Player Runs
        */
        public $runs;
        
        function __construct($runs){
            
            $this->runs=$runs;
            
        }
        
    }


    //Array objects of Player
    $p_name=[];

    foreach($match as $k => $v){
        
        foreach($v as $k2 => $v2){
            
            foreach($v2 as $k3 => $v3){
                
                $object=new Players($v3);
                $p_name[$k3][]=$object;
                
            }
            
        }
        
    }

    
    class Team{
        
        /**
        *
        * Class Team
        * @var $team,$t_total
        * 
        * Initialize Team names and their Total runs
        */
        public $team,$t_total;
        
        function __construct($team,$t_total){
            
            $this->team=$team;
            $this->t_total=$t_total;
            
        }
        
    }

    //Array objects of Teams

    $team_arr=[];

    foreach($match as $k => $v){
        
        foreach($v as $k2 => $v2){
            
            $sum=0;
            //$sum+=$v3[$v2++]++;
            foreach($v2 as $k3 => $v3){
                
                $sum+=$v3;
                
            }
                $object=new Team($k2,$sum);
                $team_arr[$k][]=$object;
        }
        
    }


    class Match{
        
        /**
        *
        * Class Match
        *
        */
        
        /**
        *
        * @param void
        * 
        * Highest Scorer player 
        *
        * @var global $p_name
        * Access array objects variable outside function scope
        * 
        * 
        */
        public function highest_scorer(){
            
            global $p_name;
            
            $max=0; //to store max scorer each interation if higher than $max
            $sum=0; // sum of individual player runs
            $name=''; // player name
            
            foreach($p_name as $k => $v){
                
                $sum=0;
                foreach($v as $k2 => $v2){
                    
                    $sum+=$v2->runs;
                    //print_r($k2." ");
                    if($sum > $max){
                        $max=$sum;
                        $name=$k;
                    }
                        
                }
            }
            echo "Highest Scorer: <br>";
            echo "Name: ".$name."<br>Score: ".$max."<br>"; 
        }
        
        
        /**
        * @param void
        * 
        * Finds Tournament Winner
        *
        *
        * @var global $team_arr 
        * Access team array objects outside function scope
        *
        */
        public function tournament_winner(){
            
            global $team_arr;
            
            $count=0; //To store next highest team win
            $winner=''; //To store tournament winner team
            $team_wins=[]; //To store winning team
            
            foreach($team_arr as $k => $v){
                
                if($v[0]->t_total > $v[1]->t_total){
                    
                    $team_wins[]=$v[0]->team;
                }
                else{
                    
                    $team_wins[]=$v[1]->team;
                    
                }
                
            }
            
            //find frequency of wins and finds the winner
            foreach(array_count_values($team_wins) as $k => $v){
                
                if($v>$count){

                    $winner=$k;
                    $count=$v;
                }
            }
            
            echo "<br>Tournament Winner: ".$winner."<br>";
            
        }
        
        
        /**
        * 
        * @param void
        * Finds Maximum Team Score
        * 
        * @var global $team_arr 
        * Access team array objects outside function scope
        *
        */
        public function maximum_score(){
            
            global $team_arr;
            
            $max=0; //To store next maximum score
            $team_name=''; //To store team name
            
            foreach($team_arr as $k => $v){
                
                foreach($v as $k2 => $v2){
                    
                    if($v2->t_total > $max){
                        
                        $max=$v2->t_total;
                        $team_name=$v2->team;
                        
                    }
                    
                }
                
            }
            
            echo "<br>Maximum Scorer: ".$team_name;
            
        }
        
        
    }

$match_obj=new Match();
$match_obj->highest_scorer();
$match_obj->tournament_winner();
$match_obj->maximum_score();
    
?>