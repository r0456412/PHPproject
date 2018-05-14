<?php
echo "<table border='1'>";
?>

    <tr>
        <th class="eerste">UUR</th>
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
                        echo "<p>Lezing: ".$voorstellen[$counter]->titel."</p>";
                        echo "<p>Taal: ".$voorstellen[$counter]->taal."</p>";
                        echo "<p> Gastspreker: ".$gastsprekers[$counter]->voornaam." ".$gastsprekers[$counter]->achternaam."</p>";
                        echo "<p> Lokaal:".$lokalen[$counter]->nummer."</p>";
                        $counter++;
                    }else{echo "<p>Geen lezing.</p>";}
                    
                    }else{echo "<p>Geen lezing.</p>";}
                    
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