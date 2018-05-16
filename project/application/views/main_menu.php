<?php
/**
 * @file main_menu.php
 * 
 * View die zorgt dat de inlogknop een uitlogknop wordt
 * indien nodig en omgekeerd.
 * - Krijgt $gebruiker-object binnen
 */
?>

<?php
if ($gebruiker == null) { // niet aangemeld
    echo divAnchor('login/inloggen', 'Login', 'class="inlogKnop"');
} else { // wel aangemeld
    echo divAnchor('login/uitloggen', 'Logout', 'class="inlogKnop"');
}
    

