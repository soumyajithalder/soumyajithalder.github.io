<?php
    class php5{
        public function multitable(){
            echo "<table border='2px solid grey'>";
            for($i=1;$i<=5;$i++){
                echo "<tr>";
                for($j=1;$j<=5;$j++){
                    echo "<td> $i * $j = ".($i*$j)."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    $object=new php5();
    $object->multitable();
?>
