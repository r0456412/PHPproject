<?php
/**
 * @file ajax_gastspreker_planning.php
 * 
 * View waarin de gastspreker zijn planning kan zien voor de verschillende datums van de internationale dagen
 * - Krijgt $lokalen-object binnen
 * - Krijgt $voorstellen-object binnen
 * - Krijgt $planning-object binnen
 * - Krijgt $gastsprekers-object binnen
 */
echo "<table border='1'>";
?>

    <tr>
        <th class="eerste">HOUR</th>
        <th>APP-BIT1</th>
        <th>APP-BIT2</th>
        <th>EMDEV</th>
        <th>INFRA</th>
    </tr>

    <?php

$counter = 0;
$counter2= 1;
    for($tr=1;$tr<=7;$tr++){
        if ($tr % 2){
            echo "<tr>";
            for($td=1;$td<=5;$td++){
                if ($td == 1){
                    echo "<td align='center' class='eerste'>"; if ($tr == 1){echo"9:00 - 10:30";}elseif($tr == 3){echo"10:45 - 12:15";}elseif($tr == 5){echo"13:00 - 14:30";}else{echo"14:45 - 16:15";}"</td>";
                } else{
                    echo "<td align='center' id=" . $counter . ">";
                    if(!empty($planning)){
                        if (count($planning)>$counter && $planning[$counter]->tabelId==$counter2) {
                        echo "<p>Lecture: ".$voorstellen[$counter]->titel."</p>";
                        echo "<p>Language: ".$voorstellen[$counter]->taal."</p>";
                        echo "<p>Lecturer: ".$gastsprekers[$counter]->voornaam." ".$gastsprekers[$counter]->achternaam."</p>";
                        echo "<p>Classroom: ".$lokalen[$counter]->nummer."</p>";
                        $counter++;
                    }else{echo "<p>No lecture.</p>";}
                    
                    }else{echo "<p>No lecture.</p>";}
                    
                    $counter2++;
                    echo "</td>";
                }
            }
            echo "</tr>";
        }
        else{
            echo "<tr class='break'>";
            for($td=1;$td<=5;$td++){
                if ($td == 1){
                    echo "<td align='center' class='eerste'></td>";
                } else{
                    echo "<td align='center'> break </td>";
                }
            }
            echo "</tr>";
        }
    }

    echo "</table>";
