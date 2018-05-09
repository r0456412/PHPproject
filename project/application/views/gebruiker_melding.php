<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <?php
                                    if ($gebruiker != null) {
                                        echo '<h2>Hey ' . $gebruiker->voornaam . '</h2>';
                                    }else{
                                        echo '<h2>Hey user</h2>';
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-10">
                                            <?php
                                                if ($gebruiker != null) {
                                                    echo '<p>' .$boodschap .'</p><br>';
                                                }else{
                                                    echo '<p>' .$boodschap .'</p><br>';
                                                }
                                            ?>
                                        </div>
                                    </div>  
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <?php if ($link != null){
                                                echo divAnchor($link["url"], $link["tekst"], 'class="btn btn-primary terugKnop"');
                                            }
                                            ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>