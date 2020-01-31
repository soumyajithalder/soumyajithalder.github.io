<?php

    $student['1'] = array( 
    "Name" => "Soumya",  
    "Class" => "11",  
    "Marks" => array( 
        "Hindi" => "45",  
        "English" => "98", 
        "Maths" => "100" 
    ) 
); 

$student['2'] = array( 
    "Name" => "Sam",  
    "Class" => "10",  
    "Marks" => array( 
        "Hindi" => "58",  
        "English" => "98", 
        "Maths" => "90" 
    ) 
); 

$student['3'] = array( 
    "Name" => "MJ",  
    "Class" => "9",  
    "Marks" => array( 
        "Hindi" => "30",  
        "English" => "70", 
        "Maths" => "78" 
    ) 
); 

$sum=0;


foreach($student as $key=>$a){
    echo "Student Id: ".$key." ";
    $sum=0;
    foreach($a as $b=>$c ){
        echo " ".$b.": ".$c;
        foreach($c as $d=>$marks){
            $sum=$sum+$marks;
            echo " ".$d." = ".$marks;
            
        }
    }
    echo "<br>Total marks: ".$sum."<br>";
}

?>



<!--php
    echo "<table border='1'>
                <tr>
                    <th>Student Id</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Hindi</th>
                    <th>English</th>
                    <th>Maths</th>
                    <th>Total Marks</th>
                </tr>";
       $sum=0;
    foreach($student as $key=>$a){
        echo "<tr>";
        echo "<td>".$key."</td></tr>";
        $sum=0;
        foreach($a as $b=>$c ){
                echo "<tr>";
                //echo "<td>".$b."</td>";
                echo "<td>".$b."</td>";
            
                foreach($c as $d=>$marks){
                $sum=$sum+$marks;
                echo " ".$d." = ".$marks;
            
            }
        }
        echo "<br>Total marks: ".$sum."<br>";
    } 
    
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHPXM</title>
</head>
<body>
    
</body>
</html>