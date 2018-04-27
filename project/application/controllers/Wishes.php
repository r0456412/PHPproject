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
        
        public function update()
        {
            if ($this->input->post('save')) {
                $this->load->model('wish_model');
                $wish = new stdClass();
                $wish->id = $this->input->post('id');
                $wish->wish = $this->input->post('wish');
                
                
            }

            if ($this->input->post('delete')) {
                $this->load->model('wish_model');
                $id = $this->input->post('id');
                
                
                $data['titel'] = $id;
                $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
                $data['gebruiker'] = $this->authex->getGebruikerInfo();
                $data['link'] = 'admin/index';
                $this->load->model('wish_model');
                $data['wishes'] = $this->wish_model->getAllByWish();
            
                $partials = array('hoofding' => 'main_header',
                'menu' => 'main_menu',
                'inhoud' => 'wishes_beheren',
                'voetnoot' => 'main_footer');

                $this->template->load('main_master', $partials, $data);
            }
        }
        
        public function add()
        {
            $this->load->model('wish_model');
            $wish = $this->input->post('nieuw');
            $soortantwoord = 3;
            $this->wish_model->voegToe($wish, $soortantwoord);
            
            redirect('wishes/toonMeldingNieuweWens');
        }
        
        public function toonMelding($titel, $boodschap, $link = null)
	{
            $data['titel'] = $titel;
            $data['auteur'] = "Lorenzo M.| <u>Arne V.D.P.</u> | Kim M. | Eloy B. | Sander J.";
            $data['boodschap'] = $boodschap;
            $data['link'] = $link;
            
            $data['gebruiker'] = $this->authex->getGebruikerInfo();
            
            $partials = array('hoofding' => 'main_header','menu' => 'main_menu','inhoud' => 'gebruiker_melding',);
            $this->template->load('main_master', $partials, $data);   
        }
        
        public function toonMeldingNieuweWens(){
            $this->toonMelding('Success',
                    'The new wish was successfully added.',
                    array('url' => 'wishes/beherenWishes', 'tekst' => 'Back'));
        }
}

