<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishes extends CI_Controller {

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }     
        
        public function beherenWishes()
	{
            $data['titel'] = 'Wishes beheren';
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'home/admin';
            
            $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'wishes_beheren',
            'voetnoot' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }
        
        
}

