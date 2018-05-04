<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveillant extends CI_Controller {
    
    	public function __construct()
	{
            parent::__construct();
            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }
            $this->load->helper('form');
            $this->load->helper('url');
            
            
        }
         public function surveillant_opslaan()
	{
            $this->load->model ('beschikbaarheid_model');
            
            $sessie= $this->input->post('sessie');
            $gebruiker= $this->input->post('gebruiker');
            
            $beschikbaarheid = new stdClass();
            $beschikbaarheid->sessieid = $sessie;
            $beschikbaarheid->gebruikerid = $gebruiker;
            
            $this->beschikbaarheid_model->wijzig($beschikbaarheid);
            
            redirect('docent');
            
        }
        
}
         



