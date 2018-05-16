<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Gebruiker
 * @brief Controller-klasse voor Gebruiker
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de gebruiker
 */
class Gebruiker extends CI_Controller {

        /**
         * Constructor
         */
    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }     
        
        public function index()
	{
            $data['titel'] = 'Registration';
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'gebruiker_registreren',);

            $this->template->load('main_master', $partials, $data);
        }
        
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
        
        public function registreer()
        {    
            $gebruiker = new stdClass();
            $gebruiker->titel = $this->input->post('title');
            $gebruiker->voornaam = $this->input->post('first_name');
            $gebruiker->achternaam = $this->input->post('last_name');
            $gebruiker->geslacht = $this->input->post('gender');
            $gebruiker->insituut = $this->input->post('institute');
            $gebruiker->biografie = $this->input->post('biography');
            $gebruiker->position = $this->input->post('position');
            $gebruiker->telefoonnummer = $this->input->post('phone_number');
            $gebruiker->email = $this->input->post('email');
            $gebruiker->studiegebied = $this->input->post('field_of_study');
            $gebruiker->contactpersoon = $this->input->post('contact');
            $gebruiker->soort = 'Gastspreker';
            $gebruiker->straat = $this->input->post('address');
            $gebruiker->postcode = $this->input->post('zip_code');
            $gebruiker->land = $this->input->post('country');
            $gebruiker->wachtwoord = $this->input->post('password');
            
            if( strlen($gebruiker->wachtwoord) < 4 || !filter_var($gebruiker->email, FILTER_VALIDATE_EMAIL)){
                redirect('gebruiker/toonMeldingRegistratieNOK');
            }
            $id = $this->authex->registreer($gebruiker->titel, $gebruiker->voornaam, $gebruiker->achternaam, $gebruiker->geslacht, $gebruiker->insituut, $gebruiker->biografie, $gebruiker->position, $gebruiker->telefoonnummer, $gebruiker->email, $gebruiker->studiegebied, $gebruiker->contactpersoon, $gebruiker->soort, $gebruiker->straat, $gebruiker->postcode, $gebruiker->land, $gebruiker->wachtwoord);
            if($id == 0){
                redirect('gebruiker/toonMeldingEmailBestaat');
            }else{
                redirect('gebruiker/toonMeldingGebruikerAangemaakt'); 
            }
        }
        /**
         * Toont een gepersonaliseerde melding aan een gebruiker nadat deze
         * een wijziging heeft aangebracht in het systeem (voorstel ingestuurd, wensen doorgegeven, datums wijzigen(admin), ...).
         * Dit wordt getoond in de view gebruiker_melding.php
         * 
         * @param $titel De titel van de pagina die getoond wordt
         * @param $boodschap De specifieke boodschap die getoond wordt
         * @param $link De link achter de knop om terug te gaan naar specifieke home page van een gebruiker
         * @see gebruiker_melding.php
         */
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
        public function toonMeldingRegistratieNOK(){
            $this->toonMelding('Error',
                    'Please enter all text boxes (email and password correctly)',
                    array('url' => 'gebruiker/maakGebruiker', 'tekst' => 'Back'));
        }
        public function toonMeldingEmailBestaat(){
            $this->toonMelding('Error',
                    'E-mail already exists. Try again!',
                    array('url' => 'gebruiker/maakGebruiker', 'tekst' => 'Back'));
        }
        public function toonMeldingGebruikerAangemaakt(){
            $this->toonMelding('Registration',
                    'Your account was successfully created');
        }
        public function toonMeldingGeenEmail(){
            $this->toonMelding("Error', 'This isn't a correct password.",
                    array('url' => 'gebruiker/wachtwoordVergeten', 'tekst' => 'Back'));
        }
        public function toonMeldingEmailBestaatNiet(){
            $this->toonMelding('Error', 'Unknown E-mail.',array('url' => 'gebruiker/wachtwoordVergeten', 'tekst' => 'Back'));
        }   
        public function toonMeldingNiewWachtwoordVerstuurd(){
            $this->toonMelding('Error', 'A new password was send to you.',array('url' => 'login/inloggen', 'tekst' => 'Back'));
        }  
        public function toonMeldingVoorstelIngediend(){
            $this->toonMelding('Succes!',
                    'Your proposal has been sent to the responsible docent. ',
                    array('url' => 'gastspreker/index', 'tekst' => 'Home'));
        }
        public function toonMeldingGeenToegangGastspreker(){
            $this->toonMelding('Error!',
                    'You don not have permission to see this page.',
                    array('url' => 'gastspreker/index', 'tekst' => 'Home'));
        }
        public function toonMeldingGeenToegangDocent(){
            $this->toonMelding('Error!',
                    'You don not have permission to see this page.',
                    array('url' => 'docent/index', 'tekst' => 'Home'));
        }
        public function toonMeldingGeenToegangAdmin(){
            $this->toonMelding('Error!',
                    'You don not have permission to see this page.',
                    array('url' => 'admin/index', 'tekst' => 'Home'));
        }
        public function toonMeldingWishesOpgeslagen(){
            $this->toonMelding('Succes!',
                    'your wishes have been saved!',
                    array('url' => 'gastspreker/index', 'tekst' => 'Home'));
        }
        public function toonMeldingNieuweWens(){
            $this->toonMelding('Success',
                    'The new wish was successfully added.',
                    array('url' => 'wishes/beherenWishes', 'tekst' => 'Back'));
        } 
        public function toonMeldingWijzigWens(){
            $this->toonMelding('Success',
                    'The new wish was successfully saved.',
                    array('url' => 'wishes/beherenWishes', 'tekst' => 'Back'));
        }
        
        public function toonMeldingVerwijderWens(){
            $this->toonMelding('Success',
                    'The new wish was successfully deleted.',
                    array('url' => 'wishes/beherenWishes', 'tekst' => 'Back'));
        }
        public function toonMeldingLoginMislukt(){
            $this->toonMelding('Error',
                    'You entered a wrong email or password, pleas try again.',
                    array('url' => 'login/inloggen', 'tekst' => 'Try again'));
        }
        public function toonMeldingWijzgingSaved(){
            $this->toonMelding('Saved changes',
                    'The changes are saved!',
                    array('url' => 'admin/index', 'tekst' => 'Home'));
        }
        public function toonMeldingEmailVerzonden(){
            $this->toonMelding('Email sent',
                    'The email has been sent!',
                    array('url' => 'admin/index', 'tekst' => 'Home'));
        }
        /**
         * Toont de pagina waar de gebruiker zijn wachtwoord kan resetten naar een random
         * gegenereerde cijfercode. Dit wordt getoond in de view wachtwoord_vergeten.php.
         * 
         * @see wachtwoord_vergeten.php
         */
        public function wachtwoordVergeten(){
            $data['titel'] = 'Wachtwoord vergeten';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'home';
             
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'wachtwoord_vergeten',);
            
            $this->template->load('main_master', $partials, $data);
        }
        /**
         * Zorgt dat een niew wachtwoord gegenereerd wordt nadat er gecontroleerd wordt of het email adres bestaat via het gebruiker_model.
         * Hierna wordt dit aangepast in de database via het gebruiker_model en wordt
         * het resultaat getoond via de view gebruiker_melding (inhoud van deze melding gebruiker/toonMeldingNiewWachtwoordVerstuurd)
         * 
         * @see gebruiker_model::controleerEmailVrij()
         * @see gebruiker_model::veranderWachtwoord()
         * @see gebruiker_melding.php
         */
        public function wachtwoordOpvragen(){
            $gebruiker = new stdClass();
            $gebruiker->email = $this->input->post('email');

            if(!filter_var($gebruiker->email, FILTER_VALIDATE_EMAIL)){
                redirect('gebruiker/toonMeldingGeenEmail');
            }
            
            if(!$this->gebruiker_model->controleerEmailVrij( $gebruiker->email)){
                $nieuwWachtwoord = bin2hex(openssl_random_pseudo_bytes(4));
                $boodschap = 'Your new password: ' . $nieuwWachtwoord;
                
                $this->gebruiker_model->veranderWachtwoord($nieuwWachtwoord,$gebruiker->email);
                
                $titel = 'International Days';
                 if($this->stuurMail($gebruiker->email, $boodschap, $titel)){
                     redirect('gebruiker/toonMeldingNiewWachtwoordVerstuurd');
                 }else{
                     redirect('gebruiker/toonMeldingRegistratieNOK');
                 }   
            }
            else{
                redirect('gebruiker/toonMeldingEmailBestaatNiet');
            }
        }
        
        public function faq(){
            $data['titel'] = 'FAQ';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'faq');

            $this->template->load('main_master', $partials, $data);
        }
        
         public function help(){
            $data['titel'] = 'FAQ';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'help');

            $this->template->load('main_master', $partials, $data);
        }
}

