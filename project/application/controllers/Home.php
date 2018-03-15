<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('html');
        $this->load->helper('form');
    }

    public function index() {
        $data['titel'] = 'Welkom op de pagina voor de internationale dagen';
        $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
        
//        $this->load->model('paginaInhoud_model');
//        $data['paginaInhoud'] = $this->paginaInhoud_model->get();

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'main_menu');
        $this->template->load('main_master', $partials, $data);
    }
    
    public function meldAan(){
        $data['titel'] = 'Aanmelden';
     
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'inloggen');
            
        $this->template->load('main_master', $partials, $data);
        }
}
