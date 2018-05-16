<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$attributes = array('name' => 'mijnFormulier');
echo form_open_multipart('partner/save', $attributes);
echo form_label('Import partners:', 'userfile', "required accept='.xls, .xlsx'");
$data = array(
    'name' => 'file',
    'id' => 'file',
    'class' => '',
    'value' => '',
    'data-icon' => 'false'
);
echo form_upload($data);
echo form_submit('import', 'Import');