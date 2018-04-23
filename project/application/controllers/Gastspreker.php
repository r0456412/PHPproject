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

            $data['link'] = 'gastspreker/index';
            
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
        
        public function voorstelVersturen()
        {    
            $this->load->model('voorstelIndienen_model');
            
            $voorstel = new stdClass();
            $gebruiker = new stdClass();
            
            $gebruiker = $this->authex->getGebruikerInfo();
            $voorstel->gastsprekerID = $gebruiker->id; 
            
            $voorstel->titel = $this->input->post('titel');
            $voorstel->tijdsschatting = $this->input->post('tijdsschatting');
            $voorstel->taal = $this->input->post('taal');
            $voorstel->samenvatting = $this->input->post('samenvatting');
            $voorstel->jaargangID = 1; 
            
            $this->voorstelIndienen_model->indienen($voorstel);
            
            redirect('gebruiker/toonMeldingVoorstelIngediend');
        }
}
