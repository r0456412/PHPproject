<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @class Surveillant
 * @brief Controller-klasse voor Surveillant
 * 
 * Controller-klasse met alle methodes die gebruikt worden voor de surveillant
 */
class Surveillant extends CI_Controller {
        /**
         * Constructor, hier wordt gecontroleerd of de gebruiker bevoegd is om deze functies te gebruiken
         */
    	public function __construct()
	{
            parent::__construct();
            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }
            $this->load->helper('form');
            $this->load->helper('url');
            
            
        }
        /**
         * Zorgt ervoor dat een docent word opgeslagen als surveillant en word dan terug gesturud naar planning_docent.php (via de docent controller / index)
         * 
         * @see beschikbaarheid_model::wijzig()
         * @see planning_docent.php
         */
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
        /**
         * Zorgt ervoor dat een docent word verwijderd als surveillant en word dan terug gesturud naar planning_docent.php (via de docent controller / index)
         * 
         * @see beschikbaarheid_model::delete()
         * @see planning_docent.php
         */
        public function surveillant_verwijderen()
	{
            $this->load->model ('beschikbaarheid_model');
            
            $sessieid= $this->input->post('sessie');
            $gebruikerid= $this->input->post('gebruiker');
            
            $this->beschikbaarheid_model->delete($sessieid,$gebruikerid);
            
            redirect('docent');
            
        }
        
}
         



