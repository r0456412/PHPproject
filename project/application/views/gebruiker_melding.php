<?php
if ($gebruiker != null) {
    echo '<h2>Hey ' . $gebruiker->voornaam . ',</h2><br><h5>' .$boodschap .'</h5><br>';
}
?>

<?php if ($link != null){
    echo divAnchor($link["url"], $link["tekst"]);
}

