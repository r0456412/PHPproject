<?php
/**
 * @file planning_docent.php
 * 
 * View waarin de docent de planning kan opvragen voor de verschillende dagen van de internationale dagen
 * - Krijgt $datums-object binnen
 * - Krijgt $gebruiker-object binnen
 * - Gebruikt een ajax functie om de planning op te vragen
 */
?>

<script>

    function haalPlanningOp ( jos,gebruikerid ) {
        $.ajax({type : "GET",
                url : site_url + "/docent/haalAjaxOp_datum",
                data : { datumid : jos, gebruikerid : gebruikerid},
                success : function(result){
                    $("#resultaat").html(result);
                   
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){
        $('.knop').click(function(){
            haalPlanningOp( $( '#datumid' ).val() , $("#gebruiker").val());   
        })
        
        
        $( "#datumid" ).change(function() {
            haalPlanningOp( $( this ).val() , $("#gebruiker").val());
        });
        
    });

</script>

<?php


echo pasStylesheetAan("/css/planning.css");

echo '<div class="row"><p>Kies een datum:</p><div class="col-lg-2">';
echo form_listboxpro('datumid', $datums,'id','datum',0,array('class' => "form-control datums", "size" => "3", "id" => "datumid"));

$data = array(
    'type'  => 'hidden',
    'name'=>'gebruiker', 
    'id'=>'gebruiker',
    'value'=>$gebruiker->id);

echo form_input($data);


echo '</div></div><div id=resultaat>';


    echo '</div>';


?>