<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Internationale dagen</title>
<!--        <link rel="stylesheet" href="../css/style.css">-->

        <style>
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                margin-bottom: 60px;
            }
            h3{
                margin-top: 50px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 60px;
                line-height: 60px; 
                background-color: #f5f5f5;
            }
        </style>
    </head>

    <body>
        <!-- Page Content -->
        <?php echo $hoofding; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?php echo $titel; ?></h3>
                </div>
            </div>
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
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <span class="text-muted"><?php echo $auteur; ?></span>
                <span>Team: 26</span>
            </div>
        </footer>
    </body>
</html>