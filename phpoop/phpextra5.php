<?php

    /**
    *
    * Class php_5
    */
    class php_5{
        
        /**
        *
        * Multiply number for each row and column
        * 
        * @param void
        */
        public function multitable(){
            
            echo "<table border='2px solid grey'>";
            
            for($i=1;$i<=5;$i++){
                
                echo "<tr>";
                
                for($j=1;$j<=5;$j++){
                    
                    echo "<td> $i * $j = ".($i*$j)."</td>";
                    
                }
                
                echo "</tr>";
                
            }
            
            echo "</table>";
            
        }
    }
    
    //Instantiate Class php_5 with Object $object

    $object=new php_5();

    //call multitable() function using $object of the class php_5

    $object->multitable();
?>
