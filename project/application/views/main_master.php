<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        
        <?php echo pasStylesheetAan("/css/main_style.css"); ?>
        <?php echo pasStylesheetAan("/css/login_style.css"); ?>
        <?php echo pasStylesheetAan("/css/admin_style.css"); ?>

        <title><?php echo $titel; ?></title>  
        
        <style>
            .admin{
                width: 250px;
                color: black ;
                margin: 15px;
            }
            a{
                text-decoration: none;
                text-align: center;
                
            }
            a:hover{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"id="navbar">
                <?php echo anchor( $link, toonAfbeelding("images/tm_logo.png", "height=50px"), 'class="navbar-brand"') ?>
                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>             
                <div class="collapse navbar-collapse justify-content-between">
                      <?php echo $menu?>           
                </div>
            </nav>  
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"id="navbar">
                <?php echo anchor( $link, toonAfbeelding("images/tm_logo.png", "height=50px"), 'class="navbar-brand"') ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item active text-white">
                                <?php echo $menu?>    
                            </li>
                        </ul>
                    </ul>
                    <div class="navbar-nav">
                        
                    </div>
                </div>
            </nav>
      </header>
        
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
        <?php echo anchor( $link, '' , 'class="fas fa-chevron-circle-left"') ?>

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
