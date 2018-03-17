<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <?php echo pasStylesheetAan("/css/main_style.css"); ?>
        <?php echo pasStylesheetAan("/css/login_style.css"); ?>


        <title><?php echo $titel; ?></title>  
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"id="navbar">
                <?php echo anchor('home', toonAfbeelding("images/tm_logo.png", "height=50px"), 'class="navbar-brand"') ?>
                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>             
                <div class="collapse navbar-collapse justify-content-between">
                      <?php echo $menu?>           
                </div>
            </nav>  
            
      </header>

        <!-- Page Content -->
        <div class="container">
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
                <div class="row">
                    <span class="mr-auto"><?php echo $auteur; ?></span>
                    <span>Team 26 T. Van Echepoel</span>
                </div>
            </div>
        </footer>
    </body>
</html>