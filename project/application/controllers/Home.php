<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();

        }
        
	public function index()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_index');
            
            $this->template->load('main_master', $partials, $data);
	}  
        
        public function admin()
	{
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'home/admin';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_admin');
            
            $this->template->load('main_master', $partials, $data);
	}  
}