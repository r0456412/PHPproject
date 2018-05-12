<script>
    function toonSjabloon ( onderwerp ) {
        $.ajax({type : "GET",
                url : site_url + "/mailsjabloon/mailsjabloonAjax",
                data : { onderwerp : onderwerp },
                success : function(result){
                    $("#mailsjabloon").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){
        $( "#mailsjablonen" ).change(function() {
            toonSjabloon( $( this ).val() );
        });
        
    });
</script>

<?php 
$attributes = array('name' => 'mijnFormulier');
echo form_open('mailsjabloon/mailsjabloonOpslaan', $attributes);
?>
<h1>Change template</h1>
<div>
    <?php
    $mailsjablonen["New"] = 'New template';
    $js = 'id ="mailsjablonen"';
        foreach($sjablonen as $sjabloon){
            $mailsjablonen[$sjabloon->onderwerp] = $sjabloon->onderwerp;
        }
        echo form_label('Select a template', 'mailsjablonen');
        echo "</br>";
        echo form_dropdown('mailsjablonen',$mailsjablonen,'0',$js);
?>
</div>

<div id="mailsjabloon">
<div>
    <?php 
    echo form_label('Name for template', 'newName'); 
    echo form_input(array('name' => 'newName', 'id' => 'newName', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true')); 
    ?>
</div>

<div>
<?php 
echo form_label('Content template', 'mailsjabloon');
echo form_textarea(array('name' => 'mailsjabloon', 'id' => 'mailsjabloon','value' => '', 'rows'=>'5', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true')); 
?>
</div>


<?php 
echo form_submit('Save', 'Save', 'class="btn btn-success float-right"');
echo "</div>";
echo form_close(); 
?>
