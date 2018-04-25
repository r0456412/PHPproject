<?php
// iedereen
if ($gebruiker == null) { // niet aangemeld
    echo divAnchor('login/inloggen', 'Login', 'class="inlogKnop"');
} else { // wel aangemeld
    echo divAnchor('login/uitloggen', 'Logout', 'class="inlogKnop"');
}
    

