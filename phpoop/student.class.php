<?php
    class Student{
        public $id,$name,$dob,$grade;
        public $output=array();
        function __construct($id,$name,$dob,$grade){
            $this->id=$id;
            $this->name=$name;
            $this->dob=$dob;
            $this->grade=$grade;
        }
        
        public function setMarks($code,$output){
            $this->output[$code]=$output;
        }
        
        
        public function result($subject){
            $res=0;
            $count=0;
            foreach($subject as $key => $value){
                $count++;
                if(array_key_exists($value->$code,$this->output)){
                    if($this->output[$value->code] >= $value->mm){
                        $res++;
                    }
                }
            }
            if((($res/$count)*100)>=40){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function display($subject){
            echo "<table border='2px solid grey'>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Dob</th>";
            echo "<th>Grade</th>";
            echo "<th>Subjects</th>";
            echo "<th>Result</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$this->name."</td>";
            echo "<td>".$this->dob."</td>";
            echo "<td>".$this->grade."</td>";
            $count=0;
            $res=0;
            echo "<td>";
		  foreach ($subject as $key => $value) 
		  {
              $count++;
			     if(array_key_exists($value->code,$this->output))
			     {
			         echo $value->code."(".$value->mm.",".$this->output[$value->code].") <br>";
                     if($value->mm <= $this->output[$value->code])
                     {
                         $res++;
                     }
                 }
          }
            echo "</td>";
            if((($res/$count)*100)>=40)
            {
                echo "<td>Pass</td>";
            }
            else
            {
                echo "<td>Fail</td>";
            }
            echo "</tr>";
            echo "</table>";

        }
    }

class Subject
{
	public $name,$code,$mm,$grade;
	function __construct($name,$code,$mm,$grade)
	{
		$this->name = $name;
		$this->code = $code;
		$this->mm = $mm;
        $this->grade = $grade;
	}

}

$student=array(
    0=>new Student('st1','John','1580812642',12)
);

$subject=array(
    0=>new Subject('Eng','E',20,12),
    1=>new Subject('Hindi','H',30,12)
);

$student[0]->setMarks($subject[0]->code,25);
$student[0]->setMarks($subject[1]->code,35);
$student[0]->result($subject);
$student[0]->display($subject);
        
?>