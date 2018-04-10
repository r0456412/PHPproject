<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('admin/wijzigenDatums', $attributes);
    
    $datumlijst;
    $i = 0;
    
    foreach ($datums as $datum) {
        $datumlijst .= $datum->datum;
        $i++;
    }    

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h5>Change the start and end date here</h5>
                        </div>
                        <?php
                            $attributes = array('name' => 'inlogformulier');
                            echo form_open('login/inloggenControleren', $attributes);
                        ?>
                        <div class="card-body">
                                <div class="form-group">
                                    <?php echo form_label('Start International Days:', 'start'); ?>
                                    <input type="date" name="start" id="start" value="<?php echo $datums->datum  ?>" min="1000-01-01" max="3000-12-31" class="form-control">
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('End International Days:', 'stop'); ?>
                                    <input type="date" name="stop" id="stop" value="<?php echo $datums->datum ?>" min="1000-01-01" max="3000-12-31" class="form-control">
                                </div>
                                <?php echo form_submit(array('name' => 'wijzig', 'value' => 'Save', 'class' => 'btn btn-primary btn-m')); ?>
                        </div>
                        <?php echo form_close(); ?>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>