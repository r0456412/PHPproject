
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailsjabloon extends CI_Controller {
    
    
    public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }
        
        public function mailsjabloon()
	{
            $this->load->model('mailsjabloon_model');
            $data['titel'] = 'Mailsjablonen beheren';
            $data['auteur'] = "<u>Lorenzo M.</u>| Arne V.D.P. | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['link'] = 'admin/index';
            
            $data['sjablonen'] = $this->mailsjabloon_model->getSjablonen();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu', 'inhoud' => 'mailsjabloon_beheren');
            $this->template->load('main_master', $partials, $data);
	}
        public function mailsjabloonAjax()
	{
            $this->load->model('mailsjabloon_model');
            $onderwerp = $this->input->get('onderwerp');
            
            $data['sjabloon'] = $this->mailsjabloon_model->getSjabloon($onderwerp);
            
            $this->load->view("ajax_mailsjabloon_beheren",$data);
	}
        
        public function mailsjabloonOpslaan(){
            $this->load->model('mailsjabloon_model');
            
            $mailsjabloon = new stdClass();
            
            $mailsjabloon->onderwerp = $this->input->post('newName');
            $mailsjabloon->inhoud = $this->input->post('mailsjabloon');
            $mailsjabloon->oudOnderwerp = $this->input->post('mailsjablonen');

            $this->mailsjabloon_model->updateSjabloon($mailsjabloon);
            $this->datum_model->wijzig($datum2);
            $this->datum_model->wijzig($datum3);
            
            redirect('admin/toonMeldingWijzgingSaved');
        }
        
}
?>
