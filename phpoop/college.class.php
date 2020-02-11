<?php
    class College{
        public $id,$name;
        
        function __construct($id,$name){
            $this->id=$id;
            $this->name=$name;
        }
        
        public function collegeDetails(){
            echo "<br>College Name: ".$this->name."<br>";
            echo "College ID: ".$this->id."<br>";
        }
    }

    class Docs{
        public $doc_name,$doc_type,$doc_college,$sent;
        
        function __construct($doc_name,$doc_type,$doc_college,$sent){
            $this->doc_name=$doc_name;
            $this->doc_type=$doc_type;
            $this->doc_college=$doc_college;
            $this->sent=$sent;
        }
    }

    class DocDetails{
        public $docs=array();
        
        public function setDoc($input){
            array_push($this->docs,$input);
        }
        
        public function display(){
            foreach($this->docs as $k => $v){
                echo "Doc Name: ".$v->doc_name."<br>";
                echo "Doc Type: ".$v->doc_type."<br>";
                if($v->sent == 1)
                    echo "Sent status: Success<br>";
                else
                    echo "Sent status: Fail<br>";
            }
        }
    }

    $coll=array(
        0 => new College(1,'BBIT'),
        1 => new College(2,'IEM')
    );

    $input=array(
        0 => new Docs('12 mark sheet','A',$coll->id,0),
        1 => new Docs('11 mark sheet','B',$coll->id,1)
    );
    

    $collObject= new DocDetails;
    

    foreach($input as $k => $v)
        $collObject->setDoc($v);

    foreach($coll as $k => $v){
        $coll[$k]->collegeDetails();
        $collObject->display();
    }
    
?>