<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gastspreker extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();

            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }

            $this->load->helper('form');
        }
        public function index()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";

            $data['link'] = 'gastpreker/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_gastspreker');
            
            $this->template->load('main_master', $partials, $data);
	}  
        public function voorstel_indienen()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";

            $data['link'] = 'gastpreker/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'gastspreker_voorstelIndienen');
            
            $this->template->load('main_master', $partials, $data);
	}  
}
