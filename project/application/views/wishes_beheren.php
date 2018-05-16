<?php
/**
 * @file wishes_beheren.php
 * 
 * View die de administrator te zien krijgt nadat hij/zij op de knop Manage Wishes in de homepagina van de admin klikt
 * - Maakt gebruik van jquery om een wens aan te passen
 * - Maakt gebruik van een formulier om een nieuwe wens toe te voegen
 */
$attributes = array('name' => 'mijnFormulier');
?>
<h1>Wishes beheren</h1>
<table>
    <?php
    foreach ($wishes as $wens) {
        
        echo '<tr><td>';
        echo form_input(array('name' => 'w'.$wens->id, 'id' => 'w'.$wens->id, 'value' => $wens->wish, 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));
        echo '</td><td>';
        echo form_submit('save', 'Save', "class='knop btn btn-success' id='". $wens->id."'");
        echo '</td><td>';
        echo anchor ('wishes/delete/'.$wens->id,'Delete', "class='btn btn-danger' style='margin-bottom:20px'");
        echo '</td></tr>';
        
    }
    echo form_open('wishes/add', $attributes);
    echo '<tr><td>';
    echo form_input(array('name' => 'nieuw', 'id' => 'wish', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));
    echo '</td><td>';
    echo form_submit('add', 'Add');
    echo '</td></tr>';
    echo form_close();
    ?>
</table>

<script>
$(document).ready(function(){
    $(".knop").click(function(){
        var id = $(this).attr('id');
        var wens = $("#w" + id).val();
        var encoded = escape(wens);
        window.location.href = '/PHPproject/project/index.php/wishes/bewaar/' + id + '/' + encoded;
    });
});
</script>

