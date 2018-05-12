<?php 
if($new == "yes"){
    $inhoud = "";
    $onderwerp = "";
}else{
    $inhoud = $sjabloon->inhoud;
    $onderwerp = $sjabloon->onderwerp;
}
echo form_label('Name for template', 'newName'); 
echo form_input(array('name' => 'newName', 'id' => 'newName','value' => $onderwerp, 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true')); 

echo form_label('Content template', 'mailsjabloon');
echo form_textarea(array('name' => 'mailsjabloon', 'id' => 'mailsjabloon','value' => $inhoud, 'rows'=>'5', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true')); 

echo form_submit('Save', 'Save', 'class="btn btn-success float-right"');
if(!($new =="yes")){
    echo form_submit('Delete', 'Delete', 'class="btn btn-danger float-right" formaction="../mailsjabloon/mailsjabloonVerwijder"');
}
?>