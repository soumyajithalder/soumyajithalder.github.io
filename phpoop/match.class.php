<?php
    class PlayerInfo{
        public $name;
        public $score=array();
        
        function __construct($name){
            $this->name=$name;
        }
        
        public function score($match,$score){
            $this->score[$match]=$score;
        }
        
        public function totalScore(){
            $total=0;
            foreach($this->score as $k => $v){
                $total+=$v;
            }
            return $total;
        }
    }


    class TeamInfo{
        public $name;
        public $player=array();
        
        function __construct($name){
            $this->name=$name;
        }
        
        public function setPlayers($match,$p1,$p2,$p3){
            $this->player[$match]=array();
            array_push($this->player[$match],$p1,$p2,$p3);
        }
    }


    class MatchInfo{
        public $num,$t1,$t2;
        
        function __construct($num,$t1,$t2){
            $this->num=$num;
            $this->t1=$t1;
            $this->t2=$t2;
        }
        
        public function matchWinner(){
            $t1_total=0;$t2_total=0;
            
            //team 1 total
            foreach($this->t1->player as $k => $v){
                foreach($v as $k2 => $v2){
                    $t1_total+=$v2->score[$this->num];
                }
            }
            //team 2 total
            foreach($this->t2->player as $k => $v){
                foreach($v as $k2 => $v2){
                    $t2_total+=$v2->score[$this->num];
                }
            }
            
            if($t1_total<$t2_total)
                return $this->t2->name;
            else
                return $this->t1->name;
        }
        
        
        public function totalTeamScore(){
            $t1_total=0;$t2_total=0;
            
            //team 1 total
            foreach($this->t1->player as $k => $v){
                foreach($v as $k2 => $v2){
                    $t1_total+=$v2->score[$this->num];
                }
            }
            //team 2 total
            foreach($this->t2->player as $k => $v){
                foreach($v as $k2 => $v2){
                    $t2_total+=$v2->score[$this->num];
                }
            }
            
            if($t1_total<$t2_total)
                return $t2_total;
            else
                return $t1_total;
        }
    }    


    class Tournament{
        public $team;
        
        public function highestScorer($player){
            $max=0;
            foreach($player as $k => $v){
                $total=$v->totalScore();
                if($total > $max){
                    $p=$v;
                    $max=$total;
                }
            }
            
            echo "<h4>Highest Scorer</h4>".$p->name;
        }
        
        public function tournamentWinner($matches){
            $res=array();
            
            foreach($matches as $k => $v){
                if(array_key_exists($v->matchWinner(),$matches)){
			         $res[$v->matchWinner()]++ ;
                }
                else
                {
                    $res[$v->matchWinner()] = 0;	
                }
            }
            echo "<br><h4>TOrnament Winner</h4>".array_keys($res,max($res))[0];
        }
        
        public function maximumScore($matches){
            $m=array();
            foreach($matches as $k => $v){
                $k1=$v->matchWinner();
                $v1=$v->totalTeamScore();
                $m[$k1]=$v1;
            }
            echo "<br><h4>Maximum Score</h4>".max($m);
                //.array_keys($m,max($m))[0]."<br>";
        }
    }


//add more data and heading

$player=array(
    
    0 => new PlayerInfo('p1'),
    1 => new PlayerInfo('p2'),
    2 => new PlayerInfo('p3'),
    3 => new PlayerInfo('q1'),
    4 => new PlayerInfo('q2'),
    5 => new PlayerInfo('q3'),
    6 => new PlayerInfo('r1'),
    7 => new PlayerInfo('r2'),
    8 => new PlayerInfo('r3'),
    9 => new PlayerInfo('s1'),
    10 => new PlayerInfo('s2'),
    11 => new PlayerInfo('s3')
);


$team= array (
    0 => new TeamInfo('IND'),
	1 => new TeamInfo('AUS'),
	2 => new TeamInfo('ENG'),
	3 => new TeamInfo('WI')
);


$player[0]->score(0,45);
$player[1]->score(0,0);
$player[2]->score(0,78);
$player[3]->score(0,4);
$player[4]->score(0,100);
$player[5]->score(0,98);
$player[6]->score(1,29);
$player[7]->score(1,54);
$player[8]->score(1,1);
$player[9]->score(1,8);
$player[10]->score(1,9);
$player[11]->score(1,28);

$team[0]->setPlayers(0,$player[0],$player[1],$player[2]);
$team[1]->setPlayers(0,$player[3],$player[4],$player[5]);
$team[2]->setPlayers(1,$player[6],$player[7],$player[8]);
$team[3]->setPlayers(1,$player[9],$player[10],$player[11]);

$match=array(
    0 => new MatchInfo(0,$team[0],$team[1]),
    1 => new MatchInfo(1,$team[2],$team[3])
);


$tournament=new Tournament();
$tournament->highestScorer($player);
$tournament->tournamentWinner($match);
$tournament->maximumScore($match);

?>