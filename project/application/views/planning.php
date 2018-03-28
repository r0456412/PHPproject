<?php

echo pasStylesheetAan("/css/planning.css");

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
                    echo "<td align='center' class='eerste'>".$tr*$td."</td>";
                } else{
                    echo "<td align='center'>".$tr*$td."</td>";
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