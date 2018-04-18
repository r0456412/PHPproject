<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$attributes = array('name' => 'mijnFormulier');
?>
<h1>Wishes beheren</h1>
<table>
<?php
foreach ($wishes as $wens){
echo form_open('wishes/update', $attributes);
echo '<tr><td>';
echo form_input(array('name' => 'title', 'id' => 'titel', 'value' => $wens->wish, 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));
echo '</td></tr>';
} 
?>
</table>