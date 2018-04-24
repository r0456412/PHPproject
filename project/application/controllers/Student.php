<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    
    
    public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('form');
            
            
            
            
        }
        
        public function index()
	{
            $this->load->model('datum_model');
            
            $data['titel'] = 'Planning student';
            
            $data['datums'] = $this->datum_model->get();
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $data['link'] = 'home';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | Eloy B. | <u>Sander J.</u>";

            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning_student');

            $this->template->load('main_master', $partials, $data);
            
	}
}

