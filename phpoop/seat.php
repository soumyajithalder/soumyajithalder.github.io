<?php

$person=
[
    [
        'name'=>'A',
        'gender'=>'F',
    ],
    [
        'name'=>'B',
        'gender'=>'F',
    ],
    [
        'name'=>'C',
        'gender'=>'F',
    ],
    [
        'name'=>'D',
        'gender'=>'M',
    ],
    [
        'name'=>'E',
        'gender'=>'M',
    ],
    [
        'name'=>'F',
        'gender'=>'M',
    ],
    [
        'name'=>'G',
        'gender'=>'M',
    ],
    [
        'name'=>'H',
        'gender'=>'M',
    ],
    [
        'name'=>'I',
        'gender'=>'M',
    ],
    [
        'name'=>'J',
        'gender'=>'M',
    ],
];


    class Seat{
        
        
        /**
         *
         * Class Seat
         * 
         * @var $name,$gender
         * Initializes Name and Gender 
         *
         */
        public $name,$gender;
        
        function __construct($name,$gender){
            $this->gender=$gender;
            $this->name=$name;
        }
        
    }



    $p_arr=[]; //Stores person name and gender as array objects
        
    foreach($person as $k => $v){
        $object=new Seat($v['name'],$v['gender']);
        $p_arr[]=$object;
    }
    

    $length=count($p_arr);
    $tmp;

    $f=-1;
    for($i=1;$i<$length-1;$i++){
        //echo $p_arr[$i]->gender;
        if($p_arr[$i]->gender == 'F' && ($p_arr[$i-1]->gender == 'F' || $p_arr[$i+1]->gender == 'F')){
            if($f == -1){
                $f=$i;
            }
        }
        else
        {
            if($f != -1 && ($p_arr[$i+1]->gender != 'F' && $p_arr[$i-1]->gender != 'F')){
                $tmp=$p_arr[$f];
                $p_arr[$f]=$p_arr[$i];
                $p_arr[$i]=$tmp;
                break;
            }
        }
    }
    
    echo "<pre>";
    print_r($p_arr);

?>