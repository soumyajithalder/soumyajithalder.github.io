<?php

$array=array(
    array('pd'=>pd1,'sp'=>5,'sd'=>'04/02/2020','ct'=>'C1'),
    array('pd'=>pd1,'sp'=>15,'sd'=>'05/02/2020','ct'=>'C1'),
    array('pd'=>pd2,'sp'=>50,'sd'=>'04/02/2020','ct'=>'C1'),
    array('pd'=>pd3,'sp'=>40,'sd'=>'06/02/2020','ct'=>'C2'),
    array('pd'=>pd2,'sp'=>75,'sd'=>'03/02/2020','ct'=>'C1'),
    array('pd'=>pd2,'sp'=>65,'sd'=>'07/02/2020','ct'=>'C1'),
    array('pd'=>pd4,'sp'=>190,'sd'=>'08/02/2020','ct'=>'C2'),
);


//echo "<pre>";
//print_r($array);


    class Product{
        
        /**
         * Class Product
         * 
         * @var $pd,$sp,$sd,$ct 
         * Initializes product,selling price,selling date, category
         *
         */
        
        public $pd,$sp,$sd,$ct;
        
        function __construct($pd,$sp,$sd,$ct){
            
            $this->pd=$pd;
            $this->sp=$sp;
            $this->sd=$sd;
            $this->ct=$ct;
        }
    
    }



    $p_arr=[]; //Array of product objects
    $c_arr=[]; //separate array to store category count
    $product=[]; //separate arra to store product
    
    foreach($array as $k => $v){
        
        
        $object=new Product($v['pd'],$v['sp'],$v['sd'],$v['ct']);
        $p_arr[]=$object;
        $c_arr[$v['ct']]=0;
        $product[$v['pd']]="";
        
    }

    

    /**
     * Compares two objects to sort by product
     *
     * @param $object1,$object2
     * 
     * @return lowest product incomparision and pushes up in array
     *
     */
    function comparator($object1,$object2){
        
        return $object1->pd>$object2->pd;
    }

    usort($p_arr,'comparator'); //sort $p_arr array of objects in ascending order


    /**
     * Compares two objects to sort by product
     *
     * @param $object1,$object2
     * 
     * @return lowest date incomparision and pushes up in array
     *
     */
    function comparator_2($object1,$object2){
        
        if($object1->pd == $object2->pd){
            if(strtotime($object1->sd)<strtotime($object2->sd)){
                $object2->sp+=$object1->sp;
            }
            else if(strtotime($object1->sd)>strtotime($object2->sd)){
                $object1->sp+=$object2->sp;
            }
            return strtotime($object1->sd) > strtotime($object2->sd);
        }
    }

    usort($p_arr,'comparator_2'); // sort $p_arr accoring to date in ascending order



    /**
     *
     * @param $c_key
     * Takes category key
     * 
     * Add product count to corresponding category
     *
     * @var global $p_arr,$product
     */
    function add_product($c_key){
        global $p_arr,$product;
        $count=1;
        foreach ($p_arr as $k => $v) {
            if($v->ct==$c_key){
                if($product[$v->pd]!=""){
                    $count=$product[$v->pd];
                    $v->ct=$c_key."-P".$count;
                    $count+=1;
                }
                else {
                    $v->ct=$c_key."-P".$count;
                    $product[$v->pd]=$count;
                    $count+=1;
                }
            }
        }
    }


    // Add Product count to corresponding category

    foreach($c_arr as $k=>$v){
        add_product($k);
    }


    echo "<pre>";
    print_r($p_arr);

    

?>