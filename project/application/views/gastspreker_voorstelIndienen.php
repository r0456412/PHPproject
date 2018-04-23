<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('gastspreker/voorstelVersturen', $attributes);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h5>Submit your proposal</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <?php echo form_label('Title:', 'titel'); ?>
                                </div>
                                <div class="col-md-10">
                                    <?php echo form_input(array('name' => 'titel', 'id' => 'titel', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="col-md-2">
                                    <?php echo form_label('Estimated time:', 'tijdsschatting'); ?>
                                </div>
                                <div class="col-md-10">
                                    <?php echo form_input(array('name' => 'tijdsschatting', 'id' => 'tijdsschatting', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?>
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="col-md-2">
                                    <?php echo form_label('language:', 'taal'); ?>
                                </div>
                                <div class="col-md-10">
                                    <?php echo form_input(array('name' => 'taal', 'id' => 'taal', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?>
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="col-md-2">
                                    <?php echo form_label('Resume:', 'samenvatting'); ?>
                                </div>
                                <div class="col-md-10">
                                    <?php echo form_textarea(array('name' => 'samenvatting', 'id' => 'samenvatting', 'rows'=>'5' , 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?>
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="col-md-12">
                                    <?php echo form_submit('knop', 'Save', 'class="btn btn-success float-right"');?>
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

