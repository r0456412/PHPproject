<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Wishes
 * @brief Controller-klasse voor Wens
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de wens
 */

class Wishes extends CI_Controller {

        /**
         * Constructor
         */
    	public function __construct()
	{
            parent::__construct();
            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }

            $this->load->helper('form');
        }     
        
        /**
         * Toont de pagina waar de beheerder de wensen kan aanpassen, verwijderen en een nieuwe wens toevoegen
         * 
         * @see wish_model::getAllByWish()
         * @see wishes_beheren.php
         */
        public function beherenWishes()
	{
            $data['titel'] = 'Wishes beheren';
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'admin/index';
            $this->load->model('wish_model');
            $data['wishes'] = $this->wish_model->getAllByWish();
            
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'wishes_beheren',);

            $this->template->load('main_master', $partials, $data);
        }
        
        /**
         * Zorgt dat een aangepaste wens wordt geupdate in de database
         * 
         * @see wish_model::update()
         * @see gebruiker_melding.php
         */
        public function bewaar(){
            $this->load->model('wish_model');
            
            $wish = new stdClass();
            $wish->id = $this->uri->segment(3);
            $decode = urldecode($this->uri->segment(4));
            $wish->wish = $decode;
            //echo "Jan";
            //print_r($wish);
            
            $this->wish_model->update($wish);
            
            redirect('gebruiker/toonMeldingWijzigWens');
        }
        
        /**
         * Zorgt dat een wens wordt verwijdert uit de database
         * 
         * @see wish_model::delete()
         * @see gebruiker_melding.php
         */
         public function delete($id){
            $this->load->model('wish_model');
            
            $this->wish_model->delete($id);
            
            redirect('gebruiker/toonMeldingVerwijderWens');
        }
        
        /**
         * Zorgt dat een wens wordt toegevoed in de database in de database
         * 
         * @see wish_model::voegToe()
         * @see gebruiker_melding.php
         */
        public function add()
        {
            $this->load->model('wish_model');
            $wish = $this->input->post('nieuw');
            $soortantwoord = 3;
            $this->wish_model->voegToe($wish, $soortantwoord);
            
            redirect('gebruiker/toonMeldingNieuweWens');
        }
        
        
}

