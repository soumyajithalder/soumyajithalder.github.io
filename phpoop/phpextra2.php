<?php
    
    /**
    *
    * Class php_2
    */
    class php_2{
        
        /**
        * First array and Second array
        *
        * @var array $arr1, array $arr2
        */
        public $arr1,$arr2;
        
        function __construct(){
            
            $this->arr1=array(
                
                array(1,2,3),
                array(4,5,6),
                array(7,8,9)  
                
            );
            
            $this->arr2=array(
                
                array(9,8,7),
                array(6,5,4),
                array(3,2,1)
                
            );
        }
        
        /**
        * 
        * Subtract two arrays and print.
        * 
        * @param void 
        */
        public function subtract(){
            
            for($i=0;$i<3;$i++){
                
                for($j=0;$j<3;$j++){
                    
                    print_r($this->arr1[$i][$j]-$this->arr2[$i][$j]." ");
                    
                }
                
                echo "<br>";
            }
        }
    }
    
    //Instantiate Class php_2 with Object $object
    
    $object=new php_2();

    //call subtract() function using $object of the class php_2

    $object->subtract();
?>