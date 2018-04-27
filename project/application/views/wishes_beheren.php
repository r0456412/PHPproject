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
    echo form_open('wishes/update', $attributes);
    
    foreach ($wishes as $wens) {
        
        echo '<tr><td>';
        echo form_input(array('name' => 'wish', 'id' => $wens->id, 'value' => $wens->wish, 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));
        echo form_hidden('id', $wens->id);
        echo '</td><td>';
        echo form_submit('save', 'Save');
        echo '</td><td>';
        echo form_submit('delete', 'Delete');
        echo '</td></tr>';
        
    }
    echo form_close();
    echo form_open('wishes/add', $attributes);
    echo '<tr><td>';
    echo form_input(array('name' => 'nieuw', 'id' => 'wish', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));
    echo '</td><td>';
    echo form_submit('add', 'Add');
    echo '</td></tr>';
    echo form_close();
    ?>
</table>
