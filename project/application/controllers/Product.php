<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    // +----------------------------------------------------------
    // | TV Shop
    // +----------------------------------------------------------
    // | 2ITF - 201x-201x
    // +----------------------------------------------------------
    // | Product Controller
    // |
    // +----------------------------------------------------------
    // | Thomas More
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();
    }

    public function toonLijst() {
        $data['titel'] = 'Productenlijst';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'product_lijst',
            'voetnoot' => 'main_footer');
        
        $this->template->load('main_master', $partials, $data);
    }

    public function bestel() {
        if (!$this->authex->isAangemeld()) {
            redirect('home/meldAan');
        }

        $data['titel'] = 'Producten bestellen';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'product_bestel',
            'voetnoot' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function beheer() {
        if (!$this->authex->isAangemeld()) {
            redirect('home/meldAan');
        } else {
            $gebruiker = $this->authex->getGebruikerInfo();
            if ($gebruiker->level < 5) {
                redirect('home/meldAan');
            }
        }

        $data['titel'] = 'Producten beheren';
        $data['gebruiker'] = $this->authex->getGebruikerInfo();

        $partials = array('hoofding' => 'main_header', 
            'menu' => 'main_menu', 
            'inhoud' => 'product_beheer',
            'voetnoot' => 'main_footer');
        
        $this->template->load('main_master', $partials, $data);
    }

}

/* End of file Product.php */
/* Location: ./applications/tvshop/controllers/Product.php */