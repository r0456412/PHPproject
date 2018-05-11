<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @mainpage Commentaar bij Project Internationale dagen team26
 * # Wat?
 * Hier vind je onze Doxygen-commentaar bij het PHP-project <b>Internationale Dagen</b>
 * - De commentaar bij onze model- en controller-klassen vind je onder het menu <em>Klassen</em>
 * - De commentaar bij onze view-bestanden vind je onder het menu <em>Bestanden</em>
 * - Ook de originele commentaar geschreven bij het CodeIgniter-framework is opgenomen.
 * 
 * # Wie?
 * Dit project is geschreven en becommentarieerd door Kim Moelants, Eloy Boone, Sander Jespers, Arne van de Poel & Lorenzo Michiels
 * 
 */
class Home extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();
        }
        
	public function index()
	{
            $this->load->model('paginainhoud_model');
            
            $data['titel'] = 'Home';
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['paginainhoud'] = $this->paginainhoud_model->get();
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'home_index');
            
            $this->template->load('main_master', $partials, $data);
	}  
}