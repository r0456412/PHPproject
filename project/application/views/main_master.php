<!DOCTYPE html>
<html lang="en">
    <head>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
                <?php echo $hoofding; ?>
            </header>

            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <h3><?php echo $titel; ?></h3>
                </div>
            </div>

            <!-- Page Features -->
            <?php if (isset($geenRand)) { ?>
                <div class="row text-center">
                    <?php echo $inhoud; ?>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-lg-12 hero-feature">
                        <div class="thumbnail" style="padding: 20px">
                            <div class="caption">
                                <p>
                                    <?php echo $inhoud; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>        
            <?php } ?>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright 201x-201x - Thomas More. Alle rechten voorbehouden</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

    </body>

</html>
