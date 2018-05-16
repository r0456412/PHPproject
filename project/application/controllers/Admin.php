<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Admin
 * @brief Controller-klasse voor Admin
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de admin
 */
class Admin extends CI_Controller {
        /**
         * Constructor, hier wordt gecontroleerd of de gebruiker bevoegd is om deze functies te gebruiken
         */
    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');

            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }

            $gebruiker = $this->authex->getGebruikerInfo();
            if($gebruiker->soort == "Gastspreker"){
                redirect('gebruiker/toonMeldingGeenToegangGastspreker');
            }
            if($gebruiker->soort == "Docent"){
                redirect('gebruiker/toonMeldingGeenToegangDocent');
            }

            
            $this->load->helper('form');
            $this->load->helper('notation');

            if($gebruiker->soort == "Docent"){
                redirect('gebruiker/toonMeldingGeenToegangDocent');
            }
        }
        /**
         * Haalt informatie over de aangemelde gebruiker op via de authex
         * en toont het resultaat in de view home_admin.php
         * 
         * @see authex::getGebruikerInfo()
         * @see home_admin.php
         */
        public function index()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'admin/index';

            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_admin');
            
            $this->template->load('main_master', $partials, $data);
	}  
        /**
         * Haalt de pagina inhoud op via het paginainhoud_model 
         * en toont het resultaat in de view paginaInhoud_wijzigen.php
         * 
         * @see Paginainhoud_model::get()
         * @see paginaInhoud_wijzigen.php
         */
	public function paginaInhoud_wijzigen()
	{
            $this->load->model('paginainhoud_model');
            
            $data['titel'] = 'Change page content';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['paginainhoud'] = $this->paginainhoud_model->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'admin/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'paginaInhoud_wijzigen');
            
            $this->template->load('main_master', $partials, $data);
	}  
        /**
         * Zorgt voor het opslagen van de gewijzigde pagina inhoud. 
         * Dit gebeurd via het paginainhoud_model. Een gepersonaliseerde
         * booschap word weergegeven in de view gebruiker_melding.php (via de gebruiker controller / toonMeldingWijzgingSaved)
         * 
         * @see Paginainhoud_model::wijzig()
         * @see gebruiker_melding.php
         */
        public function paginaInhoud_opslaan()
	{
            $this->load->model('paginainhoud_model');
            
            $paginaInhoud = new stdClass();
            $paginaInhoud->hoofding1 = $this->input->post('hoofding1');
            $paginaInhoud->hoofding2 = $this->input->post('hoofding2');
            $paginaInhoud->inhoud1 = $this->input->post('inhoud1');
            $paginaInhoud->inhoud2 = $this->input->post('inhoud2');
            
            $this->paginainhoud_model->wijzig($paginaInhoud);
            
            redirect('gebruiker/toonMeldingWijzgingSaved');
	}
        /**
         * Haalt de datums van de internationale dagen op via het datum_model
         * en toont het resultaat in de view datums_wijzigen.php
         * 
         * @see Datum_model::get()
         * @see datums_wijzigen.php
         */
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
        /**
         * Zorgt ervoor dat de gewijzigde datums worden opgeslagen.
         * Dit gebeurd via het datum_model. Een gepersonaliseerde
         * booschap word weergegeven in de view gebruiker_melding.php (via de gebruiker controller / toonMeldingWijzgingSaved)
         * 
         * @see datum_model::wijzig()
         * @see gebruiker_melding.php
         */
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
            
            redirect('gebruiker/toonMeldingWijzgingSaved');
	}

        /**
         * Haalt de users op via het Gebruiker_model
         * en toont het resultaat in de view users_beheren.php
         * 
         * @see Gebruiker_model::getAllByNaam()
         * @see users_beheren.php
        */
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


        /**
         * Haalt aan de hand van de aangeduide user de voorstellen op van die user
         * en toont het resultaat in de view ajax_user
         * 
         * @see Gebruiker_model::getVoorstelByUser()
         * @see ajax_user.php
         */
        public function haalAjaxOp_Voorstellen(){
            $gastsprekerId = $this->input->get('id');
            $this->load->model('Gebruiker_model');
            $data['voorstellen'] = $this->Gebruiker_model->getVoorstelByUser($gastsprekerId);
            $this->load->view("ajax_user", $data);
        }


        /**
         * Haalt aan de hand van het aangeduide voorstel de details van dit voorstel
         * en toont het resultaat in de view ajax_voorsteldetail
         * 
         * @see Gebruiker_model::getVoorstel()
         * @see ajax_voorsteldetail.php
         */
        public function haalAjaxOp_Voorstel(){
            $id = $this->input->get('id');
            $this->load->model('Gebruiker_model');
            $data['voorstel'] = $this->Gebruiker_model->getVoorstel($id);
            $this->load->view("ajax_voorsteldetail", $data);
        }


        /**
         * Haalt aan de hand van de aangeduide user de wishes op van die user
         * en toont het resultaat in de view ajax_wishes
         * 
         * @see Wish_model::getVoorstelByUser()
         * @see ajax_wishes.php
         */
        public function haalAjaxOp_Wishes(){
            $gastsprekerId = $this->input->get('id');
            $this->load->model('Wish_model');
            $data['wishes'] = $this->Wish_model->getAllWithAntwoorden($gastsprekerId);
            $this->load->view("ajax_wishes", $data);
        }


        /**
         * Delete een user aan de hand van de id die wordt doorgegeven bij het klikken op de knop
         * en toont het resultaat in de view users_beheren
         * 
         * @see Gebruiker_model::delete()
         * @see users_beheren.php
         */
        public function deleteUser($id){
            $this->load->model('Gebruiker_model');
            $this->Gebruiker_model->delete($id);
            redirect('admin/usersBeheren');
        }


        /**
         * Past de email van de user aan bij het klikken op de 'Save'-knop
         * en toont het resultaat in de view users_beheren
         * 
         * @see Gebruiker_model::update()
         * @see users_beheren.php
         */
        public function bewaar(){
            $this->load->model('Gebruiker_model');
            
            $user = new stdClass();
            $user->id = $this->uri->segment(3);
            $decode = urldecode($this->uri->segment(4));
            $user->email = $decode;
            
            $this->Gebruiker_model->update($user);
            
            redirect('admin/usersBeheren');
        }
        
}
