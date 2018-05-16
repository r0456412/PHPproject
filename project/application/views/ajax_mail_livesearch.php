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
    if($gebruikers !== "geen resultaten"){
        foreach($gebruikers as $gebruiker){
            echo '<p><a href="#" onclick="voegOntvangersToe('. $gebruiker->id .', 1);">' . $gebruiker->voornaam . " " . $gebruiker->achternaam .'</a></p>';
            //echo 'er zijn gebruikers gevonden';
            //echo $gebruiker->voornaam . " " . $gebruiker->achternaam;
        }
    }else{
        echo $gebruikers;
    }
    
}
?>