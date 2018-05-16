<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();

            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }
            
            $gebruiker = $this->authex->getGebruikerInfo();
            if($gebruiker->soort == "Gastspreker"){
                redirect('gebruiker/toonMeldingGeenToegangGastspreker');
            }

            
            $this->load->helper('form');
            $this->load->helper('notation');
        }
        public function index()
	{
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

        public function haalAjaxOp_Voorstellen(){
            $gastsprekerId = $this->input->get('id');
            $this->load->model('Gebruiker_model');
            $data['voorstellen'] = $this->Gebruiker_model->getVoorstelByUser($gastsprekerId);
            $this->load->view("ajax_user", $data);
        }

        public function haalAjaxOp_Voorstel(){
            $id = $this->input->get('id');
            $this->load->model('Gebruiker_model');
            $data['voorstel'] = $this->Gebruiker_model->getVoorstel($id);
            $this->load->view("ajax_voorsteldetail", $data);
        }

         public function haalAjaxOp_Wishes(){
            $gastsprekerId = $this->input->get('id');
            $this->load->model('Wish_model');
            $data['wishes'] = $this->Wish_model->getAllWithAntwoorden($gastsprekerId);
            $this->load->view("ajax_wishes", $data);
        }

        public function deleteUser($id){
            $this->load->model('Gebruiker_model');
            $this->Gebruiker_model->delete($id);

        }

        public function bewaar(){
            $this->load->model('Gebruiker_model');
            
            $user = new stdClass();
            $user->id = $this->uri->segment(3);
            $decode = urldecode($this->uri->segment(4));
            $user->voornaam = $decode;
            $user->achternaam = $decode;
            $user->email = $decode;
            //echo "Jan";
            //print_r($wish);
            
            $this->Gebruiker_model->update($user);
            
            redirect('admin/usersBeheren');
        }
        
}
