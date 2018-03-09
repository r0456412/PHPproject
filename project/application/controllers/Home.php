<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['titel'] = 'Lessen';
        $data['geenRand'] = true;      // geen extra rand rond hoofdmenu

        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'main_menu');
        $this->template->load('main_master', $partials, $data);
    }

}
