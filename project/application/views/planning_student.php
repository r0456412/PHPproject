<?php
/**
 * @file planning_student.php
 * 
 * View waarin de student de planning kan opvragen voor de verschillende dagen van de internationale dagen
 * - Krijgt $datums-object binnen
 * - Gebruikt een ajax functie om de planning op te vragen
 */
?>
<script>

    function haalPlanningOp ( jos ) {
        $.ajax({type : "GET",
                url : site_url + "/student/haalAjaxOp_datum",
                data : { datumid : jos },
                success : function(result){
                    $("#resultaat").html(result);
                   
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){
        
        console.log($.ajax);

        $( "#datumid" ).change(function() {
            haalPlanningOp( $( this ).val() );
        });
        
    });

</script>

<?php
echo pasStylesheetAan("/css/planning.css");

echo '<div class="row"><p>Choose a date:</p><div class="col-lg-2">';

echo form_listboxpro('datumid',$datums,'id','datum',0,array('class' => "form-control", "size" => "3", "id" => "datumid"));
echo '</div></div><div id=resultaat>';


    echo '</div>';


?>

