<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Login
 * @brief Controller-klasse voor Login
 * 
 * Controller-klasse met alle methodes die gebruikt worden om in- en uit te loggen.
 */
class Login extends CI_Controller {
        /**
         * Constructor
         */
        public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }
        /**
         * Haalt de informatie over de gebruiker op via de authex 
         * en toont nadien het inlogvenster in de view inloggen.php
         * 
         * @see inloggen.php
         */
        public function inloggen()
	{
            $data['titel'] = 'Login';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | <u>Kim M.</u> | Eloy B. | Sander J.";
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            $data['link'] = 'home';
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu', 'inhoud' => 'inloggen');
            
            $this->template->load('main_master', $partials, $data);
        }
        /**
         * Controleert, via de authex, of de ingevulde login gegevens kloppen met een account dat zich in de database bevindt.
         * Als dit het geval is wordt via de authex bepaald welke gebruiker wilt aanmelden en wordt de juiste home pagina weergegeven:
         *  Admin -> home_admin.php
         *  Gastspreker -> home_gastspreker.php
         *  Docent -> planning_docent.php
         * Als dit niet het geval is wordt een foutpagina weergegevan via de view gebruiker_melding.php (inhoud gebruiker/toonMeldingLoginMislukt)
         * 
         * @see authex::meldAan()
         * @see authex::getGebruikerInfo()
         * @see home_admin.php
         * @see home_gastspreker.php
         * @see planning_docent.php
         * @see gebruiker_melding.php
         */
        public function inloggenControleren()
	{
            $email = $this->input->post('email');
            $wachtwoord = $this->input->post('password');
            
            if ($this->authex->meldAan($email, $wachtwoord)) {
                $gebruiker = $this->authex->getGebruikerInfo();
                if($gebruiker->soort == 'Admin'){
                    redirect('admin/index');
                }elseif($gebruiker->soort == 'Gastspreker'){
                    redirect('gastspreker/index');
                }elseif($gebruiker->soort == 'Docent'){
                    redirect('docent/index');
                }else{
                    redirect('home/index');
                }       
            } else {
                redirect('gebruiker/toonMeldingLoginMislukt');
            }
        } 
        /**
         * Zorgt ervoor dat, via de authex, de gebruiker wordt afgemeld
         * en de home pagina wordt weergegeven.
         * 
         * @see authex::meldAf()
         * @see home_index.php
         */
        public function uitloggen()
	{
            $this->authex->meldAf();
            redirect('home/index');
        } 
        
        
}
