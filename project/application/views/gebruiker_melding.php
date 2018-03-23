<?php

?>

<p> <?php echo $boodschap; ?> </p>

<?php if ($link != null){
    echo divAnchor($link["url"], $link["tekst"]);
}

