<?php 
/**
 * @file ajax_mail_livesearch.php
 * 
 * View waarin de gegevens van de gevonden gebruikers wordt weergegeven 
 * en wordt ingevoegd in de pagina mails_versturen.php
 * 
 * - Krijgt $gebruikers-object binnen
 * - Krijgt $leeg-variabele binnen
 */
if($leeg !== "yes"){
    if($gebruikers !== "geen resultaten" and $gebruikers !== ""){
        foreach($gebruikers as $gebruiker){
            echo '<p><a href="#" onclick="voegOntvangersToe('. $gebruiker->id .', 1);">' . $gebruiker->voornaam . " " . $gebruiker->achternaam .'</a></p>';
        }
    }
    if($partners !== "geen resultaten" and $partners !== ""){
        foreach($partners as $partner){
            echo '<p><a href="#" onclick="voegOntvangersToe('. $partner->id .', 2);">' . $partner->voornaam . " " . $partner->achternaam .'</a></p>';
        }
    }if($gebruikers == "geen resultaten" and $partners == "geen resultaten"){
        echo $gebruikers;
    }
}
?>