<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('html');
    }

    public function index() {
        $data['titel'] = 'Welkom op de pagina voor de internationale dagen';
        $data['auteur'] = "<u>Kim M.</u> | Lorenzo M.| Arne V.D.P. | Eloy B. | Sander J.";
        
//        $this->load->model('paginaInhoud_model');
//        $data['paginaInhoud'] = $this->paginaInhoud_model->get();

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'main_menu');
        $this->template->load('main_master', $partials, $data);
    }
}
