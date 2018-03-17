<?php
// iedereen
if ($gebruiker == null) { // niet aangemeld
    echo divAnchor('login/inloggen', 'Login', 'class="inlogKnop"');
} else { // wel aangemeld
    switch ($gebruiker->soort) {
        case 'student': // gewone geregistreerde gebruiker
            echo divAnchor('product/bestel', 'Voorbeeld', 'class="menuKnop"');
            break;
        case 'docent': // administrator
            echo divAnchor('product/beheer', 'Producten beheren');
            echo divAnchor('admin/beheer', 'Gebruikers beheren');
            echo divAnchor('admin/configureer', 'Configureren');
            break;
    }
    echo divAnchor('login/uitloggen', 'Logout', 'class="inlogKnop"');
}
