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
    $geslachten= array("Man"=>"Man", "Woman"=>"Woman");
    $landen = array("Belgium"=>"Belgium", "The Netherlands"=>"The Netherlands", "Sweden"=>"Sweden", "Russia"=>"Russia", "Greece"=>"Greece", "China"=>"China", "England"=>"England", "United States"=>"United States", "Italy"=>"Italy", "Spain"=>"Spain");
?>
<table>
    <tr>
        <td><?php echo form_label('Title:', 'titel'); ?></td>
        <td><?php echo form_input(array('name' => 'title', 'id' => 'titel', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Last name:', 'achternaam'); ?></td>
        <td><?php echo form_input(array('name' => 'last_name', 'id' => 'achternaam', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('First name:', 'voornaam'); ?></td>
        <td><?php echo form_input(array('name' => 'first_name', 'id' => 'voornaam', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Gender:', 'geslacht'); ?></td>
        <td><?php echo form_dropdown('gender', $geslachten, '', 'id="geslacht" class="form-control form-control-lg rounded-2"'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('E-mail:', 'mail'); ?></td>
        <td><?php echo form_input(array('name' => 'email','type'=>'email', 'id' => 'mail', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Password:', 'wachtwoord'); ?></td>
        <td><?php 
                $data = array('name' => 'password', 'id' => 'wachtwoord', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required'=>'true');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td><?php echo form_label('Institute:', 'instituut'); ?></td>
        <td><?php echo form_input(array('name' => 'institute', 'id' => 'instituut', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Field of study:', 'studiegebied'); ?></td>
        <td><?php echo form_input(array('name' => 'field_of_study', 'id' => 'studiegebied', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Position:', 'positie'); ?></td>
        <td><?php echo form_input(array('name' => 'position', 'id' => 'positie', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Biography:', 'biografie'); ?></td>
        <td><?php echo form_textarea(array('name' => 'biography', 'id' => 'biografie', 'rows'=>'5', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Contact:', 'contactpersoon'); ?></td>
        <td><?php echo form_input(array('name' => 'contact', 'id' => 'contactpersoon', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Phone number:', 'telefoonnummer'); ?></td>
        <td ><?php echo form_input(array('name' => 'phone_number', 'id' => 'telefoonnummer', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Address:', 'adres'); ?></td>
        <td><?php echo form_input(array('name' => 'address', 'id' => 'adres', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Zip code:', 'postcode'); ?></td>
        <td><?php echo form_input(array('name' => 'zip_code', 'id' => 'postcode', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Country:', 'land'); ?></td>
        <td><?php echo form_dropdown('country', $landen, '', 'id="land" class="form-control form-control-lg rounded-2"'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_submit('knop', 'Send'); ?></td>
    </tr>
</table>
