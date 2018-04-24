<script>

    function haalPlanningOp ( datumId ) {
        $.ajax({type : "GET",
                url : site_url + "/student/haalAjaxOp_planning",
                data : { datumId : datumId },
                success : function(result){
                    $("#resultaat").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){

        $( "#datumId" ).change(function() {
            haalPlanningOp( $( this ).val() );
        });
        
    });

</script>

<?php
echo pasStylesheetAan("/css/planning.css");

echo '<div class="row"><p>Kies een datum:</p><div class="col-lg-2">';

echo form_listboxpro('datumId',$datums,'id','datum',0,array('class' => "form-control", "size" => "3", "id" => "datumId"));
echo '</div></div><div>';

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
    for($tr=1;$tr<=7;$tr++){
        if ($tr % 2){
            echo "<tr>";
            for($td=1;$td<=5;$td++){
                if ($td == 1){
                    echo "<td align='center' class='eerste'>"; if ($tr == 1){echo"9:00 - 10:30";}elseif($tr == 3){echo"10:45 - 12:15";}elseif($tr == 5){echo"13:00 - 14:30";}else{echo"14:45 - 16:15";}"</td>";
                } else{
                    $counter++;
                    echo "<td align='center' id=" . $counter . ">";
                    
                    
                    
                    
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
    echo '</div>';


?>

