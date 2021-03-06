<?php
/**
 * @file datums_wijzigen.php
 * 
 * View waarin de admin de datums waarop de internationale dagen doorgaan kan aanpassen
 * - Maakt gebruik van Boodstrap cards
 * - Krijgt $datums-object binnen
 * - Werkt met formulier om wijzigingen op te slaan
 */
?>

<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('admin/datums_opslaan', $attributes);
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
                                        <div class="col-md-10">
                                        <?php
                                            echo "<input type='date' name='dag$i' id='dag$i' value='$datum->datum' min=".date('Y-m-d')."  max='3000-12-31' class='form-control datums'>";
                                            $i++;
                                            ?>
                                            
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
