<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }

    public function inloggen()
	{
            $data['titel'] = 'Login';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu', 'inhoud' => 'inloggen');
            
            $this->template->load('main_master', $partials, $data);
        }
        
        public function toonFout()
	{
            $data['titel'] = 'Inlog Error';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'login_fout');
            
            $this->template->load('main_master', $partials, $data);
        }
        
        public function inloggenControleren()
	{
            $email = $this->input->post('email');
            $wachtwoord = $this->input->post('password');
            
            if ($this->authex->meldAan($email, $wachtwoord)) {
                redirect('home/index');
            } else {
                redirect('login/toonFout');
            }
        } 
        
        public function uitloggen()
	{
            $this->authex->meldAf();
            redirect('home/index');
        } 
        
        public function wachtwoordVergeten(){
            $data['titel'] = 'Wachtwoord vergeten';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header',
                'menu' => 'main_menu',
                'inhoud' => 'wachtwoord_vergeten',
                'voetnoot' => 'main_footer');
            
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
                     redirect('gebruiker/toonMeldingGebruikerAangemaakt');
                 }else{
                     redirect('gebruiker/toonMeldingRegistratieNOK');
                 }   
            }
            else{
                redirect('gebruiker/toonMeldingEmailBestaatNiet');
            }
        }
}
