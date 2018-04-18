<?php

echo pasStylesheetAan("/css/planning.css");

$datumOptions[0] = 'Kies een datum';
        foreach($datums as $datum){
            $datumOptions[$datum->id] = $datum->datum;
        }
        
$voorstelOptions[0] = 'Kies een voorstel';
        foreach($voorstellen as $voorstel){
            $voorstelOptions[$voorstel->id] = $voorstel->titel;
        }
        
$lokaalOptions[0] = 'Kies een lokaal';
        foreach($lokalen as $lokaal){
            $lokaalOptions[$lokaal->id] = $lokaal->nummer;
        }
        

        
echo form_dropdown('land*-',$datumOptions,'0');
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
                    echo "<td align='center'>";
                    echo form_dropdown('land*-', $voorstelOptions, '0');
                    echo form_dropdown('land*-', $lokaalOptions, '0');
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


?>




<!--
<table>

    <tr>
        <th class="eerste">UUR</th>
       <th>APP-BIT1</th>
       <th>APP-BIT2</th>
       <th>EMDEV</th>
       <th>INFRA</th>
    </tr>
    <tr>
        <td class="eerste">9u - 10u30</td>
       <td>lezing 1</td>
       <td>lezing 1.2</td>
       <td>lezing 1.3</td>
       <td>lezing 1.4 </td>
    </tr>
    <tr class="break">
        <td class="eerste"></td>
       <td>Break</td>
       <td>Break</td>
       <td>Break</td>
       <td>Break</td>
    </tr>
    <tr>
        <td class="eerste">10u45 - 12u15</td>
        <td>lezing 2</td>
        <td>lezing 2.1</td>
        <td>lezing 2.2</td>
        <td>lezing 2.3 </td>
    </tr>
    <tr class="break">
        <td class="eerste"></td>
        <td>Lunch</td>
        <td>Lunch</td>
        <td>Lunch</td>
        <td>Lunch</td>
    </tr>
    <tr>
        <td class="eerste">13u - 14u30</td>
        <td>lezing 3</td>
        <td>lezing 3.1</td>
        <td>lezing 3.2</td>
        <td>lezing 3.3 </td>
    </tr>
    <tr class="break">
        <td class="eerste"></td>
        <td>Break</td>
        <td>Break</td>
        <td>Break</td>
        <td>Break</td>
    </tr>
    <tr>
        <td class="eerste">14u45 - 16u15</td>
        <td>lezing 4</td>
        <td>lezing 4.1</td>
        <td>lezing 4.2</td>
        <td>lezing 4.3 </td>
    </tr>
</table> -->