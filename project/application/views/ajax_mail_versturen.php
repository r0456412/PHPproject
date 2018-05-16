<?php 
/**
 * @file ajax_mail_versturen.php
 * 
 * View waarin de gegevens van het geselecteerde mailsjabloon wordt weergegeven 
 * en wordt ingevoegd in de pagina mails_versturen.php
 * 
 * - Krijgt $sjabloon-object binnen
 * - Krijgt $new-variabele binnen
 */
if($new == "yes"){
    $inhoud = "";
}else{
    $inhoud = $sjabloon->inhoud;
}
echo form_label('Content template', 'mailsjabloon');
echo form_textarea(array('name' => 'mailsjabloon', 'id' => 'mailsjabloon','value' => $inhoud, 'rows'=>'5', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true')); 
?>