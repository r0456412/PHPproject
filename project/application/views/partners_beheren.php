<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$attributes = array('name' => 'mijnFormulier');
echo form_open_multipart('partner/save', $attributes);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h5>Import partners here</h5>
                        </div>
                        <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4">
                            <?php
                                echo form_label('Import partners:', 'userfile');
                                $data = array(
                                    'name' => 'file',
                                    'id' => 'file',
                                    'class' => '',
                                    'value' => '',
                                    'data-icon' => 'false',
                                    'required' => 'true'
                                );
                            ?>
                            </div>
                            <div class="col-md-4">
                            <?php
                                echo form_upload($data);
                            ?>
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="col-md-12">
                                <?php echo form_submit('import', 'Import', 'class="btn btn-success float-right terugKnop"');?>
                            </div>
                        </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
