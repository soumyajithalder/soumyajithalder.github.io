<?php
    class Persons{
        public $name,$gender;
        function __construct($name,$gender){
            $this->name=$name;
            $this->gender=$gender;
            
        }
    }


    class Arrange{
        
        public $person;
        function __construct($person){
            $this->person=$person;
        }
        
        public function arrangement(){
            $length=count($this->person);
            for($i=1; $i<$length-1; $i++){
                $persons=$this->person[$i];
                if($persons->gender == 'F' && ($persons->gender == $this->person[$i-1]->gender || $persons->gender == $this->person[$i+1]->gender)){
                    return 0;
                }
            }
            return 1;
        }
        
        public function seat(){
            $length=count($this->person);
            $flag=-1;
            for($i=1;$i<$length-1;$i++){
                $persons=$this->person[$i];
                if($persons->gender=='F'){
                    if($flag==-1){
                        $flag=$i;
                    }
                }
                else{
                    if($f != -1 && ($this->person[$i-1]->gender != 'F' && $this->person[$i+1]->gender != 'F')){
                        $tmp= $this->person[$flag];
                        $this->person[$flag]=$this->person[$i];
                        $this->person[$i]=$tmp;
                        break;
                    }
                }
                
            }
            //print_r($this->person[$f]);
        }
        
    }


$person=array(
        0 => new Persons('1', 'F'),
        1 => new Persons('2', 'F'),
        2 => new Persons('3', 'M'),
        3 => new Persons('4', 'M'),
        4 => new Persons('5', 'M'),
        5 => new Persons('6', 'M'),
        6 => new Persons('7', 'F'),
        7 => new Persons('8', 'M'),
        8 => new Persons('9', 'M'),
        9 => new Persons('10', 'M')
    );

$object = new Arrange($person);
$result=$object->arrangement();
if($result==0){
    $object->seat();
    foreach($object->person as $v){
        echo $v->name." ";
        echo $v->gender;
        echo "<br>";
    }
}   
?>