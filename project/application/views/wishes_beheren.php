<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form>
    <table>
        <tr>
            <td><h1>Wishes beheren</h1></td>
            <td><?php echo form_label('Wish:', 'wish'); ?></td>
            <td><?php echo form_dropdown('wish', $wishes, '', 'id="wish" class="form-control form-control-lg rounded-2"'); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Wish question:', 'question'); ?></td>
            <td><?php echo form_input(array('name' => 'question', 'id' => 'question', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
        </tr>
    </table>
</form>