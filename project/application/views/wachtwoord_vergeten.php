<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3>Forgot Password?</h3>
                        </div>
                        <?php
                            $attributes = array('name' => 'wachtwoordVergeten');
                            echo form_open('login/wachtwoordOpvragen', $attributes);
                        ?>
                        <div class="card-body">
                        <p>Enter your email here.</p>
                            <div class="panel-body">
                                <div class="form-group">
                                    <?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30', 'placeholder' => 'email adress', 'class' => 'form-control', 'required' => 'true')); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_submit(array('name' => 'uitlogKnop', 'value' => 'Send My Password', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
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