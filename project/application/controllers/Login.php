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
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu', 'inhoud' => 'inloggen');
            
            $this->template->load('main_master', $partials, $data);
        }
        
        public function toonFout()
	{
            $data['titel'] = 'Inlog Error';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
             $data['link'] = 'home';
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'login_fout');
            
            $this->template->load('main_master', $partials, $data);
        }
        
        public function inloggenControleren()
	{
            $email = $this->input->post('email');
            $wachtwoord = $this->input->post('password');
            
            
            if ($this->authex->meldAan($email, $wachtwoord)) {
                $gebruiker = $this->authex->getGebruikerInfo();
                if($gebruiker->soort == 'Admin'){
                    redirect('home/admin');
                }else{
                    redirect('home/index');
                }       
            } else {
                redirect('login/toonFout');
            }
        } 
        
        public function uitloggen()
	{
            $this->authex->meldAf();
            redirect('home/index');
        } 
        
        
}
