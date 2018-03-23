<?php
// iedereen
if ($gebruiker == null) { // niet aangemeld
    echo divAnchor('login/inloggen', 'Login', 'class="inlogKnop"');
} else { // wel aangemeld
    switch ($gebruiker->soort) {
        case 'student': // gewone geregistreerde gebruiker
            echo divAnchor('product/bestel', 'Planning raadplegen', 'class="menuKnop"');
            break;
        case 'Admin': // administrator
            echo divAnchor('product/beheer', 'Settings');
            echo divAnchor('admin/beheer', 'Gebruikers beheren');
            echo divAnchor('admin/configureer', 'Configureren');
            break;
    }
    echo divAnchor('login/uitloggen', 'Logout', 'class="inlogKnop"');
}
