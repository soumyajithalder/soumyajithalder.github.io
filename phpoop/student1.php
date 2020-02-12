<?php

$student=
[
  [
    'sid'=>'st1',
    'name'=>'John',
    'dob'=>'1580812642',
    'grade'=>12
  ],
  [
    'sid'=>'st2',
    'name'=>'Jay',
    'dob'=>'1580812642',
    'grade'=>10
  ],
  [
    'sid'=>'st3',
    'name'=>'Jonathan',
    'dob'=>'1580812642',
    'grade'=>11
  ],
  [
    'sid'=>'st4',
    'name'=>'JJ',
    'dob'=>'1580812642',
    'grade'=>10
  ],
  [
    'sid'=>'st5',
    'name'=>'JR',
    'dob'=>'1580812642',
    'grade'=>12
  ],
];

$marks=
[
  'st1'=>
  [
    'P12'=>89,
    'C12'=>70,
    'M12'=>45,
    'E12'=>78,
  ],
  'st2'=>
  [
    'H10'=>35,
    'E10'=>45,
    'M10'=>92,
  ],
  'st3'=>
  [
    'H11'=>66,
    'E11'=>35,
    'M11'=>35,
    'S11'=>25,
  ],
  'st4'=>
  [
    'H10'=>49,
    'E10'=>66,
    'M10'=>91,
  ],
  'st5'=>
  [
    'P12'=>89,
    'C12'=>89,
    'M12'=>100,
    'E12'=>90,
  ],
];


$subject=
[
  '10'=>
  [
    [
      'name'=>'Hindi-10',
      'code'=>'H10',
      'mm'=>20
    ],
    [
      'name'=>'English-10',
      'code'=>'E10',
      'mm'=>25
    ],
    [
      'name'=>'Maths-10',
      'code'=>'M10',
      'mm'=>30
    ],
  ],
    
  '11'=>
  [
    [
      'name'=>'Hindi-11',
      'code'=>'H11',
      'mm'=>40
    ],
    [
      'name'=>'English-11',
      'code'=>'E11',
      'mm'=>40
    ],
    [
      'name'=>'Maths-11',
      'code'=>'M11',
      'mm'=>40
    ],
    [
      'name'=>'Science-11',
      'code'=>'S11',
      'mm'=>40
    ],
  ],
    
  '12'=>
  [
    [
      'name'=>'Physics-12',
      'code'=>'P12',
      'mm'=>45
    ],
    [
      'name'=>'Chemistry-12',
      'code'=>'C12',
      'mm'=>45
    ],
    [
      'name'=>'Maths-12',
      'code'=>'M12',
      'mm'=>45
    ],
    [
      'name'=>'English-12',
      'code'=>'E12',
      'mm'=>45
    ],
  ],
];


    class Student {
        
        public $sid,$name,$dob,$grade,$marks;

        function __construct($sid,$name,$dob,$grade,$marks)
        {
            $this->sid=$sid;
            $this->name=$name;
            $this->dob=$dob;
            $this->grade=$grade;
            $this->marks=$marks;
        }
    }

        function set_marks($sid)
        {
            global $marks;
            
            foreach ($marks as $k => $v) 
            {
                if ($k === $sid) 
                {
                    return $v;
                }
            }
        }

    $stu=array();


        foreach ($student as $k => $v) 
        {
            
            $object=new Student($v['sid'],$v['name'],$v['dob'],$v['grade'],set_marks($v['sid']));
            
            array_push($stu,$object);
        }


    
    class Subject{
        
        public $name,$code,$mm;
        
        function __construct($name,$code,$mm)
        {
            $this->name=$name;
            $this->code=$code;
            $this->mm=$mm;
        }
    }

    $sub=array();

    foreach ($subject as $grade => $value) 
    {
	   foreach ($value as $key => $value2) 
	   {
            $object = new Subject($value2['name'],$value2['code'],$value2['mm']);
           
            $sub[$grade][]=$object;
        }
        
    }


class Student_Details{

    function get_subjects($grade){
        
        global $sub;
        
        foreach($sub as $k => $v){
            
            if($k === $grade){
                
                foreach($v as $k2 => $v2){
                    
                    echo "Subject Name: ".$v2->name."<br>";
                    echo "Subject Code: ".$v2->code."<br>";
                    echo "Subject Pass Marks: ".$v2->mm."<br><br>";
                    
                }
                
            }
            
        }
        
    }

    function get_marks_code($sid)
    {
        
        global $stu;
		
        foreach ($stu as $k => $v){
            
			if($v->sid === $sid)
            {
                echo "<pre>";
                print_r($v->marks);
                echo "</pre>";
			}
        }
    }


    function get_passmarks($subcode)
    {
        global $sub;
        
        foreach($sub as $k => $v)
        {
            foreach($v as $k2 => $v2)
            {
                if($v2->code === $subcode)
                {
                    return $v2->mm;
                }
            }
        }
    }


    function display($sid){
        
        global $stu;
        
        $name;$dob;$grade;$status;
        
        $count=$i=0;
        
        foreach($stu as $k => $v){
            
            if($v->sid === $sid){
                $name=$v->name;
            
                $dob=$v->dob;
            
                $grade=$v->grade;
            
                foreach($v->marks as $subcode => $v2){
                
                    $i++;
                    if($this->get_passmarks($subcode) < $v2)
                    {
                        $count++;
                    }
                
                }
            }
            
        }
        if(($count/$i)>0.4)
            $status='Pass';
        else
            $status='Fail';
        
        
        echo "<table border='2px solid grey'>";
        echo "<tr>";
        echo "<th>Name</th>";
		echo "<th>Dob</th>";
		echo "<th>Grade</th>";
		echo "<th>Subjects</th>";
		echo "<th>Result</th>";
		echo "</tr>";
        echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$dob."</td>";
        echo "<td>".$grade."</td>";
        echo "<td>";
        foreach($stu as $k => $v){
            
            if($v->sid === $sid){
            
                foreach($v->marks as $subcode => $v2){
                
                    echo $subcode."(".$v2.",".$this->get_passmarks($subcode).")<br>";
                
                }
            }
            
        }
        echo "</td>";
        echo "<td>".$status."</td>";
        echo "</tr";
        echo "</table>";
    }
}

$details=new Student_Details;
$details->get_subjects(10);
$details->get_marks_code('st1');
$details->display('st5');

 ?>