<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('gastspreker/wishes_opslagen', $attributes);
    $i=1;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h5>Submit your wishes</h5>
                        </div>
                        <div class="card-body">
                                <?php 
                                foreach ($wishes as $wish) {
                                ?>
                                    <div class="form-row">
                                        <div class="col-md-">
                                            <p>
                                                <?php echo $wish->wish ?>
                                            <p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>
                                                <?php 
                                                    echo "<input type='text' name='wish$i' id='dag$i'>";
                                                    $i++;
                                                ?>
                                            </p>
                                        </div>
                                    </div>  
                                        <?php
                                            }
                                        ?>
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

