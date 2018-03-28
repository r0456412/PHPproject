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
            ?>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>

<?php
//            echo divAnchor('product/beheer', 'Settings');
//            echo divAnchor('admin/beheer', 'Gebruikers beheren');
//            echo divAnchor('admin/configureer', 'Configureren');
//            break;
    }
    echo divAnchor('login/uitloggen', 'Logout', 'class="inlogKnop"');
}
