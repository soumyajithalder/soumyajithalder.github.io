<?php

$matchWins=array("IND"=>0,"AUS"=>0,"ENG"=>0,"WI"=>0);

$maxRuns=array("match1"=>0,"match2"=>0,"match3"=>0,"match4"=>0,"match5"=>0,"match6"=>0);

 $match=array(

    "match1" => array(  
    "IND" => array( 
        "IND_1" => "45",  
        "IND_2" => "0", 
        "IND_3" => "45" 
    ),
     "AUS" => array( 
        "AUS_1" => "26",  
        "AUS_2" => "33", 
        "AUS_3" => "88" 
    )   
),

    "match2" => array(  
    "IND" => array( 
        "IND_1" => "0",  
        "IND_2" => "1", 
        "IND_3" => "17" 
    ),
     "WI" => array( 
        "WI_1" => "4",  
        "WI_2" => "7", 
        "WI_3" => "78" 
    )   
), 

    "match3" => array(  
    "IND" => array( 
        "IND_1" => "5",  
        "IND_2" => "98", 
        "IND_3" => "17" 
    ),
     "ENG" => array( 
        "ENG_1" => "54",  
        "ENG_2" => "52", 
        "ENG_3" => "99" 
    )   
), 

    "match4" => array(  
    "AUS" => array( 
        "AUS_1" => "60",  
        "AUS_2" => "11", 
        "AUS_3" => "0" 
    ),
    "ENG" => array( 
        "ENG_1" => "45",  
        "ENG_2" => "57", 
        "ENG_3" => "11" 
    )   
),


    "match5" => array(  
    "AUS" => array( 
        "AUS_1" => "17",  
        "AUS_2" => "68", 
        "AUS_3" => "10" 
    ),
     "WI" => array( 
        "WI_1" => "4",  
        "WI_2" => "2", 
        "WI_3" => "69" 
    )   
),


    "match6" => array(  
    "WI" => array( 
        "WI_1" => "74",  
        "WI_2" => "47", 
        "WI_3" => "0" 
    ),
     "ENG" => array( 
        "ENG_1" => "6",  
        "ENG_2" => "88", 
        "ENG_3" => "89" 
    )   
));
    

/*-----HIGH SCORER-----*/

$max=array();

echo "<h3>High Scorers</h3>";


 foreach($match as $data=>$values){
        echo $data."<br>";
        foreach($values as $teams=>$players){
            //print_r($values);
            $max=array("players"=>array_keys($players,max($players))[0],"score"=>max($players));
            
            echo "Players: ".$max["players"]." Score ".$max["score"]."<br>";
        }
     echo "<br>";
        
    }

/*-----TOURNAMENT WINNER-----,-----MAXIMUM SCORER-----*/

$score=array();

    foreach($match as $data => $values){
        foreach($match[$data] as $teams => $values){
            $sum=0;
            foreach($match[$data][$teams] as $players => $runs){
                if(array_key_exists($players,$score)){
                    $score[$players]+=$runs;
                }
                else{
                    $score+=[$players => $runs];
                }
                
                $sum+=$runs;
                
            }
            if($sum > $maxRuns[$data]){
                $win=$teams;
                $maxRuns[$data]=$sum;
            }
        }
        
        $highestScorer=array_keys($score,max($score));
        $matchWins[$win]++;
        
    }



echo "<h3>Tournament Winner</h3>";
    echo array_keys($matchWins,max($matchWins))[0]."<br>";
echo "<h3>Maximum Scorer</h3>";
    echo array_keys($score,max($score))[0]."<br>";
?>