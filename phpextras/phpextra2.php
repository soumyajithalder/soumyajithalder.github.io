<?php
    class php2{
        public $arr1;
        public $arr2;
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
        
        public function subtract(){
            for($i=0;$i<3;$i++){
                for($j=0;$j<3;$j++){
                    print_r($this->arr1[$i][$j]-$this->arr2[$i][$j]." ");   
                }
                echo "<br>";
            }
        }
    }
    $object=new php2();
    $object->subtract();
?>