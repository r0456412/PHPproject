<?php
if ($gebruiker != null) {
    echo '<b>' . $gebruiker->voornaam . '</b>';
}
?>

<div>
    <h1>
        <?php echo $paginainhoud->hoofding1 ?>
    </h1>
</div>
<div>
    <?php echo toonAfbeelding('images/thomasmore.jpg', 'class') ?>
</div>
<div>
    <h5>
        <?php echo $paginainhoud->hoofding2 ?>
    </h5>
</div>
<div>
    <?php echo toonAfbeelding('images/thomasmore.jpg', 'class=homepageImage') ?>
</div>
<div>
    <p>
        <?php echo $paginainhoud->inhoud1 ?>
    <p>
</div>
<div>
    <p>
        <?php echo $paginainhoud->inhoud2 ?>
    <p>
</div>