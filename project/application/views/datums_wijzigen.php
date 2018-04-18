<?php
    $attributes = array('name' => 'mijnFormulier');

    echo form_open('admin/datums_opslaan', $attributes);
    
    $datumlijst = "";
    $i = 1;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">

                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h5>Change the start and end date here</h5>
                            </div>


                            <div class="card-body">
                                <?php 
                            foreach ($datums as $datum) {
                            ?>
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <?php
                                    echo form_label("Day $i:", 'dag'.$i);
                                ?>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                    echo "<input type='date' name='dag$i' id='dag$i' value='$datum->datum' min='1000-01-01' max='3000-12-31' class='form-control datums'>";
                                    $i++;
                                ?>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger">Delete</button>
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
