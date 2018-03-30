<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planning extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();

        }
        
	public function planning()
	{
            $data['titel'] = 'Planning';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | Sander J.";
            $data['link'] = 'home/admin';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning.php');
            
            $this->template->load('main_master', $partials, $data);
	}
	public function voorstel()
	{
            $data['titel'] = 'Planning';
            $data['gebruiker']  = $this->authex->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | <u>Eloy B.</u> | Sander J.";

            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning.php');

            $this->template->load('main_master', $partials, $data);
	}
}

?>

