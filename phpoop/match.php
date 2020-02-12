<?php

  /*  class Player{
        
        public $p1,$p2,$p3;
        
        function __construct($p1,$p2,$p3){
            
            $this->p1=$p1;
            $this->p2=$p2;
            $this->p3=$p3;
            
        }
        
    }


    class Teams{
        
        public $t1,$t2;
        
        function __construct($t1,$t2){
            
            $this->t1=$t1;
            $this->t2=$t2;
        }
        
    }


    class Match{
        
        public $match=array();
        
        function __construct($array){
            
            $this->match=$array;
            
        }
        
        
        public function highest_scorer(){
            
            $max=0;
            foreach($this->match as $key => $value){
                foreach($value as $k2 => $value2){
                    foreach($value2 as $key3 => $value3){
                        if($value3>$max)
                        {
                            $max=$value3;
                        }
                    }
                }
            }
            echo $max;
        }
        
        
        //public function 
            
        
        public function display(){
            echo "<pre>";
            print_r($this->match);
        }
        
    }



    $player=array(
        
        0 => new Player(45,0,47),
        1 => new Player(78,1,0)
    );
        
    $team=array(
        
        0 => new Teams($player[0],$player[1])
        
    );

    $obj=new Match($team);
    $obj->highest_scorer();
    $obj->display();








*/



class Players{
        
        public $players_info;
        
        function __construct($runs){
            
            $this->players_info=$runs;
            
        }
        
    }

    class Teams{
        
        public $team_info=array();
        
        function __construct($p1,$p2,$p3){
            
            $this->team_info=array($p1,$p2,$p3);
            
        }
        
    }

    class Matches{
        
        public $match_info=array();
        
        function __construct($team_1,$team_2){
            
            $this->match_info=array($team_1,$team_2);
                
        }
        
    }


    class Tournament{
        
        public function highest_score($match){
            
            $max=0;
            
            foreach($match as $k => $v){
                
                foreach($v as $match_no => $v2){
                    
                    foreach($v2 as $teams => $v3){
                        
                        foreach($v3 as $players => $runs){
                            
                            if($runs > $max){
                                
                                $max = $runs;
                                
                            }
                            
                        }
                        
                    }
                    
                }
                
            }
            
            print_r($max);
        }
    }


    $obj_player['player1_name']=new Players(80);
    $obj_player['player2_name']=new Players(0);
    $obj_player['player3_name']=new Players(18);
    $obj_player['player4_name']=new Players(78);
    $obj_player['player5_name']=new Players(100);
    $obj_player['player6_name']=new Players(25);
    $obj_player['player7_name']=new Players(90);
    $obj_player['player8_name']=new Players(74);
    $obj_player['player9_name']=new Players(47);
    $obj_player['player10_name']=new Players(2);
    $obj_player['player11_name']=new Players(11);
    $obj_player['player12_name']=new Players(78);


    $obj_team['team_1']=new Teams($obj_player['player1_name'],$obj_player['player2_name'],$obj_player['player3_name']);
    $obj_team['team_2']=new Teams($obj_player['player4_name'],$obj_player['player5_name'],$obj_player['player6_name']);
    $obj_team['team_3']=new Teams($obj_player['player7_name'],$obj_player['player8_name'],$obj_player['player9_name']);
    $obj_team['team_4']=new Teams($obj_player['player10_name'],$obj_player['player11_name'],$obj_player['player12_name']);


    $obj_match['match1']=new Matches($obj_team['team_1'],$obj_team['team_2']);
    $obj_match['match2']=new Matches($obj_team['team_3'],$obj_team['team_4']);


    $obj=new Tournament();
    //$obj->display($obj_team);
    $obj->highest_score($obj_match);

    echo "<pre>";
    print_r($obj_match);


?>