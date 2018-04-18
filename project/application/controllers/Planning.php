<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planning extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();
            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->helper('form');
            
        }
        
	public function planning()
	{
            $this->load->model('planning_model');
            $this->load->model('lokaal_model');
            $this->load->model('datum_model');
            
            $data['titel'] = 'Planning';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['voorstellen'] = $this->planning_model->getVoorstel();
            $data['lokalen'] = $this->lokaal_model->getLokaal();
            $data['datums'] = $this->datum_model->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | <u>Sander J.</u>";
            $data['link'] = 'admin/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning');
            
            $this->template->load('main_master', $partials, $data);
	}
	public function voorstel()
	{
            $data['titel'] = 'Planning';
            $data['gebruiker']  = $this->authex->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | <u>Sander J.</u>";

            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning');

            $this->template->load('main_master', $partials, $data);
	}
}

?>

