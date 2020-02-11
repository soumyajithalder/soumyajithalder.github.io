<?php

    /**
    *
    * Class php_3
    */
    class php_3{
        
        /**
        * 
        * Fix position as 1 and multiply with -1 for even position
        *
        * Print Black for position when 1 and White for position when -1
        * 
        * @var $spot,$row,$col
        * 
        *
        * Display chessboard.
        * 
        * @param void 
        */
        public function chessboard(){
            
            $spot=1;
            
            $row=$col=8;
            
            echo "<table border='1px solid grey'>";
            
            for($i=0;$i<$row;$i++){
                
                echo "<tr>";
                
                for($j=0;$j<$col;$j++){
                    
                    if($spot==1){
                    
                        echo "<td width=20px height=20px style='background-color:black'></td>";
                        
                    }
                    else{
                       
                        echo "<td width=20px height=20px style='background-color:white'></td>"; 
                        
                    }
                    
                    $spot *=-1;
                    
                }
                    if($col % 2 == 0)
                
                    {
                        $spot *= -1;
                    }
                
                echo "</tr>";
                
                }
            
            echo "</table>";
            }
        }

    //Instantiate Class php_3 with Object $object
    
    $object=new php_3();

    //call chessboard() function using $object of the class php_3

    $object->chessboard();
?>