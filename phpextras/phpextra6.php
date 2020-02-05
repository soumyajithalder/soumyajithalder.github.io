<?php

    $match=array();

    $match['1'] = array(  
    "Team1" => array( 
        "Player1" => "78",  
        "Player2" => "78", 
        "Player3" => "100" 
    ),
     "Team2" => array( 
        "Player1" => "47",  
        "Player2" => "0", 
        "Player3" => "86" 
    )   
); 

$match['2'] = array(  
    "Team1" => array( 
        "Player1" => "78",  
        "Player2" => "78", 
        "Player3" => "100" 
    ),
     "Team2" => array( 
        "Player1" => "47",  
        "Player2" => "0", 
        "Player3" => "86" 
    )   
); 

$match['3'] = array(  
    "Team1" => array( 
        "Player1" => "78",  
        "Player2" => "78", 
        "Player3" => "100" 
    ),
     "Team2" => array( 
        "Player1" => "47",  
        "Player2" => "0", 
        "Player3" => "86" 
    )   
); 


foreach($match as $key1=>$value1){
    foreach($value1 as $key2=>$value2){
        foreach($value2 as $key3=>$value3){
            
        }
    }
}
print_r($match);

?>