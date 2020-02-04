<?php
    class php3{
        public function chessboard(){
            $spot=1;
            $row=$col=8;
            echo "<table border='1px solid grey'>";
            for($i=0;$i<$row;$i++){
                echo "<tr>";
                for($j=0;$j<$col;$j++){
                    if($spot==1){
                        echo "<td width=20px height=20px style='background-color:black'></td>";
                    }
                    else{
                       echo "<td width=20px height=20px style='background-color:white'></td>"; 
                        }
                    $spot *=-1;
                    }
                    if($col % 2 == 0)
                    {
                        $spot *= -1;
                    }
                echo "</tr>";
                }
            echo "</table>";
            }
        }
    $object=new php3();
    $object->chessboard();
?>