<?php

$college=
[
    [
        'cid'=>'1',
        'cname'=>'IEM',
    ],
    [
        'cid'=>'2',
        'cname'=>'BBIT',
    ],
    [
        'cid'=>'3',
        'cname'=>'UEM',
    ],
    [
        'cid'=>'4',
        'cname'=>'IIT',
    ],
];
    

class College{
    
    /**
    * Class College
    * 
    * @var $cid,$cname
    *
    * Initialize college id and college name
    * 
    */
    
    public $cid,$cname;
    
    function __construct($cid,$cname){
        
        $this->cid=$cid;
        $this->cname=$cname;
    }
    
}

    $col=[];
    
    foreach($college as $k => $v){
    
        $object = new College($v['cid'],$v['cname']);
        
        $col[]=$object;
    
    }
 
$documents=
[
    [
        'doc_name'=>'A_name',
        'doc_type'=>'A',
        'doc_college'=>'1',
        'sent_status'=>'1',
        
    ],
    [
        'doc_name'=>'B_name',
        'doc_type'=>'A',
        'doc_college'=>'2',
        'sent_status'=>'1',
        
    ],
    [
        'doc_name'=>'C_name',
        'doc_type'=>'C',
        'doc_college'=>'3',
        'sent_status'=>'1',
        
    ],
    [
        'doc_name'=>'D_name',
        'doc_type'=>'D',
        'doc_college'=>'4',
        'sent_status'=>'0',
        
    ],
];


class Documents{
    
    public $doc_name,$doc_type,$doc_college,$sent_status;
    
    function __construct($doc_name,$doc_type,$doc_college,$sent_status){
        
        $this->doc_name=$doc_name;
        $this->doc_type=$doc_type;
        $this->doc_college=$doc_college;
        $this->sent_status=$sent_status;
    }
    
}


$docs=[];

$arr=[];

    foreach($documents as $k => $v){
    
        $object= new Documents($v['doc_name'],$v['doc_type'],$v['doc_college'],$v['sent_status']);
        
        $docs[]=$object;
    
    foreach($col as $k2 => $v2){
        
        if($v['doc_college'] === ''){
            
            $v2->arr[$k]['doc_name']=$v['doc_name'];
            $v2->arr[$k]['doc_type']=$v['doc_type'];
            $v2->arr[$k]['sent_status']=$v['sent_status'];
            
        }
        
        else if($v['doc_college'] === $v2->cid){
            
            $v2->arr[$k]['doc_name']=$v['doc_name'];
            $v2->arr[$k]['doc_type']=$v['doc_type'];
            $v2->arr[$k]['sent_status']=$v['sent_status'];
            
            
        }
        
        
    }
    
}

    foreach($col as $k => $v){
        
        echo "<br>College Id: ".$v->cid."<br>";
        echo "College Name: ".$v->cname."<br>";
        foreach($v->arr as $k2 => $v2){
            
            echo "Doc Name: ".$v2['doc_name']."<br>";
            echo "Doc Type: ".$v2['doc_type']."<br>";
            if($v2['sent_status'] === '1')
                echo "Sent Status: Success<br>";
            else
                echo "Sent Status: Fail<br>";
            
        }
        
    }
    

?>