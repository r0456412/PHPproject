<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gebruiker extends CI_Controller {

        // +----------------------------------------------------------
        // | TV Shop
        // +----------------------------------------------------------
        // | 2ITF - 201x-201x
        // +----------------------------------------------------------
        // | User Controller
        // |
        // +----------------------------------------------------------
        // | Thomas More
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }     
        
        public function maakGebruiker()
	{
            $data['titel'] = 'Registreren';
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header',
            'menu' => 'main_menu',
            'inhoud' => 'gebruiker_nieuw',
            'voetnoot' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }
        
        private function stuurMail ($geadresseerde, $boodschap, $titel)
        {
            $this->load->library('email');
            
            $this->email->from('kimmoelants@gmail.com');
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
            $gebruiker->naam = $this->input->post('naam');
            $gebruiker->email = $this->input->post('email');
            $gebruiker->wachtwoord = $this->input->post('wachtwoord');
            $gebruiker->tweedeWachtwoord = $this->input->post('tweedeWachtwoord');
          
            if ($gebruiker->wachtwoord != $gebruiker->tweedeWachtwoord) {
                redirect('gebruiker/toonMeldingVesrschillendWachtwoord');
            }
            if(strlen($gebruiker->naam) < 3 || strlen($gebruiker->wachtwoord) < 4 || !filter_var($gebruiker->email, FILTER_VALIDATE_EMAIL)){
                redirect('gebruiker/toonMeldingRegistratieNOK');
            }
            $id = $this->authex->registreer($gebruiker->naam,$gebruiker->email ,$gebruiker->wachtwoord);
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
            $data['boodschap'] = $boodschap;
            $data['link'] = $link;
            
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header',
                'menu' => 'main_menu',
                'inhoud' => 'gebruiker_melding',
                'voetnoot' => 'main_footer');
            $this->template->load('main_master', $partials, $data);   
        }
        
        public function toonMeldingRegistratieNOK(){
            $this->toonMelding('Fout',
                    'Gelieve alle tekstvakken (naam, email én wachtwoord correct in te vullen',
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
            $this->toonMelding('Fout', 'Onbekend e-mailadres.',
                    array('url' => 'gebruiker/wachtwoordVergeten', 'tekst' => 'Terug'));
        }   
}

