<?php

 $match=array(

    "match1" => array(  
    "IND" => array( 
        "IND_1" => "45",  
        "IND_2" => "0", 
        "IND_3" => "78" 
    ),
     "AUS" => array( 
        "AUS_1" => "26",  
        "AUS_2" => "33", 
        "AUS_3" => "74" 
    )   
),

    "match2" => array(  
    "IND" => array( 
        "IND_1" => "19",  
        "IND_2" => "1", 
        "IND_3" => "89" 
    ),
     "WI" => array( 
        "WI_1" => "4",  
        "WI_2" => "7", 
        "WI_3" => "14" 
    )   
), 

    "match3" => array(  
    "IND" => array( 
        "IND_1" => "5",  
        "IND_2" => "19", 
        "IND_3" => "35" 
    ),
     "ENG" => array( 
        "ENG_1" => "54",  
        "ENG_2" => "52", 
        "ENG_3" => "47" 
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
        "ENG_3" => "14" 
    )   
),


    "match5" => array(  
    "AUS" => array( 
        "AUS_1" => "17",  
        "AUS_2" => "58", 
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
        "ENG_2" => "8", 
        "ENG_3" => "89" 
    )   
));
    

/*-----HIGH SCORER-----*/
$max=array();

echo "<h3>High Scorer</h3>";

    foreach($match as $data=>$values){
        foreach($values as $teams=>$players){
            //print_r($values);
            $max=array("players"=>array_keys($players,max($players))[0],"score"=>max($players));
            echo "Players: ".$max["players"]." Score ".$max["score"]."<br>";
        }
        
    }


echo "<h3>Match Winner</h3>";

    $totalRuns=array();
    $winner=array();
    foreach($match as $data=>$values){
        foreach($values as $teams=>$players){
            //print_r($teams);
            //$totalRuns=array_sum($players);
            $totalRuns=array($teams=>array_keys($teams,max($teams))[0],"score"=>array_sum($players));
            //print_r($totalRuns);
            $winner = max( array( $totalRuns, $teams["score"] ) );
            
        }   
    }
    print_r($winner);


    echo "<h3>Maximum Scorer</h3>";

    $result = array();
    foreach ($match as $data => $values) {
        foreach($values as $teams=>$players){
            $result=array("players"=>array_keys($players,max($players))[0],"score"=>max($players));
        }
    }
    if($result[0]["score"] < $result[1]["score"]) {
        echo $result[1]["score"];
    } else {
        echo $result[0]["score"];
    }




?>