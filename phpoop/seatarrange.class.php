<?php
    class Persons{
        public $name,$gender;
        function __construct($name,$gender){
            $this->gender=$gender;
            $this->name=$name;
        }
    }


    class Arrange{
        
        public $person;
        function __construct($person){
            $this->person=$person;
        }
        
        public function arrangement(){
            $length=count($this->person);
            for($i=0; $i<$length-1; $i++){
                $person=$this->person[$i];
                if($person->gender == 'F' && ($person->gender == $this->person[$i-1]->gender || $person->gender == $this->person[$i+1]->gender)){
                    //return false;
                }
            }
            //return true;
        }
        
        public function seat(){
            $length=count($this->person);
            $f=-1;
            for($i=1;$i<$length-1;$i++){
                $person=$this->person[$i];
                if($person->gender=='F'){
                    if($f==-1){
                        $f=$i;
                    }
                }
                else{
                    if($f!=-1 && ($this->person[$i-1]->gender != 'F' && $this->person[$i+1]->gender != 'F')){
                        $tmp= $this->person[$f];
                        $this->person[$f]=$this->person[$i];
                        $this->person[$i]=$tmp;
                        break;
                    }
                }
            }
            //return true;
        }
        
    }


$person=array(
        1 => new Persons('1', 'M'),
        2 => new Persons('2', 'M'),
        3 => new Persons('3', 'M'),
        4 => new Persons('4', 'M'),
        5 => new Persons('5', 'M'),
        6 => new Persons('6', 'M'),
        7 => new Persons('7', 'M'),
        8 => new Persons('8', 'F'),
        9 => new Persons('9', 'F'),
        10 => new Persons('10', 'F'),
    );

$object=new Arrange($person);
$object->arrangement();
$object->seat();
    
?>