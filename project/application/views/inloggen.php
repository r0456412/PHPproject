<?php

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
                                    <?php echo form_label('E-mail:', 'email'); ?>
                                    <?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30', 'class' => 'form-control form-control-lg rounded-2', 'required' => 'true')); ?>
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
                                    <span class="custom-control-indicator"></span>
                                    <?php echo anchor('gebruiker/wachtwoordVergeten', 'Password forgotten?'); ?>
                                </div>
                                <?php echo form_submit(array('name' => 'loginKnop', 'value' => 'Login', 'class' => 'btn btn-primary btn-lg float-right loginKnop')); ?>
                            </form>
                        </div>
                        <?php echo form_close(); ?>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

