<?php

// +----------------------------------------------------------
// | TV Shop
// +----------------------------------------------------------
// | 2ITF - 201x-201x
// +----------------------------------------------------------
// | Registreren
// |
// +----------------------------------------------------------
// | Thomas More
// +----------------------------------------------------------

?>

<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('gebruiker/registreer', $attributes);
?>
<table>
    <tr>
        <td><?php echo form_label('Naam:', 'naam'); ?></td>
        <td><?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('E-mail:', 'email'); ?></td>
        <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Wachtwoord:', 'wachtwoord'); ?></td>
        <td><?php 
                $data = array('name' => 'wachtwoord', 'id' => 'wachtwoord', 'size' => '30');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td><?php echo form_label('Wachtwoord (herhaal):', 'wachtwoord'); ?></td>
        <td><?php 
                $data = array('name' => 'tweedeWachtwoord', 'id' => 'tweedeWachtwoord', 'size' => '30');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('knop', 'Verzenden'); ?></td>
    </tr>
</table>