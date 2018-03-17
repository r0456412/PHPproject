<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    // +----------------------------------------------------------
    // | TV Shop
    // +----------------------------------------------------------
    // | 2ITF - 201x-201x
    // +----------------------------------------------------------
    // | Admin Controller
    // |
    // +----------------------------------------------------------
    // | Thomas More
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();

        if (!$this->authex->isAangemeld()) {
            redirect('home/meldAan');
        } else {
            $gebruiker = $this->authex->getGebruikerInfo();
            if ($gebruiker->level < 5) {
                redirect('home/meldAan');
            }
        }
    }

    public function beheer() {
        $data['titel'] = 'Gebruikers beheren';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'admin_beheer_gebruiker',
            'voetnoot' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function configureer() {
        $data['titel'] = 'Configureren';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'admin_config',
            'voetnoot' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

}

/* End of file Admin.php */
/* Location: ./applications/tvshop/controllers/Admin.php */