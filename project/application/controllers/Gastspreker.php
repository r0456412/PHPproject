<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Gastspreker
 * @brief Controller-klasse voor Gastspreker
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de gastspreker
 */
class Gastspreker extends CI_Controller {
        /**
         * Constructor hier wordt gecontroleerd of de gebruiker bevoegd is om deze functies te gebruiken.
         */
    	public function __construct()
	{
            parent::__construct();

            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }
            
            $gebruiker = $this->authex->getGebruikerInfo();
            if($gebruiker->soort == "Admin"){
                redirect('gebruiker/toonMeldingGeenToegangAdmin');
            }
            if($gebruiker->soort == "Docent"){
                redirect('gebruiker/toonMeldingGeenToegangDocent');
            }
            $this->load->helper('form');
            $this->load->helper('notation');
        
        }
        /**
         * Haalt informatie over de gebruiker op via de authex
         * en toont vervolgens de home pagina van de gastspreker 
         * via de view home_gastspreker.
         * 
         * @see home_gastspreker.php
         */
        public function index()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";

            $data['link'] = 'gastspreker/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_gastspreker');
            
            $this->template->load('main_master', $partials, $data);
	}  
        /**
         * Laat de pagina zien waar de gastspreker een voorstel om een sessie te geven kan indienen.
         * Dit doet hij via de view gastspreker_voorstelIndienen.php
         * 
         * @see gastspreker_voorstelIndienen.php
         */
        public function voorstel_indienen()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";

            $data['link'] = 'gastspreker/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'gastspreker_voorstelIndienen');
            
            $this->template->load('main_master', $partials, $data);
	}  
        /**
         * Zorgt ervoor dat het voorstel dat de gastspreker heeft ingediend
         * in de database wordt weggeschreven. Dit gebeurd via het voorstelIndienen_model.
         * Na het indienen krijgt de gebruiker een melding dat zijn voorstel is verstuurd.
         * Dit word weergegeven via de gebruiker controller / toonMeldingVoorstelIngediend.
         * 
         * @see voorstelIndienen_model::indienen()
         */
        public function voorstelVersturen()
        {    
            $this->load->model('voorstelIndienen_model');
            
            $voorstel = new stdClass();
            $gebruiker = new stdClass();
            
            $gebruiker = $this->authex->getGebruikerInfo();
            $voorstel->gastsprekerID = $gebruiker->id; 
            
            $voorstel->titel = $this->input->post('titel');
            $voorstel->tijdsschatting = $this->input->post('tijdsschatting');
            $voorstel->taal = $this->input->post('taal');
            $voorstel->samenvatting = $this->input->post('samenvatting');
            $voorstel->jaargangID = 1; 
            
            $this->voorstelIndienen_model->indienen($voorstel);
            
            redirect('gebruiker/toonMeldingVoorstelIngediend');
        }
        /**
         * Laat, via de view gastspreker_wishesDoorgeven.php, de pagina zien waar de gastspreker zijn wensen kan doorgeven.
         * Via het wish_model worden alle wensen waar hij een antwoord op moet geven opgehaald.
         * Als hij reeds heeft geantwoord op deze vragen worden ook deze opgehaald met dezelfde functie.
         * 
         * @see wish_model::getAllWithAntwoorden
         * @see gastspreker_wishesDoorgeven.php
         */
        public function wishesDoorgeven()
	{
            $this->load->model('wish_model');
            $this->load->model('wishesAntwoorden_model');
            
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['wishes'] = $this->wish_model->getAllWithAntwoorden($data['gebruiker']->id);

            $data['link'] = 'gastspreker/index';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'gastspreker_wishesDoorgeven');
            
            $this->template->load('main_master', $partials, $data);
	}  
        /**
         * Zorgt ervoor dat de ingevulden wensen van de gastspreker worden opgeslagen in de database.
         * De wensen haalt hij uit het wish_model. Nadat de antwoorden zijn opgeslagen,
         * krijgt de gastspreker een melding te zien. Dit gebeurd via de view gebruiker_melding (inhoud van deze melding via gebruiker/toonMeldingWishesOpgeslagen)
         */
        public function wishes_opslagen()
        {    
            $this->load->model('wish_model');
            $this->load->model('wishesAntwoorden_model');

            $antwoord = new stdClass();
            $wishes = $this->wish_model->getAllByWish(); 
            $gebruiker = $this->authex->getGebruikerInfo();
            
            for($i=1; $i <= count($wishes); $i++){
                $antwoord->gebruikerid = $gebruiker->id; 
                $antwoord->jaargangID = 1; 
                $antwoord->wishid = $this->input->post('wish'.$i);
                $antwoord->antwoord = $this->input->post('antwoord'.$i);
                $this->wishesAntwoorden_model->antwoordenIndienen($antwoord);
            }
            redirect('gebruiker/toonMeldingWishesOpgeslagen');
        }
        /**
         * Haalt aan de hand van de opgegeve datum alle informatie op voor het invullen van de planning en toont dit dan in de view ajax_gastspreker_planning.php
         * 

         * @see planning_model::get()
         * @see sessie_model::getByDatum()
         * @see lokaal_model::get()
         * @see gebruiker_model::get()
         * @see ajax_gastspreker_planning.php
         */
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
                $i++;
            };
            
            if (!empty($planning)){
                $data['voorstellen']=$voorstellen;
                $data['lokalen']=$lokalen;
                $data['gastsprekers']=$gastsprekers;
            }
            $data['planning']=$planningen;
            
            $this->load->view("ajax_gastspreker_planning",$data);
            
        }
        /**
         * Haalt informatie over de aangemelde gebruiker op via de authex, haalt de datums op via het datum model
         * en toont het resultaat in de view planning_gastspreker.php
         * 
         * @see authex::getGebruikerInfo()
         * @see Datum_model::get()
         * @see planning_gastspreker.php
         */
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
            $data['link'] = 'gastspreker/index';

            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning_gastspreker');
            
            $this->template->load('main_master', $partials, $data);
	}
}
