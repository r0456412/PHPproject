<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Mail
 * @brief Controller-klasse voor Mail
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de mails
 */
class Mail extends CI_Controller {
        /**
         * Constructor
         */
        public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }
        /**
         * Toont de pagina waar de admin mails kan versturen naar andere gebruikers.
         * Dit wordt getoond in de pagina mails_versturen.php
         * 
         * @see mails_versturen.php
         */
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
        /**
         * Stuurt een mail naar het opgegeven mailadres met bijhorende tekst en onderwerp.
         * 
         * @param $geadresseerde Het mailadres van de ontvanger
         * @param $boodschap De inhoud van de mail
         * @param $titel het onderwerp van de mail
         * @see gebruiker_melding.php
         */
        private function stuurMail ($geadresseerde, $boodschap, $titel)
        {
            $this->load->library('email');
            
            $this->email->from('phpteam26@gmail.com');
            $this->email->to($geadresseerde);
            $this->email->subject($titel);
            $this->email->message($boodschap);
            
            if (!$this->email->send()) {
                show_error($this->email->print_debugger());
                return false;
            } else{
                return true;
            }
        }
        /**
         * Deze AJAX methode zorgt ervoor dat de gegevens van het geselecteerde mailsjabloon op de pagina 
         * mails_versturen.php kunnen worden geladen. Deze gegevens worden op de pagina
         * geladen door middel van de pagina ajax_mail_versturen.php
         * 
         * @see mails_versturen.php
         * @see ajax_mail_versturen.php
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
            
            $this->load->view("ajax_mail_versturen",$data);
	}
        /**
         * Zoekt gebruikers op naam en voornaam in de tabel Gebruiers op basis van de gegeven zoekstring.
         * Indien deze string leeg is wordt er niet in de database gezocht.
         * 
         * @param $zoekstring De string ingegeven door de gebruiker
         * @see gebruiker_melding.php
         */
        public function mailusersAjax()
	{
            $this->load->model('gebruiker_model');
            $this->load->model('partner_model');
            $zoekstring = $this->input->get('zoekstring');
            if($zoekstring !== ""){
                $data['gebruikers'] = $this->gebruiker_model->getGebruikerOpNaam($zoekstring);
                $data['partners'] = $this->partner_model->getPartnerOpNaam($zoekstring);
                $data['leeg'] = "no";
            }else{
                $data['leeg'] = "yes";
            }
           $this->load->view("ajax_mail_livesearch",$data);
	}
        /**
         * Deze AJAX methode zorgt ervoor dat er gebruikers worden toegevoegd aan de ontvangers op 
         * de pagina mails_versturen.php. Indien er 1 gebruiker is wordt de functie gebruiker/get() gebruikt,
         * bij meerdere gebruikers wordt de functie gebruiker/getGebruikersByFunction() gebruikt.
         * Deze gegevens worden op de pagina geladen door middel van de pagina ajax_mail_ontvangers.php
         * 
         * @see mails_versturen.php
         * @see ajax_mail_versturen.php
         * @see gebruiker_model::get($id)
         * @see gebruiker_model::getGebruikersByFunction($soort)
         */
        public function mailOntvangersAjax()
	{
            $this->load->model('gebruiker_model');
            $this->load->model('partner_model');
            $type = $this->input->get('type');
            $users = $this->input->get('users');
            if($type == "1"){
                $data['gebruikers'] = $this->gebruiker_model->get($users);
            }elseif($type == "2"){
                $data['gebruikers'] = $this->partner_model->getById($users);
            }elseif($type == "partners"){
                $data['gebruikers'] = $this->partner_model->getPartners();
            }
            else{
                $data['gebruikers'] = $this->gebruiker_model->getGebruikersByFunction($users);
            }
           $this->load->view("ajax_mail_ontvangers",$data);
	}
        /**
         * Vraagt de gegevens op van de pagina mails_versturen.php en stuurt deze op een correcte manier
         * door naar de functie StuurMail()
         * 
         * @see mails_versturen.php
         * @see mail/stuurMail($geadresseerde, $boodschap, $titel)
         */
        public function mailVersturen()
	{
            $ontvangers = $this->input->post('ontvangers');
            $titel = $this->input->post('subject');
            $boodschap = $this->input->post('mailsjabloon');
            $i = 0;
            if($ontvangers !== "No receivers selected"){
                $ontvangerslijst = explode(" ", $ontvangers);
                foreach($ontvangerslijst as $ontvanger){
                    if($i !== count($ontvangerslijst)){
                        $this->stuurmail($ontvanger, $boodschap, $titel);
                        $i++;
                    }
                }
                redirect('gebruiker/toonMeldingEmailVerzonden');
            }else{
                redirect('gebruiker/toonMeldingEmailBestaatNiet');
            }
	}
}
?>