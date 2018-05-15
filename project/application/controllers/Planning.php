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
            $this->load->helper('notation');
            
        }
        
	public function planning()
	{
            
            $this->load->model('datum_model');
            

            $data['titel'] = 'Planning';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $datums= $this->datum_model->get();
            $i=0;
           foreach ($datums as $datum) {
                $datums[$i]->datum =  zetOmNaarDDMMYYYY($datums[$i]->datum);
                
                $i++;
            }
            $data['datums'] = $datums;
            
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | <u>Sander J.</u>";
            $data['link'] = 'admin/index';

            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning_admin');
            
            $this->template->load('main_master', $partials, $data);
	}
	
        
        
        public function sessie_opslaan()

	{
            $this->load->model('sessie_model');

            $date= $this->input->post('datumid');
            $jaargang= $this->input->post('jaargang');
            $voorstellen= $this->input->post('voorstel');
            $lokalen= $this->input->post('lokaal');
            $tabelids= $this->input->post('tabelid');
            $sessieids = $this->input->post('sessieid');
            for($tr=0;$tr<=15;$tr++){
                if ($date==0) {
                    redirect('planning/toonMeldingVulDatumIn');
                }elseif($lokalen[$tr]==0 &&$voorstellen[$tr]!=0){
                    redirect('planning/toonMeldingGeenLokaal');
                }elseif($lokalen[$tr]!=0 &&$voorstellen[$tr]==0){
                    redirect('planning/toonMeldingGeenVoorstel');
                }elseif($lokalen[$tr]!=0 && $voorstellen[$tr]!=0){
                    if ($sessieids[$tr]==0) {
                        $sessie = new stdClass();
                        $sessie->datum = $date;
                        $sessie->lokaalid = $lokalen[$tr];
                        $sessie->voorstelid = $voorstellen[$tr];
                        $sessie->jaargangid = $jaargang;
                        $sessie->tabelid = $tabelids[$tr];
                        $this->sessie_model->wijzig($sessie);   
                    }else{
                        $sessie = new stdClass();
                        $sessie->datum = $date;
                        $sessie->lokaalid = $lokalen[$tr];
                        $sessie->voorstelid = $voorstellen[$tr];
                        $sessie->jaargangid = $jaargang;
                        $sessie->tabelid = $tabelids[$tr];
                        $sessie->id = $sessieids[$tr];
                        $this->sessie_model->update($sessie);}
                    }elseif($lokalen[$tr]==0 && $voorstellen[$tr]==0 && $sessieids[$tr]!=0){
                        $sessie = new stdClass();
                        $sessie->id = $sessieids[$tr];
                        $this->sessie_model->delete($sessie);
                    }
                
            
                
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
        
        public function haalAjaxOp_datum() {
            $datumId = $this->input->get('datumid');
            $this->load->model('sessie_model');
            $this->load->model('planning_model');
            $this->load->model('lokaal_model');
            $this->load->model('gebruiker_model');
            
            $planningen = $this->sessie_model->getByDatum($datumId);
            $i=0;
            foreach($planningen as $planning){
                $voorstellen[$i] = $this->planning_model->get($planning->voorstelid);
                $lokalen[$i] = $this->lokaal_model->get($planning->lokaalid);
                $gastsprekers[$i] = $this->gebruiker_model->get($voorstellen[$i]->gastsprekerID);
                $beschikbaarheidsessie = $this->gebruiker_model->get($planning[$i]->id);
                $i++;
            };
            $data['alleVoorstellen'] = $this->sessie_model->getVoorstel();
            $data['alleLokalen'] = $this->lokaal_model->getLokaal();
            if (!empty($planning)){
                $data['voorstellen']=$voorstellen;
                $data['lokalen']=$lokalen;
                $data['gastsprekers']=$gastsprekers;
            }
            $data['planning']=$planningen;
            
            
            $this->load->view("ajax_admin_planning",$data);
            
        }
}

