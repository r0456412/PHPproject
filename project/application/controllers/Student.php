<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    
    
    public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('form');
            $this->load->helper('notation');
        }
        
        public function index()
	{
            $this->load->model('datum_model');
            
            $data['titel'] = 'Planning student';
            

            $datums= $this->datum_model->get();
            $i=0;
           foreach ($datums as $datum) {
                $datums[$i]->datum =  zetOmNaarDDMMYYYY($datums[$i]->datum);
                
                $i++;
            }
            $data['datums'] = $datums;
            $data['gebruiker']  = $this->authex->getGebruikerInfo();
            
            $data['link'] = 'home';
            $data['auteur'] = "Lorenzo M.| Arne V.D.P. | Kim M. | Eloy B. | <u>Sander J.</u>";

            $partials = array('hoofding' => 'main_header', 'menu' => 'main_menu', 'inhoud' => 'planning_student');

            $this->template->load('main_master', $partials, $data);
            
	}
        
        public function haalAjaxOp_datum() {
            $datumId = $this->input->get('datumid');
            $this->load->model('sessie_model');
            $this->load->model('planning_model');
            $this->load->model('lokaal_model');
            $this->load->model('gebruiker_model');
            
            $planningen = $this->sessie_model->getByDatum($datumId);
            $i=0;
            foreach($planningen as $planning){
                $voorstellen[$i] = $this->planning_model->get($planning->voorstelid);
                $lokalen[$i] = $this->lokaal_model->get($planning->lokaalid);
                $gastsprekers[$i] = $this->gebruiker_model->get($voorstellen[$i]->gastsprekerID);
                $i++;
            };
            
            if (!empty($planning)){
                $data['voorstellen']=$voorstellen;
                $data['lokalen']=$lokalen;
                $data['gastsprekers']=$gastsprekers;
            }
            $data['planning']=$planningen;
            
            $this->load->view("ajax_planning_student",$data);
            
        }
        
        
}

