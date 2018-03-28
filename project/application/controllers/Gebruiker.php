<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gebruiker extends CI_Controller {

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }     
        
        public function maakGebruiker()
	{
            $data['titel'] = 'Registreren';
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
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
            
            if( strlen($gebruiker->wachtwoord) < 4 || !filter_var($gebruiker->email, FILTER_VALIDATE_EMAIL)){
                redirect('gebruiker/toonMeldingRegistratieNOK');
            }
            $id = $this->authex->registreer($gebruiker->titel, $gebruiker->voornaam, $gebruiker->achternaam, $gebruiker->geslacht, $gebruiker->insituut, $gebruiker->biografie, $gebruiker->position, $gebruiker->telefoonnummer, $gebruiker->email, $gebruiker->studiegebied, $gebruiker->contactpersoon, $gebruiker->soort, $gebruiker->straat, $gebruiker->postcode, $gebruiker->land, $gebruiker->wachtwoord);
            if($id == 0){
                redirect('gebruiker/toonMeldingEmailBestaat');
            }else{
                $boodschap = 'U bent geregistreed. klik op onderstaande link om uw registratie te activeren: ' . site_url() . '/gebruiker/activeer/' .$id;
                $titel = 'TV-Shop';
                 if($this->stuurMail($gebruiker->email, $boodschap, $titel)){
                     redirect('gebruiker/toonMeldingGebruikerAangemaakt');
                 }else{
                     redirect('gebruiker/toonMeldingRegistratieNOK');
                 }         
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
            $this->toonMelding('Fout',
                    'Please enter all text boxes (first name, last name, email and password correctly)',
                    array('url' => 'gebruiker/maakGebruiker', 'tekst' => 'Terug'));
        }
        public function toonMeldingEmailBestaat(){
            $this->toonMelding('Fout',
                    'Email bestaat reeds. Probeer opnieuw!',
                    array('url' => 'gebruiker/maakGebruiker', 'tekst' => 'Terug'));
        }
        public function toonMeldingGebruikerAangemaakt(){
            $this->toonMelding('Registreren',
                    'Gebruiker werd aangemaakt! Er werd een e-amil verstuurd met een activatielink. '
                    . 'Nadat u deze link hebt aangelklikt, kan u inloggen.');
        }
        public function toonMeldingGebruikerGeactiveerd(){
            $this->toonMelding('Activeren', 'Account werd geactiveerd. U kan nu aanmelden');
        }
        public function toonMeldingActiverenNOK(){
            $this->toonMelding('Fout activeren', 'Fout tijdens activeren, probeer opnieuw');
        }
        public function toonMeldingVesrschillendWachtwoord(){
            $this->toonMelding('Fout', 'U heeft twee verschillende wachtwoorden opgegeven.',
                    array('url' => 'gebruiker/maakGebruiker', 'tekst' => 'Terug'));
        }
        public function toonMeldingGeenEmail(){
            $this->toonMelding('Fout', 'Dit is geen correct e-mail adres.',
                    array('url' => 'gebruiker/wachtwoordVergeten', 'tekst' => 'Terug'));
        }
        public function toonMeldingEmailBestaatNiet(){
            $this->toonMelding('Fout', 'Onbekend e-mailadres.',array('url' => 'gebruiker/wachtwoordVergeten', 'tekst' => 'Terug'));
        }   
        public function toonMeldingNiewWachtwoordVerstuurd(){
            $this->toonMelding('Fout', 'Een nieuw wachtwoord in naar u verzonden.',array('url' => 'login/inloggen', 'tekst' => 'Back'));
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
                $boodschap = 'U nieuwe wachtwoord: ' . $nieuwWachtwoord;
                
                $this->gebruiker_model->veranderWachtwoord($nieuwWachtwoord,$gebruiker->email);
                
                $titel = 'TV-Shop';
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

