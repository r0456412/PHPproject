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
            $this->load->model('sessie_model');
            $this->load->model('lokaal_model');
            $this->load->model('datum_model');
            

            $data['titel'] = 'Planning';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['voorstellen'] = $this->sessie_model->getVoorstel();
            $data['lokalen'] = $this->lokaal_model->getLokaal();
            $data['datums'] = $this->datum_model->get();
            
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | <u>Sander J.</u>";
            $data['link'] = 'admin/index';

            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning');
            
            $this->template->load('main_master', $partials, $data);
	}
	
        
        
        public function sessie_opslaan()

	{
            $this->load->model('sessie_model');
            
            
           
            
            
            
            $date= $this->input->post('datum');
            $jaargang= $this->input->post('jaargang');
            $voorstellen= $this->input->post('voorstel');
            $lokalen= $this->input->post('lokaal');
            $tabelids= $this->input->post('tabelid');
            for($tr=0;$tr<=15;$tr++){
                $sessie = new stdClass();
                $sessie->datum = $date;
                $sessie->lokaalid = $lokalen[$tr];
                $sessie->voorstelid = $voorstellen[$tr];
                $sessie->jaargangid = $jaargang;
                $sessie->tabelid = $tabelids[$tr];
                $this->sessie_model->wijzig($sessie);
            }
            
            
            
            redirect('planning/planning');
            
	}
}

