<?php 
/**
 * @file ajax_mail_ontvangers.php
 * 
 * View waarin de gegevens van de geselecteerde gebruikers wordt weergegeven 
 * en wordt ingevoegd in de pagina mails_versturen.php
 * 
 * - Krijgt $sjabloon-object binnen
 * - Krijgt $new-variabele binnen
 */
if(count($gebruikers) <= 1){
    echo $gebruikers->email . " &#13;&#10;";
}else{
    foreach($gebruikers as $gebruiker){
        echo $gebruiker->email . " &#13;&#10;";
    }
}
?>