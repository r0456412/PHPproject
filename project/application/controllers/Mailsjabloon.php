<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Mailsjabloon
 * @brief Controller-klasse voor Mailsjabloon
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de mailsjablonen
 */
class Mailsjabloon extends CI_Controller {
    
    /**
     * * Constructor
     */
    public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }
        /**
         * Toont de pagina waar de administrator de mailsjablonen kan beheren. 
         * Dit wordt getoond in de view mailsjabloon_beheren.php.
         * 
         * @see mailsjabloon_beheren.php
         */
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
        /**
         * Deze AJAX methode zorgt ervoor dat de gegevens van het geselecteerde mailsjabloon op de pagina 
         * mailsjabloon_beheren.php kunnen worden geladen. Deze gegevens worden op de pagina
         * geladen door middel van de pagina ajax_mailsjabloon_beheren.php
         * 
         * @see mailsjabloon_beheren.php
         * @see ajax_mailsjabloon_beheren.php
         */
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
        /**
         * Zorgt ervoor dat de gegevens van het mailsjabloon in de database worden opgeslagen.
         * Deze methode maakt gebruik van het model mailsjabloon_model.php en kiest de juiste functie
         * op basis van de parameters.
         * Laat na uitvoering een melding zien via de methode gebruiker/toonMeldingWijzigingSaved.
         * 
         * @see mailsjabloon_beheren.php
         * @see mailsjabloon_model::updateSjabloon()
         * @see mailsjabloon_model::voegSjabloonToe()
         * @see gebruiker.php
         */
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
            redirect('gebruiker/toonMeldingWijzgingSaved');
        }
        /**
         * Verwijderd het geselecteerde mailsjabloon uit de database met de functie mailsjabloon_model/verwijderSjabloon();
         * Laat na uitvoering een melding zien via de methode gebruiker/toonMeldingWijzigingSaved.
         * 
         * @see mailsjabloon_beheren.php
         * @see mailsjabloon_model::verwijderSjabloon()
         * @see gebruiker.php
         */
        public function mailsjabloonVerwijder(){
            $this->load->model('mailsjabloon_model');
            $onderwerp = $this->input->post('mailsjablonen');
            $this->mailsjabloon_model->verwijderSjabloon($onderwerp);
            
            redirect('gebruiker/toonMeldingWijzgingSaved');
        }
        
}
?>
