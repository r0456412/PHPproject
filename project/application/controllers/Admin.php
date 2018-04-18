<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
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

            $data['link'] = 'admin/index';

            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_admin');
            
            $this->template->load('main_master', $partials, $data);
	}  
	public function paginaInhoud_wijzigen()
	{
            $this->load->model('paginainhoud_model');
            
            $data['titel'] = 'Change page content';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['paginainhoud'] = $this->paginainhoud_model->get(1);
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'admin/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'paginaInhoud_wijzigen');
            
            $this->template->load('main_master', $partials, $data);
	}  

        public function paginaInhoud_opslaan()

	{
            $this->load->model('paginainhoud_model');
            
            $paginaInhoud = new stdClass();
            $paginaInhoud->hoofding1 = $this->input->post('hoofding1');
            $paginaInhoud->hoofding2 = $this->input->post('hoofding2');
            $paginaInhoud->inhoud1 = $this->input->post('inhoud1');
            $paginaInhoud->inhoud2 = $this->input->post('inhoud2');
            
            $this->paginainhoud_model->wijzig($paginaInhoud);
            
            redirect('admin/toonMeldingWijzgingSaved');
	}
        
        public function datums_wijzigen()
	{
            $this->load->model('datum_model');
            
            $data['titel'] = 'Change dates';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['datums'] = $this->datum_model->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'admin/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'datums_wijzigen');
            
            $this->template->load('main_master', $partials, $data);
	} 

        public function datums_opslaan()
	{
            $this->load->model('datum_model');
            
            $datum = new stdClass();
            $datum->datum = $this->input->post('dag1');

            $this->datum_model->wijzig($datum);
            
            redirect('admin/toonMeldingWijzgingSaved');
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
        
        public function toonMeldingWijzgingSaved(){
            $this->toonMelding('Saved changes',
                    'The changes are saved!',
                    array('url' => 'admin/index', 'tekst' => 'Home'));
        }
}
