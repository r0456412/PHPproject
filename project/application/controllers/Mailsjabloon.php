
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
            $data['titel'] = 'Manage templates';
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
            if($onderwerp == "New"){
                $data['new'] = "yes";
            }else{
                $data['sjabloon'] = $this->mailsjabloon_model->getSjabloon($onderwerp);
                $data['new'] = "no";
            }
            
            $this->load->view("ajax_mailsjabloon_beheren",$data);
	}
        
        public function mailsjabloonOpslaan(){
            $this->load->model('mailsjabloon_model');
            
            $mailsjabloon = new stdClass();
            
            $mailsjabloon->onderwerp = $this->input->post('newName');
            $mailsjabloon->inhoud = $this->input->post('mailsjabloon');
            $mailsjabloon->oudOnderwerp = $this->input->post('mailsjablonen');

            if($mailsjabloon->oudOnderwerp == "New"){
                $this->mailsjabloon_model->voegSjabloonToe($mailsjabloon);
            }else{
                $this->mailsjabloon_model->updateSjabloon($mailsjabloon);
            }
            redirect('admin/toonMeldingWijzgingSaved');
        }
        
        public function mailsjabloonNieuw(){
            $this->load->model('mailsjabloon_model');
            $onderwerp = $this->input->post('newName');
            $inhoud = $this->input->post('mailsjabloon');
            $this->mailsjabloon_model->voegSjabloonToe($onderwerp, $inhoud);
            
            redirect('admin/toonMeldingWijzgingSaved');
        }
        
        public function mailsjabloonVerwijder(){
            $this->load->model('mailsjabloon_model');
            $onderwerp = $this->input->post('mailsjablonen');
            $this->mailsjabloon_model->verwijderSjabloon($onderwerp);
            
            redirect('admin/toonMeldingWijzgingSaved');
        }
        
}
?>
