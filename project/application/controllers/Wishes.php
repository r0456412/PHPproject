<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wishes extends CI_Controller {

    	public function __construct()
	{
            parent::__construct();
            if (!$this->authex->isAangemeld()) {
                redirect('login/inloggen');
            }

            $this->load->helper('form');
        }     
        
        public function beherenWishes()
	{
            $data['titel'] = 'Wishes beheren';
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            $data['link'] = 'admin/index';
            $this->load->model('wish_model');
            $data['wishes'] = $this->wish_model->getAllByWish();
            
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'wishes_beheren',);

            $this->template->load('main_master', $partials, $data);
        }
        
        public function bewaar(){
            $this->load->model('wish_model');
            
            $wish = new stdClass();
            $wish->id = $this->uri->segment(3);
            $decode = urldecode($this->uri->segment(4));
            $wish->wish = $decode;
            //echo "Jan";
            //print_r($wish);
            
            $this->wish_model->update($wish);
            
            redirect('gebruiker/toonMeldingWijzigWens');
        }
        
         public function delete($id){
            $this->load->model('wish_model');
            
            $this->wish_model->delete($id);
            
            redirect('gebruiker/toonMeldingVerwijderWens');
        }
        
        public function add()
        {
            $this->load->model('wish_model');
            $wish = $this->input->post('nieuw');
            $soortantwoord = 3;
            $this->wish_model->voegToe($wish, $soortantwoord);
            
            redirect('gebruiker/toonMeldingNieuweWens');
        }
        
        
}

