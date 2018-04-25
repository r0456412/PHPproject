<?php
    $attributes = array('name' => 'mijnFormulier');

    

    echo form_open('admin/paginaInhoud_opslaan', $attributes);

?>
    <div class="row">
        <div class="col">
            <?php echo form_label('Title 1:', 'titel1'); ?>
            <h1>
                <?php echo form_textarea(array('value' => $paginainhoud->hoofding1 ,'name' => 'hoofding1', 'id' => 'hoofding1', 'rows'=>'1', 'class' => 'form-control form-control-lg rounded-2')); ?>
            </h1>
            <?php echo form_label('Title 2:', 'titel2'); ?>
            <h5>
                <?php echo form_textarea(array('value' => $paginainhoud->hoofding2 ,'name' => 'hoofding2', 'id' => 'hoofding2', 'rows'=>'1', 'class' => 'form-control form-control-lg rounded-2')); ?>
            </h5>
            <?php echo form_label('Content 1:', 'inhoud1'); ?>
            <p>
                <?php echo form_textarea(array('value' => $paginainhoud->inhoud1,'name' => 'inhoud1', 'id' => 'inhoud1', 'class' => 'form-control form-control-lg rounded-2')); ?>
                <p>
        </div>
        <div class="col">
            <?php echo toonAfbeelding('images/thomasmore.jpg', 'class=homepageImage') ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php echo form_label('Content 2:', 'inhoud2'); ?>
            <p>
                <?php echo form_textarea(array('value' => $paginainhoud->inhoud2,'name' => 'inhoud2', 'id' => 'inhoud2', 'class' => 'form-control form-control-lg rounded-2')); ?>
                <p>
        </div>

    </div>
    <?php echo form_submit('knop', 'Change');
echo form_close();
