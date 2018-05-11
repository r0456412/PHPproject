<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*! De Admin controller
 * Alle functies van de administrator worden hier gedefinieerd.
 */
class Admin extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
            /**
             * Controleert of de gebruiker is aangemeld.
             * Als hij niet is aangemeld wordt hij doorverwezen naar de inlog pagina.
             */
            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }
            /**
             * Controleert of de gebruiker iets anders is dan een admin.
             * Als dit het geval krijgt de gebruiker een foutboodschap te zien.
             * Dit gebeurd wanneer er een url van een admin word ingegeven tijdens dat een gastspreker is ingelogd.
             */
            $gebruiker = $this->authex->getGebruikerInfo();
            if($gebruiker->soort == "Gastspreker"){
                redirect('gebruiker/toonMeldingGeenToegangGastspreker');
            }
        }
        public function index()
	{
            /**
             * Weergeven van de index pagina van de admin.
             */
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['isAangemeld'] = $isAangemeld = $this->authex->isAangemeld();
            $data['link'] = 'admin/index';

            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_admin');
            
            $this->template->load('main_master', $partials, $data);
	}  
	public function paginaInhoud_wijzigen()
	{
            /**
             * Weergeven van de pagina waar de admin de inhoud van de home pagina kan wijzigen.
             */
            $this->load->model('paginainhoud_model');
            
            $data['titel'] = 'Change page content';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['paginainhoud'] = $this->paginainhoud_model->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'admin/index';
            $data['isAangemeld'] = $isAangemeld = $this->authex->isAangemeld();
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'paginaInhoud_wijzigen');
            
            $this->template->load('main_master', $partials, $data);
	}  

        public function paginaInhoud_opslaan()

	{
            /**
             * Opslagen van inhoud 
             */
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
            $data['isAangemeld'] = $isAangemeld = $this->authex->isAangemeld();
             
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'datums_wijzigen');
            
            $this->template->load('main_master', $partials, $data);
	} 

        public function datums_opslaan()
	{
            $this->load->model('datum_model');
            
            $datum1 = new stdClass();
            $datum2 = new stdClass();
            $datum3 = new stdClass();
            
            $datum1->datum = $this->input->post('dag1');
            $datum1->id = 1;
            $datum2->datum = $this->input->post('dag2');
            $datum2->id = 2;
            $datum3->datum = $this->input->post('dag3');
            $datum3->id = 3;

            $this->datum_model->wijzig($datum1);
            $this->datum_model->wijzig($datum2);
            $this->datum_model->wijzig($datum3);
            
            redirect('admin/toonMeldingWijzgingSaved');
	}

        public function toonMelding($titel, $boodschap, $link = null)
	{
            $data['titel'] = $titel;
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['boodschap'] = $boodschap;
            $data['link'] = $link;
            $data['isAangemeld'] = $isAangemeld = $this->authex->isAangemeld();
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'gebruiker_melding',);
            $this->template->load('main_master', $partials, $data);   
        }
        
        public function toonMeldingWijzgingSaved(){
            $this->toonMelding('Saved changes',
                    'The changes are saved!',
                    array('url' => 'admin/index', 'tekst' => 'Home'));
        }

        public function usersBeheren()
        {
            $data['titel'] = 'Manage Users';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | Sander J.";
            $data['link'] = 'admin/index';
            $data['isAangemeld'] = $isAangemeld = $this->authex->isAangemeld();
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
            $this->load->model('Gebruiker_model');
            $data['users'] = $this->Gebruiker_model->getAllByNaam();

            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'users_beheren',);
            $this->template->load('main_master', $partials, $data);  
        }

        public function haalAjaxOp_Voorstel(){
            $gastsprekerId = $this->input->get('gastsprekerId');
            $this->load->model('Gebruiker_model');
            $data['voorstel'] = $this->Gebruiker_model->getVoorstelByUser($gastsprekerId);
            $this->load->view("ajax_user", $data);
        }

        
}
