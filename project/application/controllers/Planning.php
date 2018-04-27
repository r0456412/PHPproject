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
                if ($date==0) {
                    redirect('planning/toonMeldingVulDatumIn');
                }elseif($lokalen[$tr]==0 &&$voorstellen[$tr]!=0){
                    redirect('planning/toonMeldingGeenLokaal');
                }elseif($lokalen[$tr]!=0 &&$voorstellen[$tr]==0){
                    redirect('planning/toonMeldingGeenVoorstel');
                }elseif($lokalen[$tr]!=0 && $voorstellen[$tr]!=0){
                $sessie = new stdClass();
                $sessie->datum = $date;
                $sessie->lokaalid = $lokalen[$tr];
                $sessie->voorstelid = $voorstellen[$tr];
                $sessie->jaargangid = $jaargang;
                $sessie->tabelid = $tabelids[$tr];
                $this->sessie_model->wijzig($sessie);}
            }
                
            
            
            redirect('planning/planningOpgeslagen');
           
            
	}
        public function toonMelding($titel, $boodschap, $link = null)
	{
            $data['titel'] = $titel;
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['boodschap'] = $boodschap;
            $data['link'] = $link;
            
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'gebruiker_melding',);
            $this->template->load('main_master', $partials, $data);   
        }
        public function toonMeldingVulDatumIn(){
            $this->toonMelding('Error',
                    'Gelieve een datum in te vullen.',
                    array('url' => 'planning/planning', 'tekst' => 'Back'));
        }
        public function planningOpgeslagen(){
            $this->toonMelding('Error',
                    'De planning is succesvol opgeslagen.',
                    array('url' => 'planning/planning', 'tekst' => 'Back'));
        }
        public function toonMeldingGeenLokaal(){
            $this->toonMelding('Error',
                    'De planning is niet opgeslagen. Er is een lezing ingevult maar geen lokaal. Gelieve een lokaal in te vullen als u ook een lezing invult.',
                    array('url' => 'planning/planning', 'tekst' => 'Back'));
        }
        public function toonMeldingGeenVoorstel(){
            $this->toonMelding('Error',
                    'De planning is niet opgeslagen. Er is een lokaal ingevult maar geen voorstel. Gelieve een voorstel in te vullen als u ook een lokaal invult.',
                    array('url' => 'planning/planning', 'tekst' => 'Back'));
        }
}

