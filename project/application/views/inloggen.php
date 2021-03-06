<?php
/**
 * @file inloggen.php
 * 
 * View waar een gebruiker (docent, gastspreker of admin) zich kan inloggen
 * - Maakt gebruik van Boodstrap cards
 * - Maakt gebruik van een formulier om de opgegeven data door te sturen en te controleren
 * 
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3>Login here</h3>
                        </div>
                        <?php
                            $attributes = array('name' => 'inlogformulier');
                            echo form_open('login/inloggenControleren', $attributes);
                        ?>
                        <div class="card-body">
                                <div class="form-group">
                                    <?php echo form_label('Email:', 'email'); ?>
                                    <?php echo form_input(array('name' => 'email','type'=>'email', 'id' => 'email', 'size' => '30', 'class' => 'form-control form-control-lg rounded-2', 'required' => 'true')); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('Password', 'password'); ?></td>
                                    <?php 
                                        $data = array('name' => 'password', 'id' => 'password', 'size' => '30', 'class' => 'form-control form-control-lg rounded-2', 'required' => 'true', 'autocomplete="off"');
                                        echo form_password($data);
                                    ?>
                                </div>
                                <div>
                                    <input type="checkbox" class="custom-control-input">
                                    
                                    <?php echo anchor('gebruiker/wachtwoordVergeten', 'Password forgotten?'); ?>
                                </div>
                                <?php echo form_submit(array('name' => 'loginKnop', 'value' => 'Login', 'class' => 'btn btn-primary float-right inloggenKnop')); ?>
                            </form>
                        </div>
                        <?php echo form_close(); ?>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

