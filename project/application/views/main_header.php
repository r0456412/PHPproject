<?php
/**
 * @file main_header.php
 * 
 * De view die ervoor zorgt dat er op elke pagina dezelfde header te zien is
 * 
 */
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php echo toonAfbeelding('images/tm_logo.png', 'width=200px'); ?>
    <a class="navbar-brand" href="index.html">International Days</a>
    <div class="collapse navbar-collapse justify-content-between" id="navbar1">
        <ul class="navbar-nav"><?php echo DivAnchor('home/meldAan', 'Inloggen'); ?></ul>
        
    </div>
</nav>