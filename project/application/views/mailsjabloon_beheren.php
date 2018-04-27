<script>
    function toonSjabloon ( onderwerp ) {
        $.ajax({type : "GET",
                url : site_url + "/mailsjabloon/mailsjabloonAjax",
                data : { onderwerp : onderwerp },
                success : function(result){
                    $("#mailsjabloonTest").html(result);
                    $("#mailsjabloon").val(result);
                   
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){
        
        console.log($.ajax);

        $( "#mailsjablonen" ).change(function() {
            toonSjabloon( $( this ).val() );
        });
        
    });
}
</script>

<?php 
$attributes = array('name' => 'mijnFormulier');
echo form_open('mailsjabloon/mailsjabloonOplsaan', $attributes);
?>
<h1>Change template</h1>
<div>
    <?php
    $mailsjablonen[0] = 'Choose a template';
    $js = 'onChange="toonSjabloon(this.value)"';
        foreach($sjablonen as $sjabloon){
            $mailsjablonen[$sjabloon->onderwerp] = $sjabloon->onderwerp;
        }
        echo form_label('Select a template', 'mailsjablonen');
        echo "</br>";
        echo form_dropdown('mailsjablonen',$mailsjablonen,'0');
?>
</div>


<div>
    <?php 
    echo form_label('New name for template', 'newName'); 
    echo form_input(array('name' => 'newName', 'id' => 'newName', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); 
    ?>
</div>

<div>
<?php 
echo form_label('Content template', 'mailsjabloon');
echo form_textarea(array('name' => 'mailsjabloon', 'id' => 'mailsjabloon','value' => '', 'rows'=>'5', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); 
?>
</div>

<?php 
echo form_submit('knop', 'Save', 'class="btn btn-success float-right"');
echo form_close(); 
?>
<div id="mailsjabloonTest"></div>


