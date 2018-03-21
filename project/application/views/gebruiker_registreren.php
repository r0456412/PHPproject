<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
    $attributes = array('name' => 'mijnFormulier');
    echo form_open('gebruiker/registreer', $attributes);
    $geslachten= array("Man", "Woman");
    $landen = array("Belgium", "The Netherlands", "Sweden", "Russia", "Greece", "China", "England", "United States", "Italy", "Spain");
?>
<table>
    <tr>
        <td><?php echo form_label('Title:', 'titel'); ?></td>
        <td><?php echo form_input(array('name' => 'title', 'id' => 'titel', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Last name:', 'achternaam'); ?></td>
        <td><?php echo form_input(array('name' => 'last name', 'id' => 'achternaam', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('First name:', 'voornaam'); ?></td>
        <td><?php echo form_input(array('name' => 'first name', 'id' => 'voornaam', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Gender:', 'geslacht'); ?></td>
        <td><?php echo form_dropdownpro('gender', $geslachten, 'id', 'geslacht', '0'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('E-mail:', 'mail'); ?></td>
        <td><?php echo form_input(array('name' => 'email', 'id' => 'mail', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Password:', 'wachtwoord'); ?></td>
        <td><?php 
                $data = array('name' => 'password', 'id' => 'wachtwoord', 'size' => '30');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td><?php echo form_label('Institute:', 'instituut'); ?></td>
        <td><?php echo form_input(array('name' => 'institute', 'id' => 'instituut', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Field of study:', 'studiegebied'); ?></td>
        <td><?php echo form_input(array('name' => 'field of study', 'id' => 'studiegebied', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Position:', 'positie'); ?></td>
        <td><?php echo form_input(array('name' => 'position', 'id' => 'positie', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Biography:', 'biografie'); ?></td>
        <td><?php echo form_input(array('name' => 'biography', 'id' => 'biografie', 'size' => '255')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Contact:', 'contactpersoon'); ?></td>
        <td><?php echo form_input(array('name' => 'contact', 'id' => 'contactpersoon', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Phone number:', 'telefoonnummer'); ?></td>
        <td><?php echo form_input(array('name' => 'phone number', 'id' => 'telefoonnummer', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Address:', 'adres'); ?></td>
        <td><?php echo form_input(array('name' => 'address', 'id' => 'adres', 'size' => '30')); ?></td>
        <td><?php echo form_label('Nr.', 'nummer'); ?></td>
        <td><?php echo form_input(array('name' => 'nr', 'id' => 'nummer', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Zip code:', 'postcode'); ?></td>
        <td><?php echo form_input(array('name' => 'zip code', 'id' => 'postcode', 'size' => '30')); ?></td>
        <td><?php echo form_label('City:', 'stad'); ?></td>
        <td><?php echo form_input(array('name' => 'city', 'id' => 'stad', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Country:', 'land'); ?></td>
        <td><?php echo form_dropdownpro('country', $landen, 'id', 'land', '0'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_submit('knop', 'Send'); ?></td>
    </tr>
</table>
