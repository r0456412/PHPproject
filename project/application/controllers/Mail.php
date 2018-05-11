
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {
    
    
    public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }
        
        public function mail()
	{
            $this->load->model('mailsjabloon_model');
            $this->load->model('gebruiker_model');
            $data['titel'] = 'Send mails';
            $data['auteur'] = "<u>Lorenzo M.</u>| Arne V.D.P. | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['link'] = 'admin/index';
            
            $data['sjablonen'] = $this->mailsjabloon_model->getSjablonen();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu', 'inhoud' => 'mails_versturen');
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
            
            $this->load->view("ajax_mail_versturen",$data);
	}
        
        public function mailusersAjax()
	{
            $this->load->model('gebruiker_model');
            $zoekstring = $this->input->get('zoekstring');
//            print_r($zoekstring);
            if($zoekstring !== ""){
                $data['gebruikers'] = $this->gebruiker_model->getGebruikerOpNaam($zoekstring);
                $data['leeg'] = "no";
//                print_r($this->gebruiker_model->getGebruikerOpNaam($zoekstring));
            }else{
                $data['leeg'] = "yes";
            }
           $this->load->view("ajax_mail_livesearch",$data);
	}
        
        public function mailOntvangersAjax()
	{
            $this->load->model('gebruiker_model');
            $type = $this->input->get('type');
            $users = $this->input->get('users');
            if($type == "1"){
                $data['gebruikers'] = $this->gebruiker_model->get($users);
            }else{
                
            }
           $this->load->view("ajax_mail_ontvangers",$data);
	}
}
?>