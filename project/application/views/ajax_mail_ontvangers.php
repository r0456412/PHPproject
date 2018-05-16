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
echo '<p>Selected users</p>
    <textarea class="w-100" rows="5" readonly id="ontvangers" name="ontvangers">';
if(count($gebruikers) <= 1){
    echo $gebruikers->email;
}else{
    foreach($gebruikers as $gebruiker){
        echo $gebruiker->email . " &#13;&#10;";
    }
}
echo '</textarea>';
?>