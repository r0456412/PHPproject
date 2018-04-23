<?php

echo pasStylesheetAan("/css/planning.css");


$datumOptions[0] = 'Kies een datum';
$i=1;
        foreach($datums as $datum){
            $datumOptions[$i] = $datum->datum;
            $i++;
        }
        
$voorstelOptions[0] = 'Kies een voorstel';
$i=1;
        foreach($voorstellen as $voorstel){
            $voorstelOptions[$i] = $voorstel->titel;
            $i++;
        }
        
$lokaalOptions[0] = 'Kies een lokaal';
$i=1;
        foreach($lokalen as $lokaal){
            $lokaalOptions[$i] = $lokaal->nummer;
            $i++;
        }
$counter = 0;
        

    echo form_open('planning/sessie_opslaan', 'formulier'); 
   echo form_dropdown('datum',$datumOptions,'0');
   echo form_hidden('jaargang','1');

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


    for($tr=1;$tr<=7;$tr++){
        if ($tr % 2){
            echo "<tr>";
            for($td=1;$td<=5;$td++){
                if ($td == 1){
                    echo "<td align='center' class='eerste'>"; if ($tr == 1){echo"9:00 - 10:30";}elseif($tr == 3){echo"10:45 - 12:15";}elseif($tr == 5){echo"13:00 - 14:30";}else{echo"14:45 - 16:15";}"</td>";
                } else{
                    $counter++;
                    echo "<td align='center' id=" . $counter . ">";
                    
                    echo form_dropdown('voorstel[]', $voorstelOptions, '0');
                    echo form_dropdown('lokaal[]', $lokaalOptions, '0');
                    
                    echo form_hidden('tabelid[]',$counter);
                    
                    
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
    echo form_submit('knop', 'Send');


?>




