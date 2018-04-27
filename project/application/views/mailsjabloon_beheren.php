<script>
    function toonSjabloon(str) {
    if (str == "") {
        document.getElementById("mailsjabloonTest").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mailsjabloon").value = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax_mailsjabloon_beheren.php?q="+str,true);
        xmlhttp.send();
    }
}
function test(str){
    document.getElementById("mailsjabloon").value = str;
}
</script>

<?php echo form_open('mailsjabloon/mailsjabloonOplsaan', $attributes);?>
<h1>Change template</h1>
<div>
    <p>Select a template</p>
    <?php
    $mailsjablonen[0] = 'Choose a template';
    $js = 'onChange="toonSjabloon(this.value)"';
        foreach($sjablonen as $sjabloon){
            $mailsjablonen[$sjabloon->onderwerp] = $sjabloon->onderwerp;
        }
        echo form_dropdown('mailsjablonen',$mailsjablonen,'0',$js);
?>
</div>


<div>
    <?php echo form_label('New name for template', 'newName'); ?>
    <?php echo form_input(array('name' => 'newName', 'id' => 'newName', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?>
</div>

<div>
    <p>content teplate</p>
<?php echo form_textarea(array('name' => 'mailsjabloon', 'id' => 'mailsjabloon','value' => 'test test test', 'rows'=>'5', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?>
</div>

<?php 
echo form_submit('knop', 'Save', 'class="btn btn-success float-right"');
echo form_close(); 
?>



