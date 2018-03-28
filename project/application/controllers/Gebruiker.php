<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gebruiker extends CI_Controller {

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }     
        
        public function maakGebruiker()
	{
            $data['titel'] = 'Registration';
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker_registreren',
            'voetnoot' => 'main_footer');

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
            
            if( strlen($gebruiker->voornaam) <= 3  || strlen($gebruiker->achternaam) <= 2  || strlen($gebruiker->wachtwoord) < 4 || !filter_var($gebruiker->email, FILTER_VALIDATE_EMAIL)){
                redirect('gebruiker/toonMeldingRegistratieNOK');
            }
            $id = $this->authex->registreer($gebruiker->titel, $gebruiker->voornaam, $gebruiker->achternaam, $gebruiker->geslacht, $gebruiker->insituut, $gebruiker->biografie, $gebruiker->position, $gebruiker->telefoonnummer, $gebruiker->email, $gebruiker->studiegebied, $gebruiker->contactpersoon, $gebruiker->soort, $gebruiker->straat, $gebruiker->postcode, $gebruiker->land, $gebruiker->wachtwoord);
            if($id == 0){
                redirect('gebruiker/toonMeldingEmailBestaat');
            }else{
                redirect('gebruiker/toonMeldingGebruikerAangemaakt'); 
            }
        }
 
        public function activeer($id)
        {
            if($this->authex->activeer($id)){
                redirect('gebruiker/toonMeldingActiverenNOK');
            }else{
                redirect('gebruiker/toonMeldingGebruikerGeactiveerd');
            }
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
        
        public function toonMeldingRegistratieNOK(){
            $this->toonMelding('Error',
                    'Please enter all text boxes (first name, last name, email and password correctly)',
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
        
        public function wachtwoordVergeten(){
            $data['titel'] = 'Wachtwoord vergeten';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'wachtwoord_vergeten',);
            
            $this->template->load('main_master', $partials, $data);
        }
        
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
}

